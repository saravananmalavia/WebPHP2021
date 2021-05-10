<?php
session_start();
//require_once '../../course/Course.class.php';
//require_once '../../course/Course.Service.php';
    // require_once 'attendance.class.php';
    // require_once 'AttendanceService.php';

    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/attendance.class.php' );    
    require_once( ROOT_DIR.'/../service/AttendanceService.php' );

$student_attendance_id =$_GET['student_attendance_id'];

$attendanceService = new attendanceService();
$result = $attendanceService->deleteAttendance($student_attendance_id);

if($result > 0){
          $_SESSION["message"] = "Attendance details deleted successfully !";
        }
        else{
          $_SESSION["message"] = "Server busy please try again later !";
          
        }

       header("Location: attendance_view_all.php");


?>