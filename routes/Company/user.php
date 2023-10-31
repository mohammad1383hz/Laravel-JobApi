<?php

use App\Http\Controllers\Auth\CompanyAuthController;
use App\Http\Controllers\HomeCompany\AdvertisementController;
use App\Http\Controllers\HomeCompany\UserController;
use App\Http\Resources\HomeCompany\UserCollection;
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
// Route::post('/advertisements', [UserController::class,'show ']);
// Route::post('/advertisements/{advertisement}', [AdvertisementController::class,'buyPackage']);

Route::get('/user/request/profile/{user}', [UserController::class,'showUserProfileRequest']);


