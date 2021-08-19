<?php

trait helper {

    public function name_role($role)
    {
    	switch ($role) {
    		case '0':
    			return "Đã khóa";
    			break;
    		case '1':
    			return "Admin";
    			break;
    		case '2':
    			return "Kiểm duyệt";
    			break;
    		case '3':
    			return "User";
    			break;
    		default:
    			return $role;
    			break;
    	}
        return $role;
    }
}

?>