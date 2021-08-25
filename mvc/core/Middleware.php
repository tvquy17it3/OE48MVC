<?php

class Middleware{


	function Authenticate($controller, $action)
	{
		$ctrl= ['profile','user','admin'];
		$route = ['post/create','post/store','post/edit','post/update','post/delete'];

		//check controller
		if (in_array($controller,$ctrl)) {
			if (!isset(Auth::getUser()->id)) {
				header('Location: ' .BASE_URL."login");
			}

			if ($controller == "admin" && Auth::getUser()->role != 1) {
				include('./mvc/views/403.php');
				die();
			}
		}

		//check route 
		if (in_array($controller."/".$action,$route)) {
			if (!isset(Auth::getUser()->id)) {
				header('Location: ' .BASE_URL."login");
			}
		}

	}

}