<?php

use App\Http\Controllers\Auth\CompanyAuthController;
use App\Http\Controllers\Home\FavouritesjobController;
use App\Http\Controllers\Home\JobController;
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
// //     return $request->user();
// });
Route::middleware('auth:sanctum')->group(function () {
Route::get('/jobs/{job}', [JobController::class,'show']);
 Route::get('/favourites/index', [FavouritesjobController::class,'index']);
    Route::get('/favourites/{favourite}', [FavouritesJobController::class,'delete']);
//    Route::get('/favourites/index', [FavouritesController::class,'update']);


});
Route::get('/jobs', [JobController::class,'index']);

// Route::post('/advertisements/{advertisement}', [AdvertisementController::class,'buyPackage']);


