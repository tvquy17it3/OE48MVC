<?
class UserModel extends DB{ 

	public function __construct()
    {
        $this->connect();
        $this->table("users");
    }


	public function sum($a,$b)
	{
		return $a+$b;
	}

	public function checkEmail($email){
		$check_email = $this->where("email","=",$email);
   		if (count($check_email) > 0) {
   			return json_encode("Email này đã tồn tại!");
   		}
   		return json_encode("");
	}
}