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
}