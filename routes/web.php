<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Api\MahasiswaController;


Route::get('/{any}',[HomeController::class,'index'])->where('any','-*');
Route::post('/',[UserController::class,'store']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/contact',[HomeController::class,'contact']);
