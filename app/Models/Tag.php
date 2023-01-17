<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Tag extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title'];
    
    protected $fillable = [
        'title',
        'description',
        'slug',
    ];
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
