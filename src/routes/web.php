<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

Route::get('/login',function () {
    return view('auth.login');
})->name('login');

Route::get('/logout',function () {
    Auth::logout();
    return route('login');
})->name('logout');

Route::post('/login',[UserController::class,'login'])->name('attemptLogin');

Route::get('/register',function () {
    return view('auth.register');
})->name('register');
Route::post('/register',[UserController::class,'register'])->name('attemptRegister');


Route::middleware(['auth'])->group(function(){
    
});
