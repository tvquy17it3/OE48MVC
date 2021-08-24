<?php 

class post extends Controller{

	public $userModel;
	public $postModel;

	function __construct()
	{
		$this->userModel = $this->model('UserModel');
		$this->postModel = $this->model('PostModel');
	}

	function index(){
		header('Location: ' . BASE_URL);
	}

	function show($slug){
		$post = $this->postModel->limit(1)->where('slug','=',$slug);
		if ($post) {
			$data = [];
			foreach ($post as $value) {
				$data[] = $value;
			}
			$author = $this->userModel->find($data[0]->user_id);
			$this->view("applayout",[
					'page'  =>'show-post',
					'title' => "Bài viết",
					'post'  => $data,
					'author'=> $author,
			]);
		}else{
			header('Location: ' . BASE_URL);
		}
	}
}

?>