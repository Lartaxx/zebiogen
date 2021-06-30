<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ClaimedAccounts extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'category',
        'email',
        'password'
    ];

    protected $table = 'claimedaccounts';
}
