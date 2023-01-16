<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Feature extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title'];
    
    protected $fillable = [
        'title',
        'description',
    ];
    
    public function staffs(){
        return $this->hasMany('App\Models\Staff');
    }
}
