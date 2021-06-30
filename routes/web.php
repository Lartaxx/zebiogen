<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ActualityController;
use App\Http\Controllers\AccountsController;


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
    return view("welcome");
});

Route::get("/home", function() {
    $objective = \App\Models\User::get()->count() * 50 / 100;
    return view("home", ["objectif" => $objective]);
})->middleware("auth")->name("home");

Route::get("/login", function() {
    return view("login");
})->name("login");

Route::get("/my-account", function() {
    return view("account");
})->name("my-account");

Route::post("/login", [LoginController::class, "login"]);

Route::post("/register", [LoginController::class, "register"]);

Route::post("/my-account", [LoginController::class, "account_modified"])->middleware('auth');

Route::get("/logout", [LogoutController::class, "postlogout"])->name("postlogout");

Route::prefix('admin')->group(function () {
    Route::get('/add-account', function () {
        return view("admin.add_account");
    })->middleware("auth")->name("admin.add_account");
    Route::post("/add-account", [AccountsController::class, "fileUpload"])->name("createAccount");

    Route::get("/add-actuality", function() {
        return view("admin.add_actuality");
    })->middleware("auth")->name("admin.add_actu");
    Route::post("/add-actuality", [ActualityController::class, "createActu"])->name("admin.post_add_actu");

    
    Route::get("/see-accounts", function() {
        return view("admin.see_users");
    })->middleware("auth")->name("admin.see_accounts");


});

Route::get("/accounts/{name}", [AccountsController::class, "accountFind"])->middleware("auth")->name("accounts.find");

Route::get("/claim-accounts/{id}", [AccountsController::class, "accountID"])->middleware("auth")->name("accounts.id");

Route::get("/delete-claim-accounts/{id}", [AccountsController::class, "deleteAccountID"])->middleware("auth")->name("delete_accounts.id");

Route::get("/delete-claimed-accounts/{id}", [AccountsController::class, "deleteClaimedAccountID"])->middleware("auth")->name("delete_claimedaccounts.id");


Route::get("/forgot-password", function() {
    return view("forgot-password");
})->name("password.request");

Route::post('/forgot-password',[LoginController::class, "forgotpassword"]) ->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post("/reset-password", [LoginController::class, "passwordreset"])->middleware('guest')->name('password.update');

Route::get("/my-claimed-accounts", function() {
    return view("accounts.claimed_accounts");
})->middleware("auth")->name("claimed_accounts");



