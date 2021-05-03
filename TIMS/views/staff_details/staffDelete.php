<?php
session_start();
 require_once 'staffClass.php';
 require_once 'staffService.php';

$staff_id = "";
$staff_id =$_GET['staff_id'];

$staffservice = new StaffService();
    $result = $staffservice->deleteStaff($staff_id);



 if ( $result > 0) {
 			$_SESSION["message"] = "staff details for staff_id: $staff_id deleted successfully";
 		header("Location: staff_View_All.php");

		} else {
 			$message = "Error creating database: " ;
		}

	

?>