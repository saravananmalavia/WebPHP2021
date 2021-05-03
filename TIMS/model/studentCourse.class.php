<?php
// DTO - Data Transaction Object
// to transport data amoung layers
//echo getcwd();
class StudentCourse{

public $student_course_id;
public $student_id;
public $course_id;
public $course_code;
public $start_date;
public $end_date;



function __construct() {
   
    }
  
  function setStudentCourseID($student_course_id) {
      $this->student_course_id = $student_course_id;
  }
  function getStudentCourseID() {
    return $this->student_course_id;
  }


   function setStudentID($student_id) {
      $this->student_id = $student_id;
  }
  function getStudentID() {
    return $this->student_id;
  }


  function setCourseID($course_id) {
   		$this->course_id = $course_id ;
  }
  function getCourseID() {
    return $this->course_id;
  }


  function setCourseCode($course_code) {
      $this->course_code = $course_code ;
  }
  function getCourseCode() {
    return $this->course_code;
  }


  function setStartDate($start_date) {
   		$this->start_date = $start_date ;
  }
  function getStartDate() {
    return $this->start_date;
  }
  

  function setEndDate($end_date) {
   		$this->end_date = $end_date ;
  }
  function getEndDate() {
    return $this->end_date;
  }



}





?> 