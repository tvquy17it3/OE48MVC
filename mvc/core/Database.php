<?php
class Database
{
    private static $instance;
    public $connection;
 
    private function __construct()
    {
        $host="localhost";
        $user="root";
        $pass ="";
        $db ="oe_mvc";
        $this->connection= new mysqli($host,$user,$pass,$db) or die("connect fail!!");
        $this->connection->query('SET NAMES UTF8');
    }
 
    public static function getInstance()
    {
        if (static::$instance == null) {
            static::$instance = new Database();
        }

        return static::$instance;
    }
}