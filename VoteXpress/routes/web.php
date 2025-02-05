<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Auth\Events\Login;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware("guest")->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginRequest']);


    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'registerRequest']);

});

Route::middleware('auth')->group(function () {

Route::get('settings', [AuthController::class,'settings'])->name('settings');
 // add user information
 Route::post('/add_user_informations', [UserController::class, 'add_user_informations'])->name('add_user_informations');
    Route::get('page', function () {

        $userInformations = UserInformation::where('user_id', Auth::user()->id)->first();

        // die(json_encode($userInformations));

        return view('page', ['userInformation' => $userInformations]);
    })->name('page');
    Route::post('page', function () {
        return view('page');
    });


Route::get('/createPoll', [Usercontroller::class,'CreatePoll'])->name('create');


    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});


