<?php 
require_once "./mvc/core/helper.php";
class user extends Controller{
	use helper;
	public $userModel;
	public $postModel;

	function __construct()
	{
		$this->userModel = $this->model('UserModel');
		$this->postModel = $this->model('PostModel');
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


	function testtable()
	{
		$rs= $this->userModel->find(2);
		print_r($rs);
		echo "<br>";
		echo "<br>";
		$rs2 = $this->postModel->limit(1)->get();
		print_r($rs2);
		echo "<br>";
		echo "<br>";
		$rs3 = $this->postModel->get();
		foreach ($rs3 as $value) {
			echo $value->title;
			echo "<br>";
		}

		echo "<br>";
		echo "<br>";

		$rs4 = $this->userModel->limit(3)->get();
		print_r($rs4);
		echo "<br>";
		echo "<br>";

		$rs5 = $this->userModel->all();
		foreach ($rs5 as $valueu) {
			echo $valueu->email;
			echo "<br>";
		}

		echo "<br>";
		echo "<br>";
		$rs6 = $this->userModel->select("SELECT* FROM users WHERE role!='1' ");
		print_r($rs6);
	}
}

?>