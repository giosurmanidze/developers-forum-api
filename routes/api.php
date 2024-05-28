<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['api', 'auth:api']], function () {
    Route::get('/topics/{id}', [TopicController::class, 'show']);
    Route::post('/topics', [TopicController::class, 'store']);
    Route::patch('/topics/{topic}', [TopicController::class, 'update']);
    
});
Route::get('/topics', [TopicController::class, 'index']);


Route::get('/categories', [CategoryController::class, 'index']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);