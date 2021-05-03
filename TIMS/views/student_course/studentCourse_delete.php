<?php
session_start();
    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/studentCourseClass.php' );    
    require_once( ROOT_DIR.'/../service/studentCourseService.php' );
$student_course_id =$_GET['student_course_id'];

$studentCourseService = new StudentCourseService();
$result = $studentCourseService->deleteStudentCourse($student_course_id);

if($result > 0){
          $_SESSION["message"] = "Student Course details deleted successfully !";
        }
        else{
          $_SESSION["message"] = "Server busy please try again later !";
          
        }

       header("Location: studentCourse_view_all.php");


?>