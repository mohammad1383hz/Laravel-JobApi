<?php

use App\Http\Controllers\Auth\CompanyAuthController;
use App\Http\Controllers\HomeCompany\PackageController;
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
Route::post('/packages/{package}', [PackageController::class,'buyPackage']);



