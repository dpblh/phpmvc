<?php 
	Route::root('index', 'index');
	Route::get('/index/index', 'index', 'index');
	Route::get('/index/one', 'index', 'one');
	Route::get('/index', 'index', 'index');
	Route::get('/404', '404', 'index');

	Route::post('/index/create', 'index', 'create');


 ?>