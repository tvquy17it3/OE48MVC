<?php 

class Model {
	protected $conn = null;
    protected $result = null;
    protected $statement = null;
    protected $table="";
    protected $limit = 20;
    protected $offset= 0;

	public function table($tableName)
    {
    	$database = Database::getInstance();
		$this->conn = $database->connection;
        $this->table = $tableName;
        return $this;
    }

	public function limit($limit)
    {
        $this->limit=$limit;
        return $this;
    }

    public function resetQuery()
    {
        $this->limit = 20;
        $this->offset= 0;
    }

    public function find($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->statement= $this->conn->prepare($sql);
        $this->statement->bind_param('i',$id);
        $this->statement->execute();
        $this->resetQuery();

        $result = $this->statement->get_result()->fetch_object();
        return $result;
    }

    //get limit defaul 20 from table
    public function get()
    {
    	$sql = "SELECT * FROM $this->table LIMIT ? OFFSET ?";
        $this->statement = $this->conn->prepare($sql);
        $this->statement->bind_param('ii', $this->limit,$this->offset);
        $this->statement->execute();
        $this->resetQuery();

        $result = $this->statement->get_result();
        $returnData =[];
        while($rows=$result->fetch_object()){
            $returnData[]=$rows;
        }
        return $returnData;
    }

    //get All
    public function all()
    {
        $sql = "SELECT * FROM $this->table";
        $this->statement = $this->conn->prepare($sql);
        $this->statement->execute();
        $this->resetQuery();

        $result = $this->statement->get_result();
        $returnData =[];
        while($rows=$result->fetch_object()){
            $returnData[]=$rows;
        }
        return $returnData;
    }

    public function insert($data=[])
    {
    
        $fields = implode(',',array_keys($data));
        $valuesStr= implode(',',array_fill(0, count($data), '?'));
        $values = array_values($data);

        $sql = "INSERT INTO $this->table($fields) value($valuesStr)";
        $this->statement=$this->conn->prepare($sql);
        $this->statement->bind_param( str_repeat('s',count($data)),...$values);
        $this->statement->execute();

        return $this->statement->affected_rows;
    }

    public function where($value1,$condition,$value2)
    {   
        $sql ="SELECT* FROM $this->table WHERE $value1 $condition ? ORDER BY id DESC LIMIT ?";
        $this->statement=$this->conn->prepare($sql);
        $this->statement->bind_param('si',$value2,$this->limit);
        $this->statement->execute();
        $this->resetQuery();

        $result = $this->statement->get_result();
        $returnData =[];
        while($rows=$result->fetch_object()){
            $returnData[]=$rows;
        }
        
        return $returnData;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id= ?";
        $this->statement=$this->conn->prepare($sql);
        $this->statement->bind_param('i',$id);
        $this->statement->execute();

        return $this->statement->affected_rows;
    }

    public function update($id,$data= [])
    {
        $keyValues =[];
        foreach($data as $key =>$values){
            $keyValues[]=$key.'=?';
        }
        $setField =implode(',',$keyValues);
        $values = array_values($data);
        $values[]=$id;

        $sql = "UPDATE $this->table SET $setField WHERE id=? LIMIT 1";
        $this->statement=$this->conn->prepare($sql);
        $dataType = str_repeat('s',count($data)).'i';
        $this->statement->bind_param($dataType,...$values);
        $this->statement->execute();
        $this->resetQuery();

        return $this->statement->affected_rows;
    }

    //check email and password
    public function auth_attempt($email,$password)
    {   
        $sql ="SELECT* FROM $this->table WHERE email = ? ";
        $this->statement=$this->conn->prepare($sql);
        $this->statement->bind_param('s',$email);
        $this->statement->execute();
        
        $pass2 = $this->statement->get_result()->fetch_object()->password;
        if (password_verify($password,$pass2)) {
            return true;
        }
        return false;
    }


    public function select($sql)
    {
        $this->statement = $this->conn->prepare($sql);
        $this->statement->execute();

        $result = $this->statement->get_result();
        $returnData =[];
        while($rows=$result->fetch_object()){
            $returnData[]=$rows;
        }
        return $returnData;
    }

    //insert, update, detele
    public function command($sql)
    {
        $this->statement=$this->conn->prepare($sql);
        $this->statement->execute();
        return $this->statement->affected_rows;
    }

    public function auth()
    {   
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
        
            $sql ="SELECT id, name, email,role FROM users WHERE email = ?";
            $this->statement= Database::getInstance()->connection->prepare($sql);
            $this->statement->bind_param('s',$email);
            $this->statement->execute();
            
            $auth = $this->statement->get_result()->fetch_object();
            return $auth;
        }
        return [];
    }
 
}

?>