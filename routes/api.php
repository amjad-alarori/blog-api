<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:api')->group(function () {
    Route::apiResource('blog', BlogController::class);
    Route::delete('blog/{blog}', [BlogController::class, 'destroy'])->where('blog', '[a-z0-9\-]+');
    Route::patch('blog/{blog}', [BlogController::class, 'update'])->where('blog', '[a-z0-9\-]+');
    Route::get('blog/{slug}', [BlogController::class, 'show']);
});
