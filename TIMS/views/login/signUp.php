<?php
session_start();
    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/User.class.php' );    
    require_once( ROOT_DIR.'/../service/LoginService.php' );

$message ="";
$ErrNew_User_name = $ErrSignup_Password = $Errconfirm_signup_Password = "";
$signup_password = $confirm_signup_password =  "";

$error = false;

 if(isset($_SESSION["message"])){
        $message = $_SESSION["message"];
        unset($_SESSION["message"]);
 }



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_user_name = $_POST['new_user_name'];
    $signup_password = $_POST['signup_password'];
    $confirm_signup_password = $_POST['confirm_signup_password'];

    

 //name
    if(empty($new_user_name)){
      $ErrNew_User_name = "* user name should not be empty";
        $error = true;
    }

 //password
    if(empty($signup_password)){
      $ErrSignup_Password = "  Signup Password should not be empty";
        $error = true;
    }
// confirm password
    if(empty($confirm_signup_password)){
      $Errconfirm_signup_Password = "  Signup confirm Password should not be empty";
      $error = true;
    }


 
  if($error == true ){
    $message = "please enter the valid details";
  }
