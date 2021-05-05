<?php
session_start();
 require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/staffClass.php' );    
    require_once( ROOT_DIR.'/../service/staffService.php' );

$staff_id = "";
$staff_id =$_GET['staff_id'];

$staffservice = new StaffService();
    $result = $staffservice->deleteStaff($staff_id);



 if ( $result > 0) {
 			$_SESSION["message"] = "staff details for staff_id: $staff_id deleted successfully";
 		

		} else {
 			$message = "Error creating database: " ;
		}

	header("Location: staff_View_All.php");

?>