<?php

session_start();
    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/fees.class.php' );    
    require_once( ROOT_DIR.'/../service/FeesService.php' );

// Create connection

$message ="";
$errfeescollectionid = $errstudentid = $errcollectiondate = $erramount = $errparticulars = "";
$fees_collection_id = $student_id = $collection_date = $amount = $particulars = "";


$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$fees_collection_id = $_POST['fees_collection_id'];
$student_id = $_POST['student_id'];
$collection_date = $_POST['collection_date'];
//$attendance_session = $_POST['attendance_session'];
$amount = $_POST['amount'];
$particulars = $_POST['particulars'];



if(empty($fees_collection_id)){
  $errfeescollectionid = "* feescollectionid should not be empty";
  $error = true;
}


if(empty($student_id)){
  $errstudentid = "* studentid should not be empty";
  $error = true;
}

if(empty($collection_date)){
  $errcollectiondate = "* collectiondate should not be empty";
  $error = true;
}

if(empty($amount)){
  $erramount = "* amount should not be empty";
  $error = true;
}
if(empty($particulars)){
  $errparticulars = "* particulars should not be empty";
  $error = true;
}


if($error == true ){
	$message ="please fix the errors";

}else{

$feesObj = new Fees();

    $feesObj->setfeescollectionid($fees_collection_id);
    $feesObj->setstudentid($student_id);
    $feesObj->setcollectiondate($collection_date);
    $feesObj->setamount($amount);
    $feesObj->setparticulars($particulars);

    $feesService = new FeesService();
    $result = $feesService->updateFees($feesObj);

// Check connection
if($result > 0){
          $_SESSION["message"] = "Fees details updated successfully !";
        }
        else{
          $_SESSION["message"] = "Server busy please try again later !";
        }

       
  header("Location: fees_view_all.php");
  }
}
	

else
{


$fees_collection_id =$_GET['fees_collection_id'];

// Check connection

$feesService = new feesService();
                 $result = $feesService->getFees($fees_collection_id);
                 if($result != null){
if ($result->num_rows > 0) 
    {
	 $row = $result->fetch_assoc();
	  $fees_collection_id = $row['fees_collection_id'];
		$student_id = $row['student_id'];
		$collection_date = $row['collection_date'];
		//$attendance_session = $row['attendance_session'];
		$amount = $row['amount'];
		$particulars = $row['particulars'];
	 }
	}



}



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Fees Collection List</title>
<link rel="stylesheet"
      href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<link rel="stylesheet"
     href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<style>
    input {
      position: relative;
    }
    
    .none {
      display: none;
    }
    
    span {
      color: red;
      font-weight: 50;
    }
    
    #num {
      width: 3em;
    }
    
    fieldset {
      margin-left: 2em;
    }
  </style>

</head>
<body style="margin:0px;">
    <table   style="width:100%; border-collapse:collapse; font:14px Arial,sans-serif;">
        <tr>
            <td colspan="3" style="padding:10px 20px; background-color:#acb3b9;">
                <h1 style="font-size:24px;"> Fees Collection Management System</h1>
            </td>
        </tr>
        <tr style="height:270px;">
           
            <td style="width:12%; padding:10px 10px; background-color:#d4d7dc; vertical-align: top;">
                <ul style="list-style:none; padding:0px; line-height:24px;">
                   <?php require_once( ROOT_DIR.'/../views/includes/menu.php' ); ?>
                </ul>
            </td>

            <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
                <h2>New Student Creation </h2>
                <p style="color:red;" > <?php echo $message; ?></p>
            <form class="form-horizontal" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' >
                <div class="form-group">
                  <label class="control-label col-sm-2" for="fees_collection_id">Fees Collection Id:</label>
                  <div class="col-sm-10">
                    <input type="varchar" class="form-control" id="fees_collection_id" placeholder="Enter id" name="fees_collection_id"
                    value='<?php echo "$fees_collection_id" ;?>'
                    >
                    <span id="e2" ><br/><?php echo "$errfeescollectionid" ;?></span>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-2" for="student_id">Student Id:</label>
                  <div class="col-sm-10">          
                    <input type="varchar" class="form-control" id="student_id" placeholder="Enter " name="student_id"
                    value='<?php echo "$student_id" ;?>'
                    >
                    <span id="student_id" style="color:red; font-size: 8px;
                    "><?php echo "$errstudentid" ;?></span>
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-sm-2" for="collection_date">Collection Date:</label>
                  <div class="col-sm-10">          
                    <input type="date" class="form-control" id="collection_date" placeholder="Enter date" name="collection_date"
                    value='<?php echo "$collection_date" ;?>'
                    >
                    <span id="collection_date" style="color:red; font-size: 8px;
                    "><?php echo "$errcollectiondate" ;?></span>
                  </div>
                </div>

                
                <div class="form-group">
                  <label class="control-label col-sm-2" for="amount">Amount:</label>
                  <div class="col-sm-10">          
                    <input type="number" class="form-control" id="amount" placeholder="Enter amnt" name="amount"
                    value='<?php echo "$amount" ;?>'
                    >
                    <span id="amount" style="color:red; font-size: 8px;
                    "><?php echo "$erramount" ;?></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="particulars">Particulars:</label>
                  <div class="col-sm-10">          
                    <input type="text" class="form-control" id="remarks" placeholder="Enter " name="particulars"
                    value='<?php echo "$particulars" ;?>'
                    >
                    <span id="particulars" style="color:red; font-size: 8px;
                    "><?php echo "$errparticulars" ;?></span>
                  </div>
                </div>

                 

                 


                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Submit</button
                  </div>
                </div>
              </form>

            </td>

        </tr>
     
             

        </tr>
        <tr>
            <td colspan="3" style="padding:5px; background-color:#acb3b9; text-align:center;">
                <p>copyright &copy; <?php echo date("Y"); ?> keltron Fees Details</p>
            </td>
        </tr>
    </table>
</body>
</html>