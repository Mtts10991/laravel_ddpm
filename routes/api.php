<?php

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

Route::group(["prefix" => "ddpm003", 'namespace' => 'App\Http\Controllers\DDPM'], function () {
    Route::get('push_data', 'DDPM_003Controller@pushData');
    Route::post('select_data', 'DDPM_003Controller@where_data');
});
Route::group(["prefix" => "ddpm004", 'namespace' => 'App\Http\Controllers\DDPM'], function () {
    Route::get('push_data', 'DDPM_004Controller@pushData');
    Route::post('select_data', 'DDPM_004Controller@where_data');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
