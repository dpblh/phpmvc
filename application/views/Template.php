<!DOCTYPE html>
<html lang="ru">
	<title>phpmvc</title>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="/public/stylesheets/bootstrap.css">
		<script type="text/javascript" src="/public/javascripts/jquery.js"></script>
		<script type="text/javascript" src="/public/javascripts/bootstrap.min.js"></script>
		<script src="http://code.highcharts.com/highcharts.js"></script>
		<script src="http://code.highcharts.com/modules/exporting.js"></script>
		<script type="text/javascript" src="/public/javascripts/main.js"></script>

	</head>
	<body>
	<header>
		<div class="navbar">
			<div class="navbar-inner">
		    	<a class="brand" href="/">Home</a>
		    </div>
		</div>
	</header>
	<div class="content-fluid">
		<div class="row-fluid">
			<div class="span2">
				<!-- side -->
			</div>
			<div class="span8">
				<?php 
					include APP_PATH.'/application/views/'.$view_name.'.php';
				 ?>
			</div>
			<div class="span2"></div>
		</div>
	</div>
	</body>
</html>