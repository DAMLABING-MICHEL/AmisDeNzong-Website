<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Services\CommentService;

class CommentController extends Controller
{
    protected $commentService;
    public function __construct()
    {
        if (!app()->runningInConsole() && !request()->ajax()) {
            abort(403);
        }
        $this->commentService = new CommentService();
    }
    public function store(CommentRequest $request, $slug)
    {
        $post = Post::where('slug', $slug)->get();
        $post = Post::withCount('validComments')->findOrFail($post->first()->id);
        $data = [
            'content' => $request->message,
            'post_id' => $post->id,
            'user_id' => $request->user()->id,
        ];
        $request->has('commentId') ?
            Comment::findOrFail($request->commentId)->children()->create($data) :
            Comment::create($data);
        $commenter = $request->user();
        return response()->json($commenter->valid ? 'ok' : 'invalid');
    }


    public function comments($slug)
    {
        $comments = $this->commentService->getCommentsByPostSlug($slug);

        return [
            'html' => view('front.comments', compact('comments'))->render(),
        ];
    }
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return response()->json();
    }
}
