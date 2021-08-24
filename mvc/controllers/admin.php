<?php 
require_once "./mvc/core/helper.php";
class admin extends Controller{
	use helper;
	public $userModel;
	public $postModel;

	function __construct()
	{
		$this->userModel = $this->model('UserModel');
		$this->postModel = $this->model('PostModel');
	}

	function index(){
		header('Location: ' . BASE_URL."admin/post_draft");
	}   

/////////////////// USERS//////////////////////
	// show all accounts
	function all_accounts(){
		$user = $this->userModel->all();
		$this->view("admin/adlayout",[
				'page'=>'admin/accounts',
				'title'=> "Tất cả tài khoản",
				'user'=> $user
			]);
	}   

	// show accounts editor role =2
	function editor(){
		$user = $this->userModel->limit(50)->where("role","=","2");
		$this->view("admin/adlayout",[
				'page'=>'admin/accounts',
				'title'=> "Tài khoản kiểm duyệt",
				'user'=> $user
			]);
	}  

	// show accounts blocks
	function block(){
		$user = $this->userModel->limit(30)->where("role","=","0");
		$this->view("admin/adlayout",[
				'page'=>'admin/blocks',
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

	//create account random
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

	//delete account
	function delete_user($id)
	{
		$rs = $this->userModel->delete($id);
		$rs ? $_SESSION['success']="Đã thực hiện" : "";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	//update role account (get)
	function role_user($id,$role)
	{
		echo "block_user".$id;
		$rs = $this->userModel->update($id,$data= ['role'=>$role]);
		$rs ? $_SESSION['success']="Đã thực hiện" : "";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	//update role method POST
	function update_role()
	{
		if (isset($_POST['update_role'])) {
			$id = $_POST['user_id'];
			$rs = $this->userModel->update($id,$data= ['role'=>$_POST['role_user']]);
			$rs ? $_SESSION['success']="Đã thực hiện" : "";
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else{
			header('Location: ' . BASE_URL."admin");
		}
	}

///////////USERS////////////////



///////////POST///////////////

	//view show posts published
	function post_show(){
		$posts = $this->postModel->select("
			SELECT posts.id, title, slug, thumbnail, posts.created_at, name, email
			FROM posts 
			INNER JOIN users ON users.id = posts.user_id
			WHERE published = 1
		");
		$this->view("admin/adlayout",[
				'page'=>'admin/post-published',
				'title'=> "Các bài đã đăng",
				'posts'=> $posts
		]);
	}   


	//view show posts unpublished
	function post_draft(){
		$posts = $this->postModel->select("
			SELECT posts.id, title, slug, thumbnail, posts.created_at, name, email
			FROM posts 
			INNER JOIN users ON users.id = posts.user_id
			WHERE published = 0
		");
		$this->view("admin/adlayout",[
				'page'=>'admin/post-unpublished',
				'title'=> "Các bài đang chờ duyệt",
				'posts'=> $posts
		]);
	} 


	//update published or unpublished post
	function post_publish($id,$published)
	{

		$rs = $this->postModel->update($id,$data = ['published'=>$published]);
		$rs ? $_SESSION['success']="Đã thực hiện" : "";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}


	//delete post
	function post_delete($id)
	{
		$rs = $this->postModel->delete($id);
		$rs ? $_SESSION['success']="Đã thực hiện" : "";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}


	// view edit post
	function post_edit($id)
	{
		$post   = $this->postModel->find($id);
		if(!$post){
			header('Location: ' . BASE_URL."admin/post_show");
		}
		$author = $this->userModel->find($post->user_id);

		$this->view("admin/adlayout",[
				'page'=>'admin/post-edit',
				'title'=> "Chỉnh sửa bài viết",
				'post'=> $post,
				'author' => $author,
		]);
	}

	//view create post
	function post_create()
	{
		$this->view("admin/adlayout",[
				'page'=>'admin/post-create',
				'title'=> "Viết bài",
		]);
	}

	// store post
	function post_store()
	{
		if (isset($_POST['store'])) {
			$noti=[];
			if (empty($_POST["title"]) || empty($_POST["body"])) {
               	$noti[] = "Vui lòng nhập đầy đủ!";
            } else{
				if(isset($_FILES['image'])){
				    $errors= array();
				    $file_name = $_FILES['image']['name'];
				    $file_size =$_FILES['image']['size'];
				    $file_tmp =$_FILES['image']['tmp_name'];
				    $file_type=$_FILES['image']['type'];
				    $tmp = explode('.', $file_name);
					$file_ext = end($tmp);
				    $extensions= array("jpeg","jpg","png");
				      
				    if(in_array($file_ext,$extensions)=== false){
				        $noti[]= "Chọn ảnh có định dạng jpeg, png, jpg.";
				    }

				    if($file_size > 2097152) {
				        $noti[]= 'Chọn ảnh nhỏ hơn 2 MB';
				    }

				    if(empty($noti)){
				    	//Save file image
				    	$link = "public/images/".time().$file_name;
				        $title = $_POST['title'];
				        $published =  $_POST['published'];
				        $slug = $this->slugify($title."-".rand(100,1000));

				        //insert post
				        $insert = $this->postModel->insert([
							'title'     => $title,
						    'slug'      => $slug,
						    'thumbnail' => BASE_URL.$link,
						    'body'      => $_POST['body'],
						    'user_id'   => Auth::getUser()->id,
						    'published' => $published,
						]);

				        //check post
						if ($insert > 0) {
							move_uploaded_file($file_tmp,"./".$link);
							$published ? $h = "admin/post_show" : $h = "admin/post_draft";
							$_SESSION['success'] = "Đã tạo bài viết";
							header('Location: ' .BASE_URL.$h);
						}

						$noti[] = "Đã có lỗi xảy ra";
				    }
			   	}else{
			   		$noti[] = "Chưa chọn ảnh!";
			   	}
			}

			//Error
			if (!empty($noti)) {
				$this->view("admin/adlayout",[
						'page'	=>'admin/post-create',
						'title'	=> "Viết bài",
						'noti'	=> $noti,
					]);
			}
		}else{
			header('Location: ' . BASE_URL."admin");
		}
	}






	//random fake post.
	function post_random($rand){
		$t = ["Est ","quae ","voluptatibus ","repellat ","dolore ","Sequi ","eum ","pariatur ","opw ","voluptas ","recusandae ","rerum ","nesciunt ","iste ","voluptatem "];
		$n = count($t)-1;
		
		for ($i=0; $i < $rand; $i++) { 
			$title = $t[rand(0,$n)].$t[rand(0,$n)].$t[rand(0,$n)].$t[rand(0,$n)].$t[rand(0,$n)];
			$slug = $this->slugify($title);
			$insert = $this->postModel->insert([
				'title'     => $title,
			    'slug'      => $slug.'-'.time(),
			    'thumbnail' =>"https://d25tv1xepz39hi.cloudfront.net/2016-01-31/files/1045.jpg",
			    'body'      => $title.$title,
			    'user_id'   => 2,
			    'published' => rand(0,1),
			]);
			echo "+".$insert;
		}
	}

///////////POST///////////////
}

?>