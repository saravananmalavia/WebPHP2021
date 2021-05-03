<?php
    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../db/DBConnection.class.php' );  
    require_once( ROOT_DIR.'/../model/CourseClass.php' );

//require_once 'Course.class.php';
//require_once '../../db/DBConnection.class.php';


class CourseService{

// insert the course record
function addCourse(Course $course){

	  $course_id = $course->getCourseID();
	  $course_code = $course->getCourseCode();
	  $course_name  = $course->getCourseName();
	  $syllabus  = $course->getSyllabus();
	  $duration = $course->getDuration();
	  $fees = $course->getFees();
		

	  $sql  =  "insert into course_details(course_id,course_code,course_name,syllabus,duration,fees) values('$course_id','$course_code','$course_name','$syllabus','$duration','$fees')";
	  echo "$sql";
	$output = DBConnection::execNonQery($sql);
	return $output;

}

// update the Course
function updateCourse(Course $course){

	  $course_id = $course->getCourseID();
	  $course_code = $course->getCourseCode();
	  $course_name  = $course->getCourseName();
	  $syllabus  = $course->getSyllabus();
	  $duration = $course->getDuration();
	  $fees = $course->getFees();
	 
	  $sql  =  "update course_details set
	  			course_name='$course_name',
	  			course_code='$course_code',
	  			syllabus='$syllabus',
	  			duration='$duration',
	  			fees='$fees'
	  			where course_id='$course_id' ";
	  echo "$sql";

	$output = DBConnection::execNonQery($sql);
	return $output;

}


// Delete particular course
function deleteCourse($course_id){

	$sql  =  "delete from course_details where course_id='$course_id'";
	//$result = DBConnection::execQery($sql);
	return DBConnection::execNonQery($sql);
	 	


}

// get the particular course details
function getCourse($course_id){
	$sql  =  "select * from course_details where course_id='$course_id'";
	$result = DBConnection::execQery($sql);
	return $result;

}


// get all the course details
function getCourses(){
	$sql  =  "select * from course_details order by course_id";
	$result = DBConnection::execQery($sql);
	return $result;
}



}


?> 