<?php
// require_once 'fees.class.php';
// require_once 'DBConnection.class.php';

require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../db/DBConnection.class.php' );  
    require_once( ROOT_DIR.'/../model/fees.class.php' );


class FeesService{

// insert the student record
function addFees(Fees $fees){

	  
	  $fees_collection_id  = $fees->getfeescollectionid();
	  $student_id  = $fees->getstudentid();
	  $collection_date = $fees->getcollectiondate();
	  $amount = $fees->getamount();
	  $particulars = $fees->getparticulars();
	  

	  $sql  =  "insert into feesdetails(fees_collection_id,student_id,collection_date,amount,particulars) VALUES ('$fees_collection_id','$student_id','$collection_date','$amount','$particulars')";	
	  echo "$sql";

	$output = DBConnection::execNonQery($sql);
	return $output;

}

// update the student
function updateFees(Fees $fees){

	  $fees_collection_id  = $fees->getfeescollectionid();
	  $student_id  = $fees->getstudentid();
	  $collection_date = $fees->getcollectiondate();
	  //$attendance_session = $student->getattendancesession();
	  $amount = $fees->getamount();
	  $particulars = $fees->getparticulars();
	  
	  $sql  =  "update feesdetails set 
	  			student_id = '$student_id',
				collection_date = '$collection_date',
				amount = '$amount',
				particulars = '$particulars'
	  			where fees_collection_id = '$fees_collection_id'";
	  echo "$sql";
	$output = DBConnection::execNonQery($sql);
	return $output;

}

// Delete the particular student
function deleteFees($fees_collection_id){

	$sql  =  "delete from feesdetails where fees_collection_id = '$fees_collection_id'";
	//$result = DBConnection::execQery($sql);
	return DBConnection::execNonQery($sql);
	 	


}

// get the particular student details
function getFees($fees_collection_id){
	$sql  =  "select * from feesdetails where fees_collection_id = $fees_collection_id";
	$result = DBConnection::execQery($sql);
	return $result;
}


// get all the students details
function getFeess(){
	$sql  =  "select * from feesdetails order by fees_collection_id desc";
	$result = DBConnection::execQery($sql);
	return $result;
}



}


?>