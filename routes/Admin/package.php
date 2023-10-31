<?php

use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Auth\CompanyAuthController;
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
Route::get('/packages', [PackageController::class,'index']);
Route::get('/packages/{package}', [PackageController::class,'show']);
Route::post('/packages', [PackageController::class,'store']);
Route::put('/packages/{package}', [PackageController::class,'update']);
Route::delete('/packages/{package}', [PackageController::class,'delete']);
// Route::post('/login', [CompanyAuthController::class,'login']);

