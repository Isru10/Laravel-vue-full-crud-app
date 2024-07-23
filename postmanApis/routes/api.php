<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\WorkersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/students' , [StudentController::class,'index']);
Route::get('/students/{id}/edit' , [StudentController::class,'edit']);
Route::put('/students/{id}/edit' , [StudentController::class,'update']);

Route::delete('/students/{id}/delete' , [StudentController::class,'destroy']);
Route::post('/students' , [StudentController::class,'store']);
Route::get('/students/{id}' , [StudentController::class,'show']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
