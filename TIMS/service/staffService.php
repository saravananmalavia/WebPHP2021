 <?php
require_once '../../config/config.php';
require_once( ROOT_DIR.'/../db/DBConnection.class.php' );  
require_once( ROOT_DIR.'/../model/staffClass.php' );
//require_once '../../db/DBConnection.class.php';


class StaffService{

// insert the student record
function addStaff(Staff $staff){

	  //$roll_no = $student->setRollNo();
	  $staff_name  = $staff->getStaffName();
	  $address = $staff->getAddress();
	  $gender = $staff->getGender();
	  $email = $staff->getEmail();
	  $mobile = $staff->getMobile();
	  $education = $staff->getEducation();
	  $subject = $staff->getSubject();
	 
	  $sql  =  " INSERT INTO tbl_staff_details(staff_name , address , gender , email , mobile , education , subject) VALUES('$staff_name','$address','$gender', '$email', $mobile ,'$education','$subject') ";
	     echo "$sql";
		$output = DBConnection::execNonQery($sql);
		return $output;

}

// update the student
function updateStaff(Staff $staff){

	  $staff_id = $staff->getStaffID();
	  $staff_name  = $staff->getStaffName();
	  $address  = $staff->getAddress();
	  $gender = $staff->getGender();
	  $email = $staff->getEmail();
	  $mobile = $staff->getMobile();
	  $education = $staff->getEducation();
	  $subject = $staff->getSubject();
	  $sql  =  " UPDATE tbl_staff_details SET 
	  			staff_name = '$staff_name', 
	  			address = '$address' ,
	  			gender = '$gender',
	  			email = '$email',
	  			mobile = $mobile ,
	  			education = '$education'
	  			WHERE staff_id = $staff_id " ;
	  echo "$sql";
	$output = DBConnection::execNonQery($sql);
	return $output;

}

// Delete the particular student
function deleteStaff($staff_id){

	$sql  =  "DELETE FROM tbl_staff_details WHERE staff_id = $staff_id";
	//$result = DBConnection::execQery($sql);
	return DBConnection::execNonQery($sql);
	 	


}

// get the particular student details
function getStaff($staff_id){
	$sql  =  "SELECT * FROM tbl_staff_details WHERE staff_id = $staff_id";
	//echo $sql."<br>";
	$result = DBConnection::execQery($sql);
	return $result;
}


// get all the students details
function getStaffs(){
	$sql  =  "SELECT * FROM tbl_staff_details ORDER BY staff_id DESC";
	$result = DBConnection::execQery($sql);
	return $result;
}



}


?>