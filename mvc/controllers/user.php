<?php 
require_once "./mvc/core/helper.php";
class user extends Controller{
	use helper;
	public $userModel;

	function __construct()
	{
		$this->userModel = $this->model('UserModel');
	}

	// show all accounts
	function index(){
		$user = $this->userModel->limit(30)->get();
		$this->view("layout",[
				'page'=>'user/accounts',
				'title'=> "Tất cả tài khoản",
				'user'=> $user
			]);
	}   

	// show accounts editor role =2
	function editor(){
		$user = $this->userModel->limit(30)->where("role","=","2");
		$this->view("layout",[
				'page'=>'user/accounts',
				'title'=> "Tài khoản kiểm duyệt",
				'user'=> $user
			]);
	}  

	// show accounts blocks
	function block(){
		$user = $this->userModel->limit(30)->where("role","=","0");
		$this->view("layout",[
				'page'=>'user/blocks',
				'user'=> $user
			]);
	} 

	// show info
	function show($id){
		$user = $this->userModel->find($id);
		$this->view("show-user",[
				'page'=>'user',
				'user'=> $user
			]);
	}

	function store(){
		$rand = random_int(10,1000);
		$inser = $this->userModel->insert([
			'name'=> "test".$rand,
		    'email'=>'test'.$rand."@gmail.com",
		    'phone' =>"",
		    'role'=>3,
		    'password'=> md5("123456")
		]);
		echo $inser;
	}

	function test(){
		$this->view("layout");
	}

	function delete($id)
	{
		$rs = $this->userModel->delete($id);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	function role_user($id,$role)
	{
		echo "block_user".$id;
		$rs = $this->userModel->update($id,$data= ['role'=>$role]);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}

?>