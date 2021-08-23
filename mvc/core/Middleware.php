<?php

class Middleware{


	function Authenticate($controller, $action)
	{
		$route = ['profile','user','admin'];

		if (in_array($controller,$route)) {
			if (!isset(Auth::getUser()->id)) {
				header('Location: ' .BASE_URL."login");
			}

			if ($controller == "admin" && Auth::getUser()->role != 1) {
					include('./mvc/views/403.php');
					die();
			}
		}
	}

}