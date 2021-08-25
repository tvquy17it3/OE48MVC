<?php

class Middleware{


	function Authenticate($controller, $action)
	{
		$ctrl= ['profile','user','admin'];
<<<<<<< HEAD
		$route = ['post/create','post/store','post/edit','post/update','post/delete'];

		//check controller
=======
		$act = ['create','store','edit','delete'];

>>>>>>> ab9d09cea1b576fb4e80d4f17f407d5d6804d5e9
		if (in_array($controller,$ctrl)) {
			if (!isset(Auth::getUser()->id)) {
				header('Location: ' .BASE_URL."login");
			}

			if ($controller == "admin" && Auth::getUser()->role != 1) {
				include('./mvc/views/403.php');
				die();
			}
		}

<<<<<<< HEAD
		//check route 
		if (in_array($controller."/".$action,$route)) {
=======
		if ($controller == "post" && in_array($action,$act)) {
>>>>>>> ab9d09cea1b576fb4e80d4f17f407d5d6804d5e9
			if (!isset(Auth::getUser()->id)) {
				header('Location: ' .BASE_URL."login");
			}
		}

	}

}