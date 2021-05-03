 <?php
require_once 'examClass.php';
require_once 'DBconnectionclass.php';
//require_once '../../db/DBConnection.class.php';


class ExamService{

// insert the staff record
function addDetails(Exam $exam){

	  //$roll_no = $student->setRollNo();
	  $subject_name  = $exam->getSubjectName();
	  $exam_date = $exam->getExamDate();
	  $exam_time = $exam->getExamTime();
	  $remarks = $exam->getRemarks();
	 
	  $sql  =  "INSERT INTO tbl_exam_timetable(subject_name , exam_date , exam_time , remarks) VALUES('$subject_name' , '$exam_date' , '$exam_time','$remarks')";
	     echo "$sql";
		$output = DBConnection::execNonQery($sql);
		return $output;

}

// update the staff
function updateExam(Exam $exam){

	  $exam_time_table_id = $exam->getExamID();
	  $subject_name  = $exam->getSubjectName();
	  $exam_date  = $exam->getExamDate();
	  $exam_time = $exam->getExamTime();
	  $remarks = $exam->getRemarks();
	  $sql  =   "UPDATE tbl_exam_timetable SET 
	  			subject_name = '$subject_name' , 
	  			exam_date = '$exam_date' ,
	  			exam_time = '$exam_time' ,
	  			remarks = '$remarks' 
	  			WHERE exam_time_table_id = $exam_time_table_id " ;
	 echo "$sql";
	$output = DBConnection::execNonQery($sql);
	return $output;

}

// Delete the particular staff
function deleteExam($exam_time_table_id){

	$sql  =  "DELETE FROM tbl_exam_timetable WHERE exam_time_table_id = $exam_time_table_id";
	//$result = DBConnection::execQery($sql);
	return DBConnection::execNonQery($sql);
	 	


}

// get the particular student details
function getExam($exam_time_table_id){
	$sql  =  "SELECT * FROM tbl_exam_timetable WHERE exam_time_table_id = $exam_time_table_id";
	//echo $sql ;
	$result = DBConnection::execQery($sql);
	return $result;

}


// get all the students details
function getExams(){

	$sql  =  "SELECT * FROM tbl_exam_timetable ORDER BY exam_time_table_id DESC";
	$result = DBConnection::execQery($sql);

	return $result;
}



}


?>