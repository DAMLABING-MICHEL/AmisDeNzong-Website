<?php

namespace App\Models;

use App\Events\ModelCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kalnoy\Nestedset\NodeTrait;

class Comment extends Model
{
    use NodeTrait, HasFactory, Notifiable;
    
    protected $dispatchesEvents = [
        'created' => ModelCreated::class,
    ];
    protected $fillable = [
        'content', 
        'post_id', 
        'user_id', 
    ];
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
