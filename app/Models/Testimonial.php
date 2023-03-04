<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['content'];
    
    protected $fillable = [
        'name',
        'content',
        'rating',
        'status',
        'user_id',
    ];
    public function image(){
        return $this->hasOne(Image::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
