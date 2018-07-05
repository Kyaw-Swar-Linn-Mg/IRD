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

Route::resource('category','Api\CategoryController');

Route::resource('person','Api\PersonController');

Route::get('person/category/{category_id}','Api\PersonController@getPersonByCategory');

Route::get('person/subCategory/{sub_category_id}','Api\PersonController@getPersonBySubCategory');

Route::resource('subCategory','Api\SubCategoryController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
