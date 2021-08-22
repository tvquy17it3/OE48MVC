<?php 

class post{

	public $postModel;

	function __construct()
	{
		$this->postModel = $this->model('postModel');
	}

	function index(){
		echo "index post";
	}

	function show(){
		echo "show";
	}
}

?>