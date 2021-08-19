<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Show User</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style type="text/css">
		#header,#footer{
			background-color: blue;
		}
		div{padding: 20px;}

	</style>
</head>
<body>
	<div id="header"> </div>
	<div id="content"> 
		<?php require_once "./mvc/views/".$data['page'].".php";?>
	</div>
	<div id="footer"> </div>
</body>
</html>