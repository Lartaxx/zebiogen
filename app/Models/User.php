<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function findUser($email) {
        return User::where("email", $email)
                ->get()
                ->first();
    }

    protected static function hasUsers() {
        return User::get()
                ->first();

    }


    public static function createUser($name, $email, $password) {
        return User::create([
            "name" => $name,
            "email" => $email,
            "password" => Hash::make($password)
            ]);
    }

    public static function modifyAccount($pseudo) {
            User::where("id", Auth::user()->id)
                ->update(["name" => $pseudo]);
            return Redirect::to(route("my-account"))->with("success.account_modified", "Votre compte a bien été modifié !");
        }
}
