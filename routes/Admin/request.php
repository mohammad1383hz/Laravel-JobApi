<?php

use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Auth\CompanyAuthController;
use App\Http\Controllers\Home\AdvertisementController;
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
// Route::get('/advertisements', [AdvertisementController::class,'index']);
Route::get('/advertisements/{advertisements}/request', [RequestController::class,'getRequestAdvers']);

// Route::post('make/request/{advertisements}', [RequestController::class,'makeRequest']);


// Route::post('/advertisements/{advertisement}', [AdvertisementController::class,'buyPackage']);



