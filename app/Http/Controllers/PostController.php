<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\PostService;
use App\Services\TagService;

class PostController extends Controller
{
    protected $postService;
    protected $categoryService;
    protected $tagService;
    
    public function __construct()
    {
        $this->postService = new PostService();
        $this->categoryService = new CategoryService();
        $this->tagService = new TagService();
    }
    public function getPosts()
    {
        $posts = $this->postService->getPosts(null);
        return view('front.blog', compact('posts'));
    }
    
    public function getPostsByCategorySlug($slug)
    {
        $posts = $this->postService->getPostsByCategorySlug($slug);
        $message = $this->postService->getMessage($slug,null);
        return view('front.blog', compact(['posts','message']));
    }

    public function getPost($slug)
    {
        $post = $this->postService->getPostBySlug($slug);
        $categories = $this->categoryService->getCategories();
        $tags = $this->tagService->getTags();
        $lastPosts = $this->postService->getLatestPosts(3);
        return view('front.blog-single', compact([
            'post', 'categories', 'tags', 'lastPosts',
        ]));
    }
    public function getPostsByTagSlug($slug)
    {
        $posts = $this->postService->getPostsByTagSlug($slug);
        $message = $this->postService->getMessage(null,$slug);
        return view('front.blog', compact(['posts','message']));
    }

    public function searchPosts()
    {
        $posts = $this->postService->getPostsBySearch();
        $title = $this->postService->getSearchTitle();
        return view('front.blog', compact(['posts', 'title']));
    }
}
