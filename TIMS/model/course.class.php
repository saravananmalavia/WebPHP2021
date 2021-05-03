<?php
// DTO - Data Transaction Object
// to transport data amoung layers

class Course{

public $course_id;
public $course_code;
public $course_name;
public $syllabus;
public $duration;
public $fees;


function __construct() {
   
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

  function setCourseName($course_name) {
   		$this->course_name = $course_name;
  }
  function getCourseName() {
    return $this->course_name;
  }

  function setSyllabus($syllabus) {
   		$this->syllabus = $syllabus ;
  }
  function getSyllabus() {
    return $this->syllabus;
  }

  function setDuration($duration) {
   		$this->duration = $duration ;
  }
  function getDuration() {
    return $this->duration;
  }

  function setFees($fees) {
   		$this->fees = $fees ;
  }
  function getFees() {
    return $this->fees;
  }



}





?>  