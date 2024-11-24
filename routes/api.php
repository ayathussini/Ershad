<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');





Route::post('/register',[AuthController::class,"register"])->name("register");

Route::post('/login',[AuthController::class,"login"])->name("login");

Route::post('/logout',[AuthController::class,"logout"])->name("logout")->middleware('auth:sanctum');;




