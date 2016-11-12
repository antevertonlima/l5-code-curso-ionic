<?php
//rota de clientes
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'cors'], function(){
    //rotas API
    Route::post('oauth/access_token', function() {
        return Response::json(Authorizer::issueAccessToken());
    });

    Route::post('/api/auth/register', ['as' => 'api.client.store','uses' => 'Api\Auth\AuthController@store']);

    Route::group(['prefix' => 'api','as' => 'api.','middleware' => 'oauth'], function(){

        Route::get('authenticated',['uses' => 'Api\LoggedController@index']);
        Route::patch('device_token',['uses' => 'Api\LoggedController@updateDeviceToken']);
        Route::get('cupom/{code}', ['uses' => 'Api\CupomController@show']);
        
        //API CLIENT
        Route::group(['prefix' => 'client','as' => 'client.','middleware' => 'oauth.checkrole:client'], function(){
            Route::resource('order','Api\Client\ClientCheckoutController', ['except' => ['create', 'edit', 'destroy']]);

            Route::get('products', ['uses' => 'Api\Client\ClientProductController@index']);
        });
        //API DELIVRYMAN
        Route::group(['prefix' => 'deliveryman','as' => 'deliveryman.','middleware' => 'oauth.checkrole:deliveryman'], function(){
            
            Route::resource('order',
                'Api\Deliveryman\DeliverymanCheckoutController',
                ['except' => ['create','edit','destroy','store']]
            );

            Route::patch('order/{id}/update-status',[
                'uses' => 'Api\Deliveryman\DeliverymanCheckoutController@updateStatus',
                'as' => 'orders.update_status'
            ]);
            
            Route::post('order/{id}/geo',[
                'as' => 'orders.geo',
                'uses' => 'Api\Deliveryman\DeliverymanCheckoutController@geo',
            ]);
        });

    });
});

//rotas administrativas
Route::group(['prefix' => 'admin','as' => 'admin.','middleware' => 'auth.checkrole:admin'], function(){

    Route::group(['prefix' => 'client'], function(){
        Route::get('', ['as' => 'client.index','uses' => 'ClientAdminController@index']);
        Route::get('create', ['as' => 'client.create','uses' => 'ClientAdminController@create']);
        Route::get('destroy/{client_id}', ['as' => 'client.destroy', 'uses' =>'ClientAdminController@destroy']);
        Route::get('edit/{client_id}', ['as' => 'client.edit','uses' => 'ClientAdminController@edit']);
        Route::post('store', ['as' => 'client.store','uses' => 'ClientAdminController@store']);
        Route::post('update/{client_id}', ['as' => 'client.update','uses' => 'ClientAdminController@update']);
    });
    //rota de categorias
    Route::group(['prefix' => 'category'], function(){
        Route::get('', ['as' => 'category.index','uses' => 'CategoryAdminController@index']);
        Route::get('create', ['as' => 'category.create','uses' => 'CategoryAdminController@create']);
        Route::post('store', ['as' => 'category.store','uses' => 'CategoryAdminController@store']);
        Route::get('destroy/{category_id}', ['as' => 'category.destroy','uses' => 'CategoryAdminController@destroy']);
        Route::get('edit/{category_id}', ['as' => 'category.edit','uses' => 'CategoryAdminController@edit']);
        Route::post('update/{category_id}', ['as' => 'category.update','uses' => 'CategoryAdminController@update']);
    });
    //rota de produtos
    Route::group(['prefix' => 'product'], function(){
        Route::get('', ['as' => 'product.index','uses' => 'ProductAdminController@index']);
        Route::get('create', ['as' => 'product.create','uses' => 'ProductAdminController@create']);
        Route::post('store', ['as' => 'product.store','uses' => 'ProductAdminController@store']);
        Route::get('destroy/{product_id}', ['as' => 'product.destroy','uses' => 'ProductAdminController@destroy']);
        Route::get('edit/{product_id}', ['as' => 'product.edit','uses' => 'ProductAdminController@edit']);
        Route::post('update/{product_id}', ['as' => 'product.update','uses' => 'ProductAdminController@update']);
    });
    Route::group(['prefix' => 'orders'], function(){
        Route::get('', ['as' => 'orders.index','uses' => 'OrdersController@index']);
        Route::get('create', ['as' => 'orders.create','uses' => 'OrdersController@create']);
        Route::get('edit/{order_id}', ['as' => 'orders.edit','uses' => 'OrdersController@edit']);
        Route::post('store', ['as' => 'orders.store','uses' => 'OrdersController@store']);
        Route::post('update/{order_id}', ['as' => 'orders.update','uses' => 'OrdersController@update']);
    });

    Route::group(['prefix' => 'cupoms', 'as' => 'cupoms.'], function(){
        Route::get('/',['uses' => 'CupomsController@index', 'as' => 'index']);
        Route::get('/create', ['uses' => 'CupomsController@create', 'as' => 'create']);
        Route::post('/store', ['uses' => 'CupomsController@store', 'as' => 'store']);
        Route::get('/edit/{id}', ['uses' => 'CupomsController@edit', 'as' => 'edit']);
        Route::post('/update/{id}', ['uses' => 'CupomsController@update', 'as' => 'update']);
        Route::get('/destroy/{id}', ['uses' => 'CupomsController@destroy', 'as' => 'destroy']);
    });

});

Route::group(['prefix' => 'customer', 'as' => 'customer.','middleware' => 'auth.checkrole:client'], function(){
    Route::get('order', ['as' => 'order.index', 'uses' => 'CheckoutController@index']);
    Route::get('order/create', ['as' => 'order.create', 'uses' => 'CheckoutController@create']);
    Route::post('order/store', ['as' => 'order.store', 'uses' => 'CheckoutController@store']);
});
