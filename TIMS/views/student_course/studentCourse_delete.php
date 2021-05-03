<?php
session_start();
    require_once '../../student_course/studentCourse.class.php';
    require_once '../../student_course/studentCourseService.php';
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