<?php

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function(){
	Route::get('/products', 'ProductController@index');					// listado
	Route::get('/products/create', 'ProductController@create');			// formulario
	Route::post('/products', 'ProductController@store');				// registrar
	Route::get('/products/{id}/edit', 'ProductController@edit');		// formulario
	Route::post('/products/{id}/edit', 'ProductController@update');		// editar
	Route::delete('/products/{id}', 'ProductController@destroy');		// form eliminar

	Route::get('/products/{id}/images', 'ImageController@index');		// listado
	Route::post('/products/{id}/images', 'ImageController@store');		// registrar
	Route::delete('/products/{id}/images', 'ImageController@destroy');	// form eliminar
});
