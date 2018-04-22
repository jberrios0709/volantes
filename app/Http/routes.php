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
	Route::get('pdf/delivery/{id}','PdfController@delivery');
	Route::get('pdf/inForDate','PdfController@inForDate');
	Route::get('priceCurrently','PriceController@currently');
});


Route::group(['prefix' => 'api/1.0/','middleware' => ['cors','jwt.auth']] , function () {
	
	
	Route::resource('user', 'UserController',
		['only' => ['index', 'store', 'update', 'show']]
	);
	route::get('verifyEmail','UserController@verifyEmailNotExist');
	Route::put('user/{id}/password','UserController@updatePassword');

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

	Route::resource('order', 'OrderController',
		['only' => ['show']]
	);

	Route::get('orders','OrderController@indexTwo');

	Route::post('order/{id}/design','OrderController@design');
	Route::post('order/{id}/taller','OrderController@taller');
	Route::post('order/{id}/cancel','OrderController@cancel');

	Route::resource('print', 'PrintController',
		['only' => ['index','store', 'update']]
	);

	Route::resource('order.abonos', 'AbonosController',
		['only' => ['store']]
	);
});