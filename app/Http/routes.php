<?php
//rota de clientes
Route::get('/', function () {
    return view('welcome');
});
//rotas administrativas
Route::group(['prefix' => 'admin'], function(){

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
    //rota de categorias
    Route::group(['prefix' => 'category'], function(){
        Route::get('', [
            'as' => 'adminCategory',
            'uses' => 'CategoryAdminController@index'
        ]);
        Route::get('create', [
            'as' => 'adminCreateCategory',
            'uses' => 'CategoryAdminController@create'
        ]);
        Route::post('store', [
            'as' => 'adminStoreCategory',
            'uses' => 'CategoryAdminController@store'
        ]);
        Route::get('destroy/{category_id}', [
            'as' => 'adminCategoryDestroy',
            'uses' => 'CategoryAdminController@destroy'
        ]);
        Route::get('edit/{category_id}', [
            'as' => 'adminCategoryEdit',
            'uses' => 'CategoryAdminController@edit'
        ]);
        Route::post('update/{category_id}', [
            'as' => 'adminCategoryUpdate',
            'uses' => 'CategoryAdminController@update'
        ]);
    });
    //rota de produtos
    Route::group(['prefix' => 'product'], function(){
        Route::get('', [
            'as' => 'adminProduct',
            'uses' => 'ProductAdminController@index'
        ]);
        Route::get('create', [
            'as' => 'adminCreateProduct',
            'uses' => 'ProductAdminController@create'
        ]);
        Route::post('store', [
            'as' => 'adminStoreProduct',
            'uses' => 'ProductAdminController@store'
        ]);
        Route::get('destroy/{product_id}', [
            'as' => 'adminProductDestroy',
            'uses' => 'ProductAdminController@destroy'
        ]);
        Route::get('edit/{product_id}', [
            'as' => 'adminProductEdit',
            'uses' => 'ProductAdminController@edit'
        ]);
        Route::post('update/{product_id}', [
            'as' => 'adminProductUpdate',
            'uses' => 'ProductAdminController@update'
        ]);
    });
});