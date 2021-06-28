<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class LoginController extends Controller
{
    
    protected function register(Request $request) {
        $request->validate([
            "pseudo" => "required|min:3",
            "email" =>  "required|min:10",
            "password" =>  "required|min:10",
        ]);
        $input = $request->all();
        $create_admin = 0;
        $has_user = User::hasUsers();
        if(!$has_user) $create_admin = 1;
        $user_email = User::findUser($input["email"]);
        if($user_email) {
            return redirect()->route("login")->with("error.email_already_own", "L'email {$input['email']} a déjà été utilisée..");
        }
        else {
        $user = User::createUser($input["pseudo"], $input["email"], $input["password"], $create_admin);
        auth()->login($user);
        return Redirect::to(route("home"))->with("success.account_created", "Votre compte avec l'email {$input['email']} a bien été crée !");
        }           
    }

    protected function login(Request $request) {
        $request->validate([
            "email" =>  "required|min:10",
            "password" =>  "required|min:10",
        ]);
        $input = $request->all();
        $user = Auth::attempt(['password' => $input["password"], "email" => $input["email"]]);
        if (!$user) {
            return redirect()->route("login")->with("error.no_user", "Pseudo, ou mot de passe eronnées...");
        }
        else {
            $user_good = Auth::user();
            Auth::login($user_good);
            return Redirect::to(route("home"))->with("success.account_find", "Re-bonjour, {$input['email']}");
         }
    }


    protected function account_modified(Request $request) {
        $request->validate([
            "pseudo" => "required|min:3"
        ]);
        $input = $request->all();
        return User::modifyAccount($input);
    }
}
