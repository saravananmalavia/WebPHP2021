<?php 
session_start();

require_once 'User.class.php';
require_once 'userService.php';

$user_id =$_GET['user_id'];

$userService = new userService();
$result = $userService->deleteUser($user_id);

if($result > 0){
	$_SESSION["message"] = "User details deleted successfully !";
}
else{
	$_SESSION["message"] = "Server busy please try again later !";
}
header("Location: user_details_view_all.php");


?>

