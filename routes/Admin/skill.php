<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SkillController;
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

Route::get('/skills', [SkillController::class,'index']);
Route::get('/skills/{skill}', [SkillController::class,'show']);
Route::post('/skills', [SkillController::class,'store']);
Route::put('/skills/{skill}', [SkillController::class,'update']);
Route::delete('/skills/{skill}', [SkillController::class,'delete']);

