<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\WorkshopController;
 Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function(){

Route::get('/workshops', [WorkshopController::class, 'index']);
Route::get('/workshops/create', [WorkshopController::class, 'create']);
Route::post('/workshops', [WorkshopController::class, 'store']);
Route::get('/workshops/{workshop}/edit', [WorkshopController::class, 'edit']);
Route::get('/workshops/{workshop}',[WorkshopController::class,'show']);
Route::put('/workshops/{workshop}',[WorkshopController::class,'update']);
Route::delete('/workshops/{workshop}',[WorkshopController::class,'destroy']);

    Route::get('/logout',[SessionController::class,'destroy']);
});

// Login mit middleware
//
Route::middleware('guest')->group(function(){
    // Login
    Route::get('/login',[SessionController::class,'create'])->name('login');
    Route::post('/login',[SessionController::class,'store']);
});


