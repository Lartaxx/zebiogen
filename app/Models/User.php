<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

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

    public static function checkUser(array $input) {
        $todo = "login";
        
        if (array_key_exists("email", $input)) {
            $todo = "register";
        }

        switch($todo) {
            case "login": {
                $user = Auth::attempt(['password' => $input["password"], "email" => $input["pseudo"]]);
                if (!$user) {
                    return redirect()->route("login")->with("error.no_user", "Pseudo, ou mot de passe eronnées...");
                }
                else {
                    $user_good = Auth::user();
                    Auth::login($user_good);
                    return Redirect::to(route("home"))->with("success.account_find", "Re-bonjour, {$input['pseudo']}");
                }
                break;
            }

            case "register": {
                $create_admin = 0;
                $has_user = DB::table("users")->get()->first();
                if(!$has_user) $create_admin = 1;
                $user_email = DB::table("users")->where('email', $input["email"])->first();
                if($user_email) {
                    return redirect()->route("login")->with("error.email_already_own", "L'email {$input['email']} a déjà été utilisée..");
                }
                else {
                $user = User::create([
                    'name' => $input["pseudo"],
                    'email' => $input['email'],
                    'password' => Hash::make($input["password"]),
                    'is_admin' => $create_admin
                ]);
                auth()->login($user);
                return Redirect::to(route("home"))->with("success.account_created", "Votre compte avec l'email {$input['email']} a bien été crée !");
            }           
                break;
            }
        }
    }

    public static function modifyAccount(array $input) {
            DB::table("users")
            ->where("id", Auth::user()->id)
            ->update(["name" => $input["pseudo"]]);
            return Redirect::to(route("my-account"))->with("success.account_modified", "Votre compte a bien été modifié !");
        }
}
