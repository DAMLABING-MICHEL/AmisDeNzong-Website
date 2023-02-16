<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Translatable\HasTranslations;

class Staff extends Model
{
    use HasFactory, HasTranslations, Notifiable;

    public $translatable = ['position','description'];
    
    protected $fillable = [
        'lastName',
        'firstName',
        'gender',
        'phone',
        'email',
        'position',
        'description',
        'feature_id',
        'grade_id',
    ];

    public function feature()
    {
        return $this->belongsTo('App\Models\Feature');
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }
    
    public function grade(){
        return $this->belongsTo(Grade::class);
    }
    
    public function follows(){
        return $this->belongsToMany(Follow::class);
    }
}
