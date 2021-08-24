<?php 

class home extends Controller{
	public $userModel;
	public $postModel;

	function __construct()
	{
		$this->userModel = $this->model('UserModel');
		$this->postModel = $this->model('PostModel');
	}

	function index(){
		$posts = $this->postModel->select("
			SELECT posts.id, title, slug, thumbnail, body, posts.created_at, name, email
			FROM posts 
			INNER JOIN users ON users.id = posts.user_id
			WHERE published = 1
			ORDER BY RAND()
			LIMIT 15
		");

		$related = $this->postModel->select("
			SELECT posts.id, title, thumbnail, slug, posts.created_at
			FROM posts 
			WHERE published = 1
			ORDER BY RAND()
			LIMIT 5
		");

		$this->view("applayout",[
				'page'    =>'index',
				'title'   => "Trang chủ",
				'posts'   => $posts,
				'related' =>$related,
		]);
	
	}
}

?>