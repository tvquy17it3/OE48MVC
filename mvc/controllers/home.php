<?php 

class home extends Controller{

	function index(){
		$this->model('UserModel');
		echo "ok";
	}

	function show($id){
		echo "show: ".$id;
	}
}

?>