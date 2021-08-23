<?php 

class Auth extends Model{

	public static $getUser;

	private function __construct()
    {
       $this->user = $this->auth();
    }
 
    public static function getUser()
    {
        if (static::$getUser == null) {
            static::$getUser = new Auth();
        }
        return static::$getUser->user;
    }
}