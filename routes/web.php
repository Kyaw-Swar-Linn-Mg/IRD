<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('administrator/dashboard/login');
});

Route::prefix('administrator/dashboard')->group(function() {

    Auth::routes();

    Route::middleware(['auth', 'admin'])->group(function () {

        Route::get('/', 'Admin\DashboardController@index')->name('dashboard.index');

        Route::resource('users', 'Admin\UserController', ['as' => 'dashboard']);

        Route::resource('category', 'Admin\CategoryController', ['as' => 'dashboard']);

        Route::resource('person', 'Admin\PersonController', ['as' => 'dashboard']);

        Route::resource('subCategory', 'Admin\SubCategoryController', ['as' => 'dashboard']);

        Route::get('/getSubCategory','Admin\PersonController@getSubCategory');

        Route::resource('position', 'Admin\PositionController', ['as' => 'dashboard']);

        Route::resource('asdfasdf', 'Admin\TestController', ['as' => 'dashboard']);

    });

});
