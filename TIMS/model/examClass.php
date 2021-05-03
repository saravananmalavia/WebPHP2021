<?php
// DTO - Data Transaction Object
// to transport data amoung layers

class Exam{

public $exam_time_table_id;
public $subject_name;
public $exam_date;
public $exam_time;
public $remarks;

function __construct() {
   
    }

 // function __construct($roll_no,$student_name,$mark1,$mark2,$mark3,$total=null,$result=null) {
 //    $this->roll_no = $roll_no;
 //    $this->student_name = $student_name;
 //    $this->mark1 = $mark1;
 //    $this->mark2 = $mark2;
 //    $this->mark3 = $mark3;
 //    $this->total = $total;
 //    $this->result = $result;

 //  }

  function setSubjectName($subject_name) {
   		$this->subject_name = $subject_name ;
  }
  function getSubjectName() {
    return $this->subject_name;
  }

  function setExamID($exam_time_table_id) {
   		$this->exam_time_table_id = $exam_time_table_id;
  }
  function getExamID() {
    return $this->exam_time_table_id;
  }

  function setExamDate($exam_date) {
   		$this->exam_date = $exam_date;
  }
  function getExamDate() {
    return $this->exam_date;
  }

  function setExamTime($exam_time) {
   		$this->exam_time = $exam_time;
  }
  function getExamTime() {
    return $this->exam_time;
  }

  function setRemarks($remarks) {
   		$this->remarks = $remarks;
  }
  function getRemarks() {
    return $this->remarks;
  }


}





?> 