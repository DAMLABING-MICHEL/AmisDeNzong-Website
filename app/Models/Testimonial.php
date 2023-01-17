<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['feature','content'];
    
    protected $fillable = [
        'name',
        'feature',
        'content',
    ];
    public function image(){
        return $this->hasOne(Image::class);
    }
}
