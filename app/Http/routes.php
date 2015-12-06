<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'client'], function(){
    Route::get('', [
        'as' => 'adminClient',
        'uses' => 'ClientAdminController@index'
    ]);
    Route::get('destroy/{client_id}/{user_id}', [
        'as' => 'adminClientDestroy', 'uses' =>
        'ClientAdminController@destroy'
    ]);
    Route::get('edit/{user_id}', [
        'as' => 'adminClientEdit',
        'uses' => 'ClientAdminController@edit'
    ]);
});

Route::group(['prefix' => 'category'], function(){
    Route::get('', [
        'as' => 'adminCategory',
        'uses' => 'CategoryAdminController@index'
    ]);
    Route::get('destroy/{category_id}', [
        'as' => 'adminCategoryDestroy',
        'uses' => 'CategoryAdminController@destroy'
    ]);
    Route::get('edit/{category_id}', [
        'as' => 'adminCategoryEdit',
        'uses' => 'CategoryAdminController@edit'
    ]);
});
