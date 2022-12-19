<?php

namespace App\Models;

use GuzzleHttp\Psr7\Query;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    
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
}
