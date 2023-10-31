<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PropertyController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/properties', [PropertyController::class,'index']);
Route::get('/properties/{property}', [PropertyController::class,'show']);
Route::post('/properties', [PropertyController::class,'store']);
Route::put('/properties/{property}', [PropertyController::class,'update']);
Route::delete('/properties/{property}', [PropertyController::class,'delete']);
// Route::post('/login', [CompanyAuthController::class,'login']);

