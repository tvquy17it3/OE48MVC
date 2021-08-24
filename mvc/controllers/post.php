<?php 
require_once "./mvc/core/helper.php";
class post extends Controller{

	public $userModel;
	public $postModel;
	use helper;

	function __construct()
	{
		$this->userModel = $this->model('UserModel');
		$this->postModel = $this->model('PostModel');
	}

	function index(){
		header('Location: ' . BASE_URL);
	}


	//view show detail post
	function show($slug){
		$post = $this->postModel->limit(1)->where('slug','=',$slug);
		if ($post) {
			$data = [];
			foreach ($post as $value) {
				$data[] = $value;
			}
			$author = $this->userModel->find($data[0]->user_id);
			$related = $this->postModel->select("
				SELECT posts.id, title, thumbnail, slug, posts.created_at
				FROM posts 
				WHERE published = 1
				ORDER BY RAND()
				LIMIT 3
			");
			$this->view("applayout",[
					'page'  =>'show-post',
					'title' => "Bài viết",
					'post'  => $data,
					'related' =>$related,
					'author'=> $author,
			]);
		}else{
			header('Location: ' . BASE_URL);
		}
	}


	//view create post
	function create()
	{
		$id = Auth::getUser()->id;
		$user = $this->userModel->find($id);
		$this->view("applayout",[
				'page' =>'user/create-post',
				'title'=> "Cập nhật avatar",
				'user' => $user,
		]);
	}

	//user create post, upload thumbnail
	function store(){
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
				        $slug = $this->slugify($title."-".rand(100,1000));

				        //insert post
				        $insert = $this->postModel->insert([
							'title'     => $title,
						    'slug'      => $slug,
						    'thumbnail' => BASE_URL.$link,
						    'body'      => $_POST['body'],
						    'user_id'   => Auth::getUser()->id,
						    'published' => 0,
						]);

				        //check post
						if ($insert > 0) {
							move_uploaded_file($file_tmp,"./".$link);
							header('Location: ' .BASE_URL.'profile/post');
						}

						$noti[] = "Đã có lỗi xảy ra";
				    }
			   	}else{
			   		$noti[] = "Chưa chọn ảnh!";
			   	}
			}

			//Error
			if (!empty($noti)) {
				$id = Auth::getUser()->id;
				$user = $this->userModel->find($id);
				$this->view("applayout",[
						'page'	=>'user/create-post',
						'title'	=> "Viết bài",
						'user' => $user,
						'noti'	=> $noti,
					]);
			}
		}else{
			header('Location: ' . BASE_URL);
		}
	}


		//delete account
	function delete($post_id)
	{
		$user_id = $this->postModel->find($post_id)->user_id;		
		if (Auth::getUser()->id == $user_id) {
			$this->postModel->delete($post_id);
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		} else{
			header('Location: ' . BASE_URL);
		}
	}
}

?>