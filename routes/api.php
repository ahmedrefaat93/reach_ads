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

Route::apiResource('tags', 'TagController');
Route::apiResource('categories', 'CategoryController');
Route::post('ads/filter','AdController@filter');
Route::get('advertiser/ads/{advertiser}','AdController@getAdsByAdvertiser');
