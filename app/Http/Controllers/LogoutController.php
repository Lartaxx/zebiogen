<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LogoutController extends Controller
{
    public function postlogout() {
        Auth::logout();
        return redirect("/login");
    }
}
