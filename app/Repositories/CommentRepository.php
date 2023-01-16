<?php
namespace App\Repositories;

use App\Models\Post;

class CommentRepository
{
    public function findCommentsByPostSlug($slug){
        $post = Post::where('slug', $slug)->get();
        $post = Post::withCount('validComments')->findOrFail($post->first()->id);
        $comments = $post->validComments()
            ->withDepth()
            ->latest()
            ->get()
            ->toTree();
        return $comments;
     }
}
