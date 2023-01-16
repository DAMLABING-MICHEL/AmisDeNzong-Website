<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class News extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title','summary','content'];
    
    protected $fillable = [
        'title',
        'summary',
        'content',
    ];
    
    public function image(){
        return $this->hasOne(Image::class);
    }
}
