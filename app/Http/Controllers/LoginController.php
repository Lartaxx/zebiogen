<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;


class LoginController extends Controller
{
    
    protected function register(Request $request) {
        $request->validate([
            "pseudo" => "required|min:3",
            "email" =>  "required|min:10",
            "password" =>  "required|min:10",
        ]);
        $input = $request->all();
        $user_email = User::findUser($input["email"]);
        if($user_email) {
            return redirect()->route("login")->with("error.email_already_own", "L'email {$input['email']} a déjà été utilisée..");
        }
        else {
        $user = User::createUser($input["pseudo"], $input["email"], $input["password"]);
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
        return User::modifyAccount($input["pseudo"]);
    }

    protected function forgotpassword(Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        return $status === Password::RESET_LINK_SENT
                    ? redirect()->route("login")->with('success.email',"Un email vous a été envoyé !")
                    : redirect()->route("login")->with('error.email', "Une erreur a eu lieu !");
    }

    protected function passwordreset(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:10|confirmed',
            'password_confirmation' => 'required|same:password'
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );
    
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('sucess.password.reset',"Votre mot de passe a été modfié !")
                    : redirect()->route('login')->with('error.not.email.reset', "Une erreur a eu lieu...");
    }
    
}
