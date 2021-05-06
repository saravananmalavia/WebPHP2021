<?php
// DTO - Data Transaction Object
// to transport data amoung layers

class Staff{

public $staff_id;
public $staff_name;
public $address;
public $gender;
public $email;
public $mobile;
public $education;
public $subject;

function __construct() {
   
    }

 
  function setStaffName($staff_name) {
   		$this->staff_name = $staff_name ;
  }
  function getStaffName() {
    return $this->staff_name;
  }

  function setStaffID($staff_id) {
   		$this->staff_id = $staff_id;
  }
  function getStaffID() {
    return $this->staff_id;
  }

  function setAddress($address) {
   		$this->address = $address ;
  }
  function getAddress() {
    return $this->address;
  }

  function setGender($gender) {
   		$this->gender = $gender ;
  }
  function getGender() {
    return $this->gender;
  }

  function setEmail($email) {
   		$this->email = $email ;
  }
  function getEmail() {
    return $this->email;
  }

  function setMobile($mobile) {
   		$this->mobile = $mobile ;
  }

  function getMobile() {
    return $this->mobile;
  }

   function setEducation($education) {
   		$this->education = $education ;
  }
  function getEducation() {
    return $this->education;
  }
    function setSubject($subject) {
      $this->subject = $subject ;
  }
  function getSubject() {
    return $this->subject;
  }
}

?> 