<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

use PhpParser\Builder\Use_;




//Public Routes
Route::get('/',[UserController::class,'show_reg']);
Route::get('/login',[UserController::class,'show_login']);
Route::get('/logout',[UserController::class,'logout']);
Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);

//Private Routes
Route::middleware('auth')->group(function(){
    Route::post('addP',[ProductController::class,'addP']);
    Route::get('/showP',[ProductController::class,'showP']);
    Route::get('/delete/{id}',[ProductController::class,'delete']);
    Route::get('/addP',[UserController::class,'showP']);
    Route::get('/edit/{id}',[ProductController::class,'edit']);
    Route::post('/update/{id}',[ProductController::class,'updateP']);
});
