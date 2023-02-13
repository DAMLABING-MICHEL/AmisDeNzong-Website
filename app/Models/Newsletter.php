<?php

namespace App\Models;

use App\Events\ModelCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Newsletter extends Model
{
    use HasFactory,Notifiable;
    
    protected $dispatchesEvents = [
        'created' => ModelCreated::class,
    ];
    protected $fillable = [
        'email',
    ];
}
