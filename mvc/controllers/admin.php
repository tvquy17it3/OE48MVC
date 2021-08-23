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
		$this->view("admin/adlayout",[
				'title'=> "Index",
			]);
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

	//show posts published
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

	//show posts unpublished
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

	function post_create()
	{
		$this->view("admin/adlayout",[
				'page'=>'admin/post-create',
				'title'=> "Viết bài",
		]);
	}














	//random fake post.
	function post_random($rand){
		$t = ["Est ","quae ","voluptatibus ","repellat ","dolore ","Sequi ","eum ","pariatur ","opw ","voluptas ","recusandae ","rerum ","nesciunt ","iste ","voluptatem "];
		$n = count($t)-1;
		
		for ($i=0; $i < $rand; $i++) { 
			$title = $t[rand(0,$n)].$t[rand(0,$n)].$t[rand(0,$n)].$t[rand(0,$n)].$t[rand(0,$n)];
			$slug = $this->slugify($title);
			$inser = $this->postModel->insert([
			'title'     => $title,
		    'slug'      => $slug.'-'.time(),
		    'thumbnail' =>"https://d25tv1xepz39hi.cloudfront.net/2016-01-31/files/1045.jpg",
		    'body'      => $title.$title,
		    'user_id'   => 2,
		    'published' => rand(0,1),
		]);
		echo $inser;
		}
	}
	//create slug
	function slugify($text, string $divider = '-')
	{

	  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
	  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	  $text = preg_replace('~[^-\w]+~', '', $text);
	  $text = trim($text, $divider);

	  // remove duplicate divider
	  $text = preg_replace('~-+~', $divider, $text);
	  $text = strtolower($text);

	  if (empty($text)) {
	    return 'n-a';
	  }

	  return $text;
	}



///////////POST///////////////
}

?>