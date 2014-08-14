<!DOCTYPE html>
<html>
	<title>phpmvc</title>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="/public/stylesheets/bootstrap.css">
		<script type="text/javascript" src="/public/javascripts/jquery.js"></script>
		<script type="text/javascript" src="/public/javascripts/bootstrap.min.js"></script>
	</head>
	<body>
		<?php 
			include APP_PATH.'/application/views/'.$view_name.'.php';
		 ?>
	</body>
</html>