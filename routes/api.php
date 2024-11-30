<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\MahasiswaMiddleware;
use App\Http\Controllers\Api\DosenController;
use App\Http\Controllers\api\MatkulController;
use App\Http\Controllers\Api\RequestController;
use App\Http\Controllers\Api\MahasiswaController;



Route::post('/post-request', [RequestController::class, 'postRequest']);
Route::get('/get-request', [RequestController::class, 'getRequest']);

//Route Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
Route::get('/mahasiswa/{mahasiswa:nim}', [MahasiswaController::class, 'show']);
Route::put('/mahasiswa/{mahasiswa:nim}', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswa/{mahasiswa:nim}', [MahasiswaController::class, 'destroy']);

//Route Dosen 
// Route::get('/dosen', [DosenController::class, 'index']);
// Route::post('/dosen', [DosenController::class, 'store']);
// Route::get('/dosen/{id}', [DosenController::class, 'show']);
// Route::put('/dosen/{id}', [DosenController::class, 'update']);
// Route::delete('/dosen/{id}', [DosenController::class, 'destroy']);

Route::get('/mhs', [AuthController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


Route::middleware(['auth:sanctum',MahasiswaMiddleware::class])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    // Route::get('/mahasiswa', [AuthController::class, 'index']);
    Route::put('/mahasiswa/{id}', [AuthController::class, 'update']);
    
});

Route::middleware(['auth:sanctum',AdminMiddleware::class])->group(function () {
    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/admin/{id}',[AdminController::class,'show']);
    Route::post('/admin',[AdminController::class,'store']);
    Route::put('/admin/{id}',[AdminController::class,'update']);
    Route::delete('/admin/{id}',[AdminController::class,'destroy']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('dosens', DosenController::class);
    Route::apiResource('matkuls', MatkulController::class);
    Route::apiResource('mahasiswas', MahasiswaController::class);

    Route::get('matkul/{kode_matkul}/dosens', [MatkulController::class, 'getDosensByMakul']);
});


//Swagger
Route::get('/user', [AuthController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::put('/user/{id}', [AuthController::class, 'update']);
Route::get('/user/{id}', [AuthController::class, 'show']);
Route::delete('/user/{id}', [AuthController::class, 'destroy']);
