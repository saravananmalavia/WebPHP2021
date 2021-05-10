<?php
// require_once 'attendance.class.php';
// require_once 'DBConnection.class.php';

require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../db/DBConnection.class.php' );  
    require_once( ROOT_DIR.'/../model/attendance.class.php' );


class AttendanceService{

// insert the student record
function addAttendance(Attendance $attendance){

	  //$roll_no = $student->setRollNo();
	  $student_attendance_id  = $attendance->getstudentattendanceid();
	  $student_id  = $attendance->getstudentid();
	  $attendance_date = $attendance->getattendancedate();
	  $attendance_session = $attendance->getattendancesession();
	  $status = $attendance->getstatus();
	  $remarks = $attendance->getremarks();
	  

	  $sql  =  "insert into attendancelist(student_attendance_id,student_id,attendance_date,attendance_session,status,remarks) VALUES ('$student_attendance_id','$student_id','$attendance_date','$attendance_session','$status','$remarks')";	
	  echo "$sql";
	$output = DBConnection::execNonQery($sql);
	return $output;

}

// update the student
function updateAttendance(Attendance $attendance){

	  $student_attendance_id  = $attendance->getstudentattendanceid();
	  $student_id  = $attendance->getstudentid();
	  $attendance_date = $attendance->getattendancedate();
	  $attendance_session = $attendance->getattendancesession();
	  $status = $attendance->getstatus();
	  $remarks = $attendance->getremarks();
	  
	  $sql  =  "update attendancelist set 
	  			student_id = '$student_id',
				attendance_date = '$attendance_date',
				attendance_session = '$attendance_session',
				status = '$status',
				remarks = '$remarks'
	  			where student_attendance_id = '$student_attendance_id'";
	  echo "$sql";
	$output = DBConnection::execNonQery($sql);
	return $output;

}

// Delete the particular student
function deleteAttendance($student_attendance_id){

	$sql  =  "delete from attendancelist where student_attendance_id = '$student_attendance_id'";
	//$result = DBConnection::execQery($sql);
	return DBConnection::execNonQery($sql);
	 	


}

// get the particular student details
function getAttendance($student_attendance_id){
	$sql  =  "select * from attendancelist where student_attendance_id = '$student_attendance_id'";
	$result = DBConnection::execQery($sql);
	return $result;
}


// get all the students details
function getAttendances(){
	$sql  =  "select * from attendancelist order by student_attendance_id desc";
	$result = DBConnection::execQery($sql);
	return $result;
}



}


?>
