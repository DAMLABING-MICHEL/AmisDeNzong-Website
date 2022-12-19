<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function getPosts()
    {
        $posts = Post::all();
        for ($i=0; $i <count($posts) ; $i++) { 
            $posts[$i] = $this->postWithValidComments($posts[$i]);
        }
        return view('blog', compact('posts'));
    }
    
    public function postWithValidComments($post){
        $post = Post::withCount('validComments')->find($post->id);
        return $post;
    }
    public function getPostsByCategorySlug($slug)
    {
        $category = Category::where('slug', $slug)->get();
        $postsByCategory = Category::find($category[0]->id)->posts()->get();
        $message = "posts for category " .$category[0]->title;
        if (count($postsByCategory) == null) {
            $message = "There are not posts for this category:" . $category[0]->title;
        }
        return view('blog', compact(['postsByCategory', 'message']));
    }

    public function getPost($slug)
    {
        $post = Post::with(
            'user:id,name,email,description',
            'tags:id,title,slug',
            'category:title,slug'
        )
        ->withCount('validComments')
        ->whereSlug($slug)
        ->firstOrFail();
        $categories = Category::all();
        for ($i = 0; $i < count($categories); $i++) {
            switch ($categories[$i]->title) {
                case 'Kindergarden':
                    $kinderPosts = Category::find($categories[$i]->id)->posts()->get();
                    break;
                case 'Primary':
                    $primaryPosts = Category::find($categories[$i]->id)->posts()->get();
                    break;
                case 'Leisure':
                    $leisurePosts = Category::find($categories[$i]->id)->posts()->get();
                    break;
                default:
                    # code...
                    break;
            }
        }
        $tags = Tag::all();
        $post_tags = $post->tags()->get();
        $lastPosts = Post::limit(3)->select('*')->withCount('validComments')->orderBy('created_at', 'asc')->get();
        return view('blog-single', compact([
            'post', 'categories', 'tags', 'post_tags', 'lastPosts',
            'kinderPosts', 'primaryPosts', 'leisurePosts'
        ]));
    }
    public function latestPosts(){
        $latestPosts = Post::limit(2)->select('*')->withCount('validComments')->orderBy('created_at', 'asc')->get();
        return $latestPosts;
    }
    public function getPostsByTagSlug($slug)
    {
        $tag = Tag::where('slug', $slug)->get();
        $postsByTag = Tag::find($tag[0]->id)->posts()->get();
        $message = "posts for tag " .$tag[0]->title;;
        if (count($postsByTag) == null) {
            $message = "There are not posts for this tag:" . $tag[0]->title;
        }
        return view('blog', compact(['postsByTag', 'message']));
    }

    public function searchPosts()
    {
        $searchRequest = new SearchRequest();
        $request = $searchRequest->capture();
        $search = $request->get('search');
        $searchPosts = Post::where('title', 'like', "%$search%")
            ->orWhere('summary', 'like', "%$search%")
            ->orWhere('content', 'like', "%$search%")->get();
        $title = (count($searchPosts) != null) ? __('Posts found with search: ') .   $search:'no post found for this search: '.$search;
        return view('blog', compact(['searchPosts', 'title']));
    }
}
