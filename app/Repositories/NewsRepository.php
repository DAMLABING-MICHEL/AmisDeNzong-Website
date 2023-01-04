<?php
namespace App\Repositories;

use App\Models\News;

class NewsRepository
{
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
}
