<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Event extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title','summary','description','venue'];
    
    // protected $dates = ['start_time','end_time'];
    
    protected $fillable = [
        'title',
        'summary',
        'description',
        'date',
        'start_time', 
        'end_time', 
        'venue',
        'contact'
    ];
    
    public function image(){
        return $this->hasOne(Image::class);
    }
}
