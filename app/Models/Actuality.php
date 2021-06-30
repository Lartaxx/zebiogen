<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Actuality extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'content',
        'by'
    ];

    protected $table = 'actuality';

}
