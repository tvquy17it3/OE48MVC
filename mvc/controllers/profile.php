<?php

class profile extends Controller{

	public $userModel;
	public $postModel;

	function __construct()
	{
		$this->userModel = $this->model('UserModel');
		$this->postModel = $this->model('PostModel');
	}


////////////////// PROFILE //////////////
	//view show profile
	public function index()
	{
		$id = Auth::getUser()->id;
		$user = $this->userModel->find($id);
		$this->view("applayout",[
				'page' =>'user/profile',
				'title'=> "profile",
				'user' => $user,
		]);
	}


	//view edit infor
	public function edit()
	{
		$id = Auth::getUser()->id;
		$user = $this->userModel->find($id);
		$this->view("applayout",[
				'page' =>'user/edit',
				'title'=> "Sửa thông tin",
				'user' => $user,
		]);
	}


	//view edit avatar
	public function avatar()
	{
		$id = Auth::getUser()->id;
		$user = $this->userModel->find($id);
		$this->view("applayout",[
				'page' =>'user/edit-avatar',
				'title'=> "Cập nhật avatar",
				'user' => $user,
		]);
	}

	//update infor
	public function update()
	{
		$id = Auth::getUser()->id;
		if (isset($_POST['update'])) {
		  	$insert = $this->userModel->update($id,[
					    'name'   => $_POST['name'],
					    'phone'  => $_POST['phone'],
					    'gender' => $_POST['gender'],
					    'address'=> $_POST['address'],
					]);

		  	if ($insert>0) {
		  		$noti = "Đã cập nhật thành công!";
		  	}else{
		  		$noti = "Đã có lỗi xảy ra!";
		  	}

		  	$user = $this->userModel->find($id);
			$this->view("applayout",[
					'page' =>'user/edit',
					'title'=> "Sửa thông tin",
					'user' => $user,
					'noti' => $noti,
			]);

		}else {
				header('Location: ' .BASE_URL."profile");
		}
	}

	//upload update avatar
	public function upload()
	{

		if(isset($_FILES['image'])){
			$noti = "";
		    $errors= array();
		    $file_name = $_FILES['image']['name'];
		    $file_size = $_FILES['image']['size'];
		    $file_tmp  = $_FILES['image']['tmp_name'];
		    $file_type = $_FILES['image']['type'];
		    $tmp = explode('.', $file_name);
			$file_ext = end($tmp);
		    $extensions= array("jpeg","jpg","png");
		      
		    if(in_array($file_ext,$extensions)=== false){
		        $noti = "Chọn ảnh có định dạng jpeg, png, jpg.";
		    }elseif($file_size > 2097152) {
		        $noti = 'Chọn ảnh nhỏ hơn 2 MB';
		    }
		      
		    if($noti==""){
		    	$link = "public/images/".$file_name;
		       move_uploaded_file($file_tmp,"./".$link);
		       $insert = $this->userModel->update(Auth::getUser()->id,['profile_photo'=> BASE_URL.$link]);
		       $noti = 'Đã cập nhật!';
		    }

		    $id = Auth::getUser()->id;
	       	$user = $this->userModel->find($id);
			$this->view("applayout",[
					'page'  =>'user/edit-avatar',
					'title' => "Cập nhật avatar",
					'user'  => $user,
					'noti'  => $noti,
			]);
	   	}else {
			header('Location: ' .BASE_URL."profile/avatar");
		}
	}

//////////////////END PROFILE //////////////

////////////////// POST ///////////////////

  public function post()
  {
  	$id = Auth::getUser()->id;
  	$posts = $this->postModel->where('user_id', "=", $id);
   	$user = $this->userModel->find($id);
		$this->view("applayout",[
				'page'  =>'user/list-post',
				'title' => "Bài viết",
				'user'  => $user,
				'posts' => $posts,
		]);
  }



//////////////////END POST ////////////////

}