<?php

namespace App\Models;

use App\Events\ModelCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    protected $dispatchesEvents = [
        'created' => ModelCreated::class,
    ];
    public $fillable = ['name', 'email', 'subject', 'message'];
}
