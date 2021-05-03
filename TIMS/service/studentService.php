<?php
require_once 'studentDetails.class.php';
require_once 'DBConnection.class.php';

class StudentService{

 // insert the student record
    function addStudent(Student $student){
    	$student_name  = $student->getStudentName();
	    $address  = $student->getAddress();
	    $gender = $student->getGender();
	    $email = $student->getEmail();
	    $mobile = $student->getMobile();
	    $education = $student->getEducation();

	     $sql  =  "INSERT INTO tblstudent_personal_details(student_name,address,gender,email,mobile,education) VALUES('$student_name','$address','$gender','$email',$mobile,'$education')";
          echo "$sql";
         $output = DBConnection::execNonQery($sql);
          return $output;
    }

  // update the student
    function updateStudent(Student $student){

    	$student_id = $student->getStudentId();
    	$student_name  = $student->getStudentName();
	    $address  = $student->getAddress();
	    $gender = $student->getGender();
	    $email = $student->getEmail();
	    $mobile = $student->getMobile();
	    $education = $student->getEducation();



	    $sql  =  "UPDATE tblstudent_personal_details SET 
	  			student_name = '$student_name', 
	  			address = '$address',
	  			gender = '$gender',
	  			email = '$email',
	  			mobile = $mobile,
	  			education = '$education'
	  			WHERE student_id = $student_id";

	  	echo "$sql";
	    $output = DBConnection::execNonQery($sql);
	    return $output;
    }

 // Delete the particular student
    function deleteStudent($student_id){

    	$sql  =  "DELETE FROM tblstudent_personal_details WHERE student_id = $student_id";

    	return DBConnection::execNonQery($sql);
    }

 // get the particular student details
    function getStudent($student_id){

    	$sql  =  "SELECT * FROM tblstudent_personal_details WHERE student_id = $student_id";

	    $result = DBConnection::execQery($sql);
	    return $result;
    }

 // get all the students details
    function getStudents(){

    	$sql  =  "SELECT * FROM tblstudent_personal_details ORDER BY student_id DESC";

	    $result = DBConnection::execQery($sql);
	    return $result;
    }

    
}
?>