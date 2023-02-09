<?php
namespace App\Repositories;

use App\Models\News;

class NewsRepository
{
    public $imageRepository;
    
    public function __construct()
    {
        $this->imageRepository = new ImageRepository();
    }
    public function findNews($limit){
        if ($limit != null) {
            $news = News::limit(3)->select('*')->orderBy('created_at', 'asc')->get();
        }
        else{
            $news = News::all();
        }
        return $news;
    }
    
    public function findNewsById($id){
        $news = News::findOrFail($id);
        return $news;
    }
    
    public function findLatestNews(){
        $latestNews= News::limit(3)->select('*')->orderBy('created_at','asc')->get();
        return $latestNews;
    }
    
    public function store($request)
    {
        foreach (config('app.locales') as $locale) {
            $request->validate([
                'title_'.$locale => 'required|max:255',
                'content_'.$locale => 'required|max:65000',
                'summary_'.$locale => 'required|max:500'
            ]);
        }
        $request->merge([
            'title' =>  ["en"=>$request->title_en,"fr"=>$request->title_fr,"it"=>$request->title_it],
            'summary' =>  ["en"=>$request->summary_en,"fr"=>$request->summary_fr,"it"=>$request->summary_it],
            'content' =>  ["en"=>$request->content_en,"fr"=>$request->content_fr,"it"=>$request->content_it]
        ]);
        $news = News::create($request->all());
        $this->saveImage($news,$request);
    }
    public function update($news,$request)
    {
        foreach (config('app.locales') as $locale) {
            $request->validate([
                'title_'.$locale => 'required|max:255',
                'content_'.$locale => 'required|max:65000',
                'summary_'.$locale => 'required|max:500',
                'image' => 'required|max:500'
            ]);
        }
        $request->merge([
            'title' =>  ["en"=>$request->title_en,"fr"=>$request->title_fr,"it"=>$request->title_it],
            'summary' =>  ["en"=>$request->summary_en,"fr"=>$request->summary_fr,"it"=>$request->summary_it],
            'content' =>  ["en"=>$request->content_en,"fr"=>$request->content_fr,"it"=>$request->content_it]
        ]);
        $news->update($request->all());
        $this->updateImage($request);
    }
    protected function saveImage($news,$request){
        $this->imageRepository->store($request,null,null,$news,null,null,null);
    }
    
    protected function updateImage($request){
        $this->imageRepository->update($request);
    }
}
