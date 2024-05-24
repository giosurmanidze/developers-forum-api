<?php

use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;


 
Route::get('/topics', [TopicController::class, 'index']);
Route::get('/topics/{id}', [TopicController::class, 'show']);
Route::post('/topics', [TopicController::class, 'store']);
Route::patch('/topics/{topic}', [TopicController::class, 'update']);
