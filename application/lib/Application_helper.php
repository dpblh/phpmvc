<?php 
// print_r($_POST);
// print_r($_POST['_method']);
// exit;
function isget() {
	return $_SERVER['REQUEST_METHOD'] == 'GET';	
}


function ispost() {
	return $_SERVER['REQUEST_METHOD'] == 'POST';	
}


function isput() {
	return $_SERVER['REQUEST_METHOD'] == 'PUT' || (isset($_POST['_method']) && $_POST['_method'] == 'put');	
}


function isdelete() {
	return $_SERVER['REQUEST_METHOD'] == 'DELETE' || (isset($_POST['_method']) && $_POST['_method'] == 'delete');	
}

?>
