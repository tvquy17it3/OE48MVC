<?php 
class App 
{
	//  domain/home/show/10 => $arr[0]=home , $arr[1] =show, $arr[2]=10
	private $controller = "home";
	private $action = "index";
	private $params;   

	function __construct()
	{	
		$arr = $this->urlprocess();
		
		//controller
		$arr0 = $arr[0] ? strtolower($arr[0]) : $this->controller;

		// check file in folder mvc/controller filename $arr[0]
		if (file_exists("./mvc/controllers/".$arr0.".php")) {
			$this->controller = $arr0;
			unset($arr[0]);
		}
		require_once "./mvc/controllers/".$this->controller.".php";
		$this->controller = new $this->controller;

		//action
		//check action $arr[1] 
		if (isset($arr[1])) {
			$arr1 = strtolower($arr[1]);
			//check function name $arr[1] in class controller
			if (method_exists($this->controller, $arr1)) {
				$this->action = $arr1;
			}

			unset($arr[1]);
		}

		//params
		$this->params = $arr ? array_values($arr):[];

		// print_r($this->params);
		// call action from controller
		call_user_func_array([$this->controller,$this->action], $this->params);
	}



	//trim / to array
	function urlprocess()
	{
		if (isset($_GET['url'])) {
			return explode("/", filter_var(trim($_GET['url'], "/")));
		}
		return ['home'];
	}
}

?>