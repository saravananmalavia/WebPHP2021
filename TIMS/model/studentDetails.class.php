<?php
// DTO - Data Transaction Object
// to transport data amoung layers

class Student{
	public $student_id;
    public $student_name;
    public $address;
    public $gender;
    public $email;
    public $mobile;
    public $education;


    function __construct(){

    }

    function setStudentName($name) {
    	$this->student_name = $name ;
    }
    function getStudentName() {
    	return $this->student_name;
    }


    function setStudentId($student_id) {
    	$this->student_id = $student_id;
    }
    function getStudentId() {
    	return $this->student_id;
    }


    function setAddress($address) {
    	$this->address = $address;
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


}