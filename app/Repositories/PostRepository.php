<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostRepository
{
    protected $categoryRepository;
    protected $tagRepository;
    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
        $this->tagRepository = new TagRepository();
    }
    public function findPosts($limit){
        $posts = Post::limit($limit)->select('*')->orderBy('created_at', 'asc')->get();
        for ($i = 0; $i < count($posts); $i++) {
            $posts[$i] = $this->postWithValidComments($posts[$i]);
        }
        return $posts;
    }
    
    public function findPostBySlug($slug){
        $post = Post::with(
            'user:id,name,email',
            'tags:id,title,slug',
            'category:title,slug'
        )
        ->withCount('validComments')
        ->whereSlug($slug)
        ->firstOrFail();
        return $post;
    }
    
    public function findLatestPosts($limit){
        $lastPosts = Post::limit($limit)->select('*')->withCount('validComments')->orderBy('created_at', 'asc')->get();
        return $lastPosts;
    }
    
    public function postWithValidComments($post){
        $post = Post::withCount('validComments')->find($post->id);
        return $post;
    }
    
    public function findPostsByCategorySlug($slug)
    {
        $category = $this->categoryRepository->findCategoryBySlug($slug);
        $posts = Category::find($category->id)->posts()->get();
        return $posts;
    }
    
    public function findPostsByTagSlug($slug)
    {
        $tag = $this->tagRepository->findTagBySlug($slug);
        $posts = Tag::find($tag->id)->posts()->get();
        return $posts;
    }

    public function findPostBySearch($search)
    {
        $posts = Post::where('title', 'like', "%$search%")
            ->orWhere('summary', 'like', "%$search%")
            ->orWhere('content', 'like', "%$search%")->get();
            return $posts;
    }
}
