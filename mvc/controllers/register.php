<?php 
class register extends Controller{

	public $userModel;

	function __construct()
	{	
		if (isset($_SESSION['email'])) {
			header('Location: ' .BASE_URL);
		}
		$this->userModel = $this->model('UserModel');
	}
	function index(){
		$this->view("applayout",[
					'page' => 'register',
					'title'=> "Đăng ký tài khoản",
				]);
	}

	function check_email()
	{
		$email = $_POST['email'];
		echo $this->userModel->checkEmail($email);
	}


	function store(){
		if (isset($_POST['store'])) {
			$Err = "";
			if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["password"])) {
               	$Err = "Vui lòng nhập đầy đủ thông tin!";
            }else {
            	$email = strtolower($_POST['email']);

            	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $Err = "Email không đúng định dạng"; 

               	}else {
               		// check email in DB 
               		$check_email = $this->userModel->where("email","=",$email);
               		if (!count($check_email)) {
               			//insert new account
               			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
               			$insert = $this->userModel->insert([
						    'name'=> $_POST['name'],
						    'email'=>$email,
						    'phone' =>$_POST['phone'],
						    'role'=>3,
						    'password'=> $password,
						]);

						if ($insert == 1) {
							//save email
				            $_SESSION['email'] = $_POST['email'];
				            $_SESSION['register'] = "Đăng ký thành công";
				            header('Location: ' .BASE_URL);
				        }else {
				        	$Err ="Đã có lỗi xảy ra!!";
				        }
               		}else{
               			$Err ="Email đã tồn tại!!";
               		}
               		
               	}
	        }
	        $this->view("applayout",[
						'page' => 'register',
						'title'=> "Đăng ký tài khoản",
						'Err'=> $Err,
					]);

		}else {
			header('Location: ' .BASE_URL);
		}
	}
}
?>