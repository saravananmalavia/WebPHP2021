<?php
session_start();

 require_once '../../config/config.php';
 require_once( ROOT_DIR.'/../model/studentDetails.class.php' );
 require_once( ROOT_DIR.'/../service/studentService.php' );
 //require_once 'studentDetails.class.php';
 //require_once 'studentService.php';

$student_id =$_GET['student_id'];

$studentService = new studentService();
$result = $studentService->deleteStudent($student_id);

if($result > 0){
	$_SESSION["message"] = "Student details deleted successfully !";
}
else{
	$_SESSION["message"] = "Server busy please try again later !";
}
header("Location: student_personal_details_view_all.php");


?>