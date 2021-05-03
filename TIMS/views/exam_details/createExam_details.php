<?php
session_start();
require_once 'DBconnectionclass.php';
//echo"ok";
    //require_once '../../student/Student.class.php';
    require_once 'examClass.php';
   // echo"class";
    //require_once '../../student/StudentService.php';
    require_once 'examService.php';
   // echo"service";

$message ="";
$errSubjectName = $errdate = $errtime = $errremarks
 = "";
$subject_name = $exam_date = $exam_time = $remarks= $total = $result = "";

$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$subject_name = $_POST['subject_name'];
$exam_date = $_POST['exam_date'];
$exam_time = $_POST['exam_time'];
$remarks = $_POST['remarks'];


if(empty($subject_name)){
    $errSubjectName = "* Name should not be empty";
    $error = true;
}

if(empty($exam_date)){
    $errdate = "* Date should not be empty";
    $error = true;
}
if(empty($exam_time)){
    $errtime = "* Time should not be empty";
    $error = true;
}
if(empty($remarks)){
    $errremarks = "* Remarks should not be empty";
    $error = true;
}

if($error == true ){
    $message = "please fix the errors";

}else{

    echo $subject_name;

    $examObj = new Exam();

    //$studentObj->setRollNo($roll_no);
    $examObj->setSubjectName($subject_name);
    $examObj->setExamDate($exam_date);
    $examObj->setExamTime($exam_time);
    $examObj->setRemarks($remarks);

    $createservice = new ExamService();
    $result = $createservice->addDetails($examObj);

    if($result > 0){
        $_SESSION["message"] = "Exam details added successfully !";
      }
      else{
        $_SESSION["message"] = "Server busy please try again later !";
      }

     header("Location: exam_View_All.php");

    }





}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>KKC-Home</title>
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
                <h1 style="font-size:24px;"> Keltron Knowledge Center</h1>
            </td>
        </tr>
        <tr style="height:270px;">
           
            <td style="width:12%; padding:10px 10px; background-color:#d4d7dc; vertical-align: top;">
                <ul style="list-style:none; padding:0px; line-height:24px;">
                   <?php require_once 'menuoop.php' ?>
                   <!--<?php //require_once '../../include/menu.php' ?> -->
                </ul>
            </td>

            <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
                <h2>New Timetable Creation </h2>
                <p style="color:red;" > <?php echo $message; ?></p>
            <form class="form-horizontal" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' >
                <div class="form-group">
                  <label class="control-label col-sm-2" for="subject_name">Subject Name:</label>
                  <div class="col-sm-10">
              <select  class="default" id="subject_name" name="subject_name">
                <option value="" selected>Select one...</option>
                                <option value="PHP">PHP</option>
                                <option value="JAVA">JAVA</option>
                                <option value="PYTHON">PYTHON</option>
              </select>

                    <span id="subject_name" style="color:red; font-size: 8px;
                    "><?php echo "$errSubjectName" ;?></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="exam_date">Exam Date :</label>
                  <div class="col-sm-10">          
                    <input type="date" class="form-control" id="exam_date" placeholder="Enter exam_date" name="exam_date"
                    value='<?php echo "$exam_date" ;?>'
                    >
                    <span id="exam_date" style="color:red; font-size: 8px;
                    "><?php echo "$errdate" ;?></span>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="control-label col-sm-2" for="exam_time">Exam Time:</label>
                  <div class="col-sm-10">          
                    <input type="time" class="form-control" id="exam_time" placeholder="Enter exam_time" name="exam_time" value='<?php echo "$exam_time" ;?>'>
                    <span id="exam_time" style="color:red; font-size: 8px;
                                                 "><?php echo "$errtime" ;?></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="remarks">Remarks:</label>
                  <div class="col-sm-10">          
                    <input type="text" class="form-control" id="remarks" placeholder="Enter remarks" name="remarks" value='<?php echo "$remarks" ;?>'>
                    <span id="remarks" style="color:red; font-size: 8px;"><?php echo "$errremarks" ;?></span>
                  </div>
                </div>



                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Submit</button>
                  </div>
                </div>
              </form>

            </td>

        </tr>
     
             

        </tr>
        <tr>
            <td colspan="3" style="padding:5px; background-color:#acb3b9; text-align:center;">
                <p>copyright &copy; <?php echo date("Y"); ?> keltron knowledge center</p>
            </td>
        </tr>
    </table>
</body>
</html>