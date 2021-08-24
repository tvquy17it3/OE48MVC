<?php

class Middleware{


	function Authenticate($controller, $action)
	{
		$ctrl= ['profile','user','admin'];
		$act = ['create','store','edit','delete'];

		if (in_array($controller,$ctrl)) {
			if (!isset(Auth::getUser()->id)) {
				header('Location: ' .BASE_URL."login");
			}

			if ($controller == "admin" && Auth::getUser()->role != 1) {
				include('./mvc/views/403.php');
				die();
			}
		}

		if ($controller == "post" && in_array($action,$act)) {
			if (!isset(Auth::getUser()->id)) {
				header('Location: ' .BASE_URL."login");
			}
		}

	}

}