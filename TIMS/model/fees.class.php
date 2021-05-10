<?php
// DTO - Data Transaction Object
// to transport data amoung layers

class Fees{

public $fees_collection_id;
public $student_id;
public $collection_date;
public $amount;
public $particulars;


function __construct() {
   
    }

  function setfeescollectionid($fees_collection_id) {
   		$this->fees_collection_id = $fees_collection_id;
  }
  function getfeescollectionid() {
    return $this->fees_collection_id;
  }

  function setstudentid($student_id) {
   		$this->student_id = $student_id;
  }
  function getstudentid() {
    return $this->student_id;
  }

  function setcollectiondate($collection_date) {
   		$this->collection_date = $collection_date ;
  }
  function getcollectiondate() {
    return $this->collection_date;
  }

  function setamount($amount) {
   		$this->amount = $amount ;
  }
  function getamount() {
    return $this->amount;
  }

  function setparticulars($particulars) {
   		$this->particulars = $particulars ;
  }

  function getparticulars() {
    return $this->particulars;
  }

   
}





?> 