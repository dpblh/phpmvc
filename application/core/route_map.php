<?php 

	use core\Route as Route;

	Route::get('/customer_contact', 'customer_contact', 'index');
	Route::post('/customer_contact', 'customer_contact', 'create');
	Route::get('/customer_contact/highcharts.js', 'customer_contact', 'highcharts');
	Route::get('/customer_contact/niw', 'customer_contact', 'niw');
	Route::put('/customer_contact/(:id)', 'customer_contact', 'update');
	Route::delete('/customer_contact/(:id)', 'customer_contact', 'destroy');
	Route::get('/customer_contact/(:id)', 'customer_contact', 'show');
	Route::get('/customer_contact/(:id)/edit', 'customer_contact', 'edit');



	Route::get('/404', '404', 'index');
	Route::root('customer_contact', 'index');
 ?>