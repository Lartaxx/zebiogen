<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    
    protected function postLogin(Request $request) {
        $request->validate([
            "pseudo" => "required|min:3",
            "email" =>  "required|min:10",
            "password" =>  "required|min:10",
        ]);
        $input = $request->all();
        User::createUser($input);
    }

    protected function check(Request $request) {
        $request->validate([
            "pseudo" => "required|min:3",
            "email" =>  "min:10",
            "password" =>  "required|min:10",
        ]);
        $input = $request->all();
        return User::checkUser($input);
    }

    protected function account_modified(Request $request) {
        $request->validate([
            "pseudo" => "required|min:3"
        ]);
        $input = $request->all();
        return User::modifyAccount($input);
    }
}
