<?php
session_start();
//require_once '../../course/Course.class.php';
//require_once '../../course/Course.Service.php';
    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../course/course.class.php' );    
    require_once( ROOT_DIR.'/../course/course.service.php' );
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