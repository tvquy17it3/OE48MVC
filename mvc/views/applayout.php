<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $data['title'];?></title>
	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<!-- Styles -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>public/css/profile.css">
	  <!-- Font Awesome -->
  	<link href="<?php echo BASE_URL; ?>public/fonts/font-awesome.min.css" rel="stylesheet">
</head>

<body>
<div id="app">
	<nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
		<div class="container">
			<a class="navbar-brand" href="" style="color: white"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse"
				data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="{{ __('Toggle navigation') }}">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<!-- Left Side Of Navbar -->
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo BASE_URL; ?>" style="color: white">Trang chủ</a>
					</li>
					<?php 
						if (!isset($_SESSION['email'])) {
							?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo BASE_URL; ?>login" style="color: white">Đăng nhập</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo BASE_URL; ?>register" style="color: white">Đăng ký</a>
							</li>
							<?php
						}else {
							?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo BASE_URL; ?>profile" style="color: white"><?php echo Auth::getUser()->name;?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo BASE_URL; ?>login/logout" style="color: white">Đăng xuất</a>
							</li>
							<?php
						}
					?>
				</ul>
			</div>
		</div>
	</nav>
	<main class="py-4">
		<input hidden="" id="base_url" value="<?php echo BASE_URL; ?>"></div>
		<?php require_once "./mvc/views/".$data['page'].".php";?>
	</main>
</div>

<script type="text/javascript">
	function confirm_delete() {
        return confirm('Are you sure?');
    }
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>
<script src="<?php echo BASE_URL; ?>public/js/register.js"></script>
<script src="<?php echo BASE_URL; ?>public/js/profile.js"></script>
</body>
</html>