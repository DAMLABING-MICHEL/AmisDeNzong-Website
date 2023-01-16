<?php

namespace App\Models;

use App\Events\ModelCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title','summary','content'];

    protected $dispatchesEvents = [
        'created' => ModelCreated::class,
    ];
    protected $fillable = [
        'title',
        'summary',
        'content',
        'category_id',
        'user_id',
        'slug',
        'seo_title', 
        'meta_description', 
        'meta_keywords', 
        'active',
    ];

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function validComments()
    {
        return $this->comments()->whereHas('user', function ($query) {
            $query->whereValid(true);
        });
    }
}
