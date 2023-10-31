<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyController;
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
Route::get('/companies', [CompanyController::class,'index']);
Route::get('/companies/{company}', [CompanyController::class,'show']);
Route::post('/companies', [CompanyController::class,'store']);
Route::put('/companies/{company}', [CompanyController::class,'update']);
Route::delete('/companies/{company}', [CompanyController::class,'delete']);
Route::put('companies/edit/status/{user}', [CompanyController::class,'editStatus']);

// Route::post('/login', [CompanyAuthController::class,'login']);

