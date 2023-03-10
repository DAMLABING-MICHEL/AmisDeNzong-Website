<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'hight_grade',
    ];
    
    public function staffs(){
        return $this->hasMany(Staff::class);
    }
}
