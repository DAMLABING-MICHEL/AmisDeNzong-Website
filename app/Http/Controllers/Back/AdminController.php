<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\{ User, Post, Comment, Contact, Newsletter, Staff};
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Post $post, User $user, Comment $comment, Contact $contact, Newsletter $subscriber, Staff $staff)
    {
        $users = isRole('admin') ? $this->get($user) : null;
        $contacts = isRole('admin') ? $this->get($contact) : null;
        $posts = isRole('admin') ? $this->get($post) : null;
        $subscribers = isRole('admin') ? $this->get($subscriber) : null;
        $stafs = isRole('admin') ? $this->get($staff) : null;
        $comments = $this->get($comment, isRole('redac'));
        // get new $model
        $newusers = isRole('admin') ? $this->getUnreads($user) : null;
        $newcontacts = isRole('admin') ? $this->getUnreads($contact) : null;
        $newposts = isRole('admin') ? $this->getUnreads($post) : null;
        $newsubscribers = isRole('admin') ? $this->getUnreads($subscriber) : null;
        $newstaff = isRole('admin') ? $this->getUnreads($staff) : null;
        $newcomments = $this->getUnreads($comment, isRole('redac'));
        return view('back.index', compact('posts','newposts','users','newusers', 'contacts','newcontacts', 'comments','newcomments','subscribers','newsubscribers','stafs','newstaff'));
    }
    protected function get($model,$redac = null){
        $query = $redac ? $model->whereHas('post.user', function ($query) {
            $query->where('users.id', auth()->id());
        }) : $model->newQuery();
        return $query->count();
    }
    protected function getUnreads($model, $redac = null)
    {
        $query = $redac ? 
            $model->whereHas('post.user', function ($query) {
                $query->where('users.id', auth()->id());
            }) :
            $model->newQuery();

        return $query->has('unreadNotifications')->count();
    }

    public function purge($model)
    {
        $model = 'App\Models\\' . ucfirst($model);

        DB::table('notifications')->where('notifiable_type', $model)->delete();

        return back();
    }
}