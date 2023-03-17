<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Notifications\ModelCreatedNotification;

class PostRepository
{
    public $imageRepository;
    protected $categoryRepository;
    protected $tagRepository;
    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
        $this->tagRepository = new TagRepository();
        $this->imageRepository = new ImageRepository();
    }
    public function findPosts($limit,$nbrpages)
    {
        $posts = Post::limit($limit)->select('*')->whereActive(true)->orderBy('created_at', 'asc')->paginate($nbrpages);
        for ($i = 0; $i < count($posts); $i++) {
            $posts[$i] = $this->postWithValidComments($posts[$i]);
        }
        return $posts;
    }
    public function findPostBySlug($slug)
    {
        $post = Post::with(
            'user:id,name,email',
            'tags:id,title,slug',
            'category:title,slug'
        )
            ->whereActive(true)
            ->withCount('validComments')
            ->whereSlug($slug)
            ->firstOrFail();
        return $post;
    }

    public function findLatestPosts($limit)
    {
        $lastPosts = Post::limit($limit)->select('*')->whereActive(true)->withCount('validComments')->orderBy('created_at', 'asc')->get();
        return $lastPosts;
    }

    public function postWithValidComments($post)
    {
        $post = Post::withCount('validComments')->find($post->id);
        return $post;
    }

    public function findPostsByCategorySlug($slug)
    {
        $category = $this->categoryRepository->findCategoryBySlug($slug);
        $posts = Category::find($category->id)->posts()->whereActive(true)->get();
        return $posts;
    }

    public function findPostsByTagSlug($slug)
    {
        $tag = $this->tagRepository->findTagBySlug($slug);
        $posts = Tag::find($tag->id)->posts()->whereActive(true)->get();
        return $posts;
    }

    public function findPostBySearch($search)
    {
        $posts = Post::where('title', 'like', "%$search%")
            ->orWhere('summary', 'like', "%$search%")
            ->orWhere('content', 'like', "%$search%")->whereActive(true)->get();
        return $posts;
    }
    // back office methods
    public function store($request)
    {
        $categories = Category::all();
        $category = null;
        foreach ($categories as  $c) {
            if($c->title == $request->category){
                $category = $c;
            }
        }
        foreach (config('app.locales') as $locale) {
            $request->validate([
                'title_'.$locale => 'required|max:255',
                'content_'.$locale => 'required|max:65000',
                'summary_'.$locale => 'required|max:500'
            ]);
        }
        $request->merge([
            'active' => $request->has('active'),
            'category_id' => $category->id,
            'title' =>  ["en"=>$request->title_en,"fr"=>$request->title_fr,"it"=>$request->title_it],
            'summary' =>  ["en"=>$request->summary_en,"fr"=>$request->summary_fr,"it"=>$request->summary_it],
            'content' =>  ["en"=>$request->content_en,"fr"=>$request->content_fr,"it"=>$request->content_it]
        ]);
        $post = $request->user()->posts()->create($request->all());
        $this->saveImage($post,$request);
        $this->saveTags($post, $request);
        $post->notify(new ModelCreatedNotification($post));
    }
    public function update($post,$request)
    {
        $categories = Category::all();
        $category = null;
        foreach ($categories as  $c) {
            if($c->title == $request->category){
                $category = $c;
            }
        }
        foreach (config('app.locales') as $locale) {
            $request->validate([
                'title_'.$locale => 'required|max:255',
                'content_'.$locale => 'required|max:65000',
                'summary_'.$locale => 'required|max:500'
            ]);
        }
        $request->merge([
            'active' => $request->has('active'),
            'category_id' => $category->id,
            'title' =>  ["en"=>$request->title_en,"fr"=>$request->title_fr,"it"=>$request->title_it],
            'summary' =>  ["en"=>$request->summary_en,"fr"=>$request->summary_fr,"it"=>$request->summary_it],
            'content' =>  ["en"=>$request->content_en,"fr"=>$request->content_fr,"it"=>$request->content_it]
        ]);
        $post->update($request->all());
        $this->updateImage($request);
        $this->saveTags($post, $request);
    }
    protected function saveImage($post,$request){
        $this->imageRepository->store($request,$post,null,null,null,null,null,null);
    }
    protected function updateImage($request){
        $this->imageRepository->update($request);
    }
    protected function saveTags($post, $request)
    {
        $tags_id = $request->tags;
        $post->tags()->sync($tags_id);
    }
    
}
