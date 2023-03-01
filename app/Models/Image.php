<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Image extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['title'];
    protected $fillable = [
      'title',
      'url',
      'staff_id',
      'news_id', 
      'event_id', 
      'rubric_id',
      'testimonial_id',
      'post_id',
      'slide_id',
  ];
    
    public function staff(){
        return $this->belongsTo(Staff::class);
     }
     
     public function rubric(){
        return $this->belongsTo(Rubric::class);
     }
     
     public function news(){
      return $this->belongsTo(News::class);
     }
     
     public function posts(){
      return $this->belongsTo(Post::class);
     }
     
     public function testimonial(){
      return $this->belongsTo(Testimonial::class);
     }
     
     public function event(){
      return $this->belongsTo(Event::class);
     }
     
     public function slide(){
      return $this->belongsTo(Slide::class);
     }
}
