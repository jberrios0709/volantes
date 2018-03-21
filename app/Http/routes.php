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

Route::group(['prefix' => 'api/1.0/','middleware' => ['cors']] , function () {
	Route::post('auth','ApiAuthController@userAuth');
	Route::post('refresh','ApiAuthController@userRefreshAuth');
	Route::post('calculatePrice','UtilitiesController@calculatePriceBase');
	Route::post('calculateSpaces','UtilitiesController@calculateSpaces');
	Route::post('test','UtilitiesController@test');
});


Route::group(['prefix' => 'api/1.0/','middleware' => ['cors','jwt.auth']] , function () {
	
	
	Route::resource('user', 'UserController',
		['only' => ['index', 'store', 'update', 'show']]
	);

	Route::resource('price', 'PriceController',
		['only' => ['index', 'store']]
	);

    Route::resource('client', 'ClientController',
		['only' => ['index', 'store', 'update', 'show']]
	);

	Route::resource('client.email', 'EmailController',
		['only' => ['store', 'update', 'destroy']]
	);

	Route::resource('client.phone', 'PhoneController',
		['only' => ['store', 'update', 'destroy']]
	);

	Route::resource('client.branch', 'BranchController',
		['only' => ['index','store', 'update']]
	);

	Route::resource('branch.order', 'OrderController',
		['only' => ['index','store', 'update']]
	);

	Route::get('orders','OrderController@indexTwo');

	Route::post('order/{id}/design','OrderController@design');

	Route::resource('print', 'PrintController',
		['only' => ['index','store', 'update']]
	);

	Route::resource('order.abonos', 'AbonosController',
		['only' => ['store']]
	);
});