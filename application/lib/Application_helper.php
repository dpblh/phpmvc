<?php 

function isget() {
	return $_SERVER['REQUEST_METHOD'] == 'GET';	
}


function ispost() {
	return (bool)$_SERVER['REQUEST_METHOD'] == 'POST';	
}


function isput() {
	return (bool)($_SERVER['REQUEST_METHOD'] == 'PUT' || $_POST['_method'] == 'put');	
}


function isdelete() {
	return (bool)($_SERVER['REQUEST_METHOD'] == 'DELETE' || $_POST['_method'] == 'delete');	
}

 ?>
