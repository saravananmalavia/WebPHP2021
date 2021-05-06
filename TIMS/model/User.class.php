<?php 
// DTO - Data Transaction Object
// to transport data amoung layers

class User{
	public $user_id;
    public $user_name;
    public $password;
    public $user_type;



    function __construct(){

    }



    function setUserName($name) {
    	$this->user_name = $name ;
    }
    function getUserName() {
    	return $this->user_name;
    }


    function setUserId($user_id) {
    	$this->user_id = $user_id;
    }
    function getUserId() {
    	return $this->user_id;
    }


    function setPassword($password) {
    	$this->password = $password;
    }
    function getPassword() {
    	return $this->password;
    }


    function setUserType($user_type) {
    	$this->user_type = $user_type ;
    }
    function getUserType() {
    	return $this->user_type;
    }

}
    