<?php 
class login extends Controller{

	public $userModel;

	function __construct()
	{
		$this->userModel = $this->model('UserModel');
	}

	function index(){
		if (isset($_SESSION['email'])) {
			header('Location: ' .BASE_URL);
		}
		
		$this->view("applayout",[
				'page' => 'login',
				'title'=> "Đăng nhập",
			]);
	}

	public function authenticate()
    {
    	if (isset($_POST['login'])) {
	        if ($this->userModel->auth_attempt($_POST['email'],$_POST['password'])) {
	        	$_SESSION['email'] = $_POST['email'];
	            header('Location: ' .BASE_URL);
	        }else {
	        	$this->view("applayout",[
							'page' => 'login',
							'title'=> "Đăng nhập",
							'Err'=> "Sai Email hoặc mật khẩu!",
						]);
	        }
	    }else {
			header('Location: ' .BASE_URL."login");
		}
    }

    public function logout(){
    	unset($_SESSION['email']);
    	header('Location: ' .BASE_URL);
    }
}
?>