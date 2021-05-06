<?php
require_once '../../config/config.php';
require_once( ROOT_DIR.'/../db/DBConnection.class.php' );  
require_once( ROOT_DIR.'/../model/studentCourseClass.php' );


class StudentCourseService{

// insert the course record
function addStudentCourse(StudentCourse $studentCourse){

	  
	  $student_course_id  = $studentCourse->getStudentCourseID();
	  $student_id  = $studentCourse->getStudentID();
	
	  $course_id = $studentCourse->getCourseID();
	  $course_code = $studentCourse->getCourseCode();
	  
	  $start_date = $studentCourse->getStartDate();
	  $end_date = $studentCourse->getEndDate();
	  
		

	  $sql  =  "insert into student_course_details(student_course_id,student_id,course_id,course_code,start_date,end_date) values('$student_course_id','$student_id','$course_id','$course_code','$start_date','$end_date')";
	  echo "$sql";
	$output = DBConnection::execNonQery($sql);
	return $output;

}

// update the Course
function updateStudentCourse(StudentCourse $studentCourse){

	  $student_course_id  = $studentCourse->getStudentCourseID();
	  $student_id  = $studentCourse->getStudentID();
	  $course_id = $studentCourse->getCourseID();
	  $course_code = $studentCourse->getCourseCode();
	  $start_date = $studentCourse->getStartDate();
	  $end_date = $studentCourse->getEndDate();
	 
	  $sql  =  "update student_course_details set
	  			student_id='$student_id',
	  			course_id='$course_id',
	  			course_code='$course_code',
	  			start_date='$start_date',
	  			end_date='$end_date'
	  			where student_course_id='$student_course_id'";
	  echo "$sql";

	$output = DBConnection::execNonQery($sql);
	return $output;

}


// Delete particular course
function deleteStudentCourse($student_course_id){

	$sql  =  "delete from student_course_details where student_course_id='$student_course_id'";
	//$result = DBConnection::execQery($sql);
	return DBConnection::execNonQery($sql);
	 	


}

//for getting student id and course id
// function getStudentCourse($student_course_id){
// 	$sql  =  "select * from student_course_details where student_course_id='$student_course_id'";
// 	$result = DBConnection::execQery($sql);
// 	return $result;

// }

// get the particular student course details
function getStudentCourse($student_course_id){
	$sql  =  "select * from student_course_details where student_course_id='$student_course_id'";
	$result = DBConnection::execQery($sql);
	return $result;

}


// get all the student course details
function getStudentCourses(){
	$sql  =  "select * from student_course_details order by student_course_id";
	$result = DBConnection::execQery($sql);
	return $result;
}

// get student id
function getStudentID1(){
	$sql = "select student_id from tblstudent_personal_details order by student_id";
	$result = DBConnection::execQery($sql);
	return $result;
}

// get course id
function getCourseID1(){
	$sql = "select course_id,course_code from course_details order by course_id";
	$result = DBConnection::execQery($sql);
	return $result;


}

}
?>