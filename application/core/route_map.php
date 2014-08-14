<?php 

	use core\Route as Route;

	Route::get('/index', 'index', 'index');
	Route::post('/index', 'index', 'create');
	Route::get('/index/niw', 'index', 'niw');
	Route::put('/index/(:id)', 'index', 'update');
	Route::delete('/index/(:id)', 'index', 'destroy');
	Route::get('/index/(:id)', 'index', 'show');
	Route::get('/index/(:id)/edit', 'index', 'edit');



	Route::get('/404', '404', 'index');
	Route::root('index', 'index');
 ?>