<?php 

	use core\Route as Route;

	Route::get('/person', 'person', 'index');
	Route::post('/person', 'person', 'create');
	Route::get('/person/niw', 'person', 'niw');
	Route::put('/person/(:id)', 'person', 'update');
	Route::delete('/person/(:id)', 'person', 'destroy');
	Route::get('/person/(:id)', 'person', 'show');
	Route::get('/person/(:id)/edit', 'person', 'edit');



	Route::get('/404', '404', 'index');
	Route::root('person', 'index');
 ?>