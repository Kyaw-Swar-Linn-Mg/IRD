<?php

use Illuminate\Http\Request;

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

Route::post('category','Api\CategoryController@getByDate');

Route::post('person','Api\PersonController@getByDate');

Route::post('sub_category','Api\SubCategoryController@getByDate');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
