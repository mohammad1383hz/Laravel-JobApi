<?php

use App\Http\Controllers\Auth\CompanyAuthController;
use App\Http\Controllers\HomeCompany\JobController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/create/jobs', [JobController::class,'createAds']);
    Route::get('/company/jobs', [JobController::class,'showAdvertisementsCompany']);
    Route::get('/company/jobs/{job}', [JobController::class,'showAdvertisement']);

});
//manage advers


// Route::post('/advertisements/{advertisement}', [AdvertisementController::class,'buyPackage']);



