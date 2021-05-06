<?php
session_start();
    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/courseClass.php' );    
    require_once( ROOT_DIR.'/../service/courseService.php' );
$course_id =$_GET['course_id'];

$courseService = new courseService();
$result = $courseService->deleteCourse($course_id);

if($result > 0){
          $_SESSION["message"] = "Course details deleted successfully !";
        }
        else{
          $_SESSION["message"] = "Server busy please try again later !";
          
        }

       header("Location: course_view_all.php");


?>