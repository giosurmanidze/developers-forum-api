<?php

use App\Http\Controllers\TopicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


 
Route::get('/topics', [TopicController::class, 'index']);
Route::get('/topics/{id}', [TopicController::class, 'show']);
Route::post('/topics', [TopicController::class, 'store']);
Route::patch('/topics/{topic}', [TopicController::class, 'update']);