<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes 
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/users', [UserController::class,'index']);
Route::get('/users/{user}', [UserController::class,'show']);
Route::post('/users', [UserController::class,'store']);
Route::put('/users/{user}', [UserController::class,'update']);
Route::delete('/users/{user}', [UserController::class,'delete']);
Route::put('users/edit/status/{user}', [UserController::class,'editStatus']);


