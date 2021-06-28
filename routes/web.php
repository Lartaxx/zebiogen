<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/home", function() {
    return view("home");
})->middleware("auth")->name("home");

Route::get("/login", function() {
    return view("login");
})->name("login");

Route::get("/my-account", function() {
    return view("account");
})->name("my-account");

Route::post("/login", [LoginController::class, "login"]);

Route::post("/register", [LoginController::class, "register"]);

Route::post("/my-account", [LoginController::class, "account_modified"]);

Route::get("/logout", [LogoutController::class, "postlogout"])->name("postlogout");

