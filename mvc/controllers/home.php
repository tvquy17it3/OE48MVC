<?php 

class home extends Controller{

	function index(){
		if(isset($_SESSION['email'])){
			echo $_SESSION['email'];
			unset($_SESSION['email']);
		}
		
		if (isset($_SESSION['register'])) {
			echo "Đăng ký thành công!";
			unset($_SESSION['register']);
		}
		
	}

	function show($id){
		echo "show: ".$id;
	}
}

?>