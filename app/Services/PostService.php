<?php
    namespace App\Services;

use App\Http\Requests\SearchRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;

class PostService
{
    protected $postRepository;
    protected $categoryRepository;
    protected $tagRepository;
    
    public function __construct()
    {
        $this->postRepository = new PostRepository();
        $this->categoryRepository = new CategoryRepository();
        $this->tagRepository = new TagRepository();
    }
    public function getPosts($limit){
        return $this->postRepository->findPosts($limit);
    }
    
    public function getPostBySlug($slug){
        return $this->postRepository->findPostBySlug($slug);
    }
    
    public function getLatestPosts($limit){
        return $this->postRepository->findLatestPosts($limit);
    }
    
    public function getPostsByCategorySlug($slug){
        return $this->postRepository->findPostsByCategorySlug($slug);
    }
    
    public function getPostsByTagSlug($slug){
        return $this->postRepository->findPostsByTagSlug($slug);
    }
    
    public function getPostsBySearch(){
        $search = $this->getSearch();
        return $this->postRepository->findPostBySearch($search);
    }
    
    public function getSearch(){
        $searchRequest = new SearchRequest();
        $request = $searchRequest->capture();
        $search = $request->get('search');
        return $search;
    }
    
    public function getSearchTitle(){
        $posts = $this->getPostsBySearch();
        $title = (count($posts) != null) ? __('Posts found with search: ') .   $this->getSearch() :'No post found for this search: '.$this->getSearch();
        return $title;
    }
    
    public function getMessage($categorySlug,$tagSlug){
        if($categorySlug != null){
            $category = $this->categoryRepository->findCategoryBySlug($categorySlug);
            $message = __("posts for category ") .$category->title;
        }
        else if($tagSlug != null){
            $tag = $this->tagRepository->findTagBySlug($tagSlug);
            $message = __(" posts for tag ") .$tag->title;
        }
        return $message;
    }
}