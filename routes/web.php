<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskRolController;

Route::get("/home",function(){
    return view('Home');
})->name('home');
Route::get("/",function(){
    return view('Home');
});

Route::middleware(['guest'])->group(function(){
    Route::get("/login",function(){return view('Login');})->name('login');
    Route::post("/login",[AuthController::class,"login"])->name('login');    
});

Route::middleware(['auth'])->group(function () {
    
    Route::resource('user',UserController::class);
    Route::resource('task', TaskController::class);
    Route::resource('roles', RolController::class);
    Route::resource('task-role',TaskRolController::class);

    Route::post("/logout",[AuthController::class,"logout"])->name('logout');
        
});



