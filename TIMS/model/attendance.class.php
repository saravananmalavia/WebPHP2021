<?php
// DTO - Data Transaction Object
// to transport data amoung layers

class Attendance{

public $student_attendance_id;
public $student_id;
public $attendance_date;
public $attendance_session;
public $status;
public $remarks;

function __construct() {
   
    }

 
  function setstudentattendanceid($student_attendance_id) {
   		$this->student_attendance_id = $student_attendance_id ;
  }
  function getstudentattendanceid() {
    return $this->student_attendance_id;
  }

  function setstudentid($student_id) {
   		$this->student_id = $student_id;
  }
  function getstudentid() {
    return $this->student_id;
  }

  function setattendancedate($attendance_date) {
   		$this->attendance_date = $attendance_date ;
  }
  function getattendancedate() {
    return $this->attendance_date;
  }

  function setattendancesession($attendance_session) {
   		$this->attendance_session = $attendance_session ;
  }
  function getattendancesession() {
    return $this->attendance_session;
  }

  function setstatus($status) {
   		$this->status = $status ;
  }
  function getstatus() {
    return $this->status;
  }

  function setremarks($remarks) {
   		$this->remarks = $remarks ;
  }

  function getremarks() {
    return $this->remarks;
  }

   
}





?> 