<?php 
// DTO - Data Transaction Object
// to transport data amoung layers

class User{
    public $new_user_name;
    public $signup_password;
    public $confirm_signup_password;



    function __construct(){

    }



    function setNewUserName($new_user_name) {
    	$this->new_user_name = $new_user_name ;
    }
    function getNewUserName() {
    	return $this->new_user_name;
    }


    function setSignupPassword($signup_password) {
    	$this->signup_password = $signup_password;
    }
    function getSignupPassword() {
    	return $this->signup_password;
    }


    function setConfirmPassword($confirm_signup_password) {
    	$this->confirm_signup_password = $confirm_signup_password ;
    }
    function getConfirmPassword() {
    	return $this->confirm_signup_password;
    }

}
    