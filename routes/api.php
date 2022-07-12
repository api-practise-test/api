<?php

use App\Models\Phone;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::apiResource('phones', Phone::class);


Route::get('/phones', [\App\Http\Controllers\PhoneController::class, 'getPhones']);
Route::get('/get-phones-by-keyword', [\App\Http\Controllers\PhoneController::class, 'getPhonesByKeyword']);

Route::post('/phones',[\App\Http\Controllers\PhoneController::class, 'postPhone']);
Route::post('/phones/{id}',[\App\Http\Controllers\PhoneController::class, 'updatePhone']);
Route::get('/phones/detail/{id}',[\App\Http\Controllers\PhoneController::class, 'detailPage']);


Route::delete('/phones/{id}',[\App\Http\Controllers\PhoneController::class, 'deletePhone']);

Route::get('/brands', [\App\Http\Controllers\BrandController::class, 'getBrands']);
