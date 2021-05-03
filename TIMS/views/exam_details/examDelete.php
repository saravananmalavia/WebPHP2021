<?php
session_start();
 require_once 'examClass.php';
 require_once 'examService.php';


$exam_time_table_id =$_GET['exam_time_table_id'];

$studentservice = new ExamService();
    $result = $studentservice->deleteExam($exam_time_table_id);



 if ( $result > 0) {
 			$_SESSION["message"] = "exam details for exam_time_table_id : $exam_time_table_id deleted successfully";
 		header("Location: exam_View_All.php");

		} else {
 			$message = "Error creating database: " ;
		}



?>