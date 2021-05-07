<?php

session_start();
 require_once '../../config/config.php';
 require_once( ROOT_DIR.'/../model/examClass.php' );    
 require_once( ROOT_DIR.'/../service/examService.php' );
 include('../includes/header_sub.php');
 ?>

 <?php

$message ="";
$errSubjectName = $errdate = $errtime = $errremarks
 = $errid = "";
$subject_name = $exam_date = $exam_time = $remarks = $exam_time_table_id = "";

$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 // echo "iam in post<br>";
$exam_time_table_id = $_POST['exam_time_table_id'];
$subject_name = $_POST['subject_name'];
$exam_date = $_POST['exam_date'];
$exam_time = $_POST['exam_time'];
$remarks = $_POST['remarks'];

if(empty($exam_time_table_id)){
    $errid = "* ID should not be empty";
    $error = true;
}
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

//echo "i am in else <br>"; 
 // echo $subject_name ;

    $examObj = new Exam();

    $examObj->setExamID($exam_time_table_id);
    $examObj->setSubjectName($subject_name);
    $examObj->setExamDate($exam_date);
    $examObj->setExamTime($exam_time);
    $examObj->setRemarks($remarks);

    $createservice = new ExamService();
    $result = $createservice->updateExam($examObj);
   // echo $exam_time_table_id ;
    if($result > 0){
        $_SESSION["message"] = "Exam details updated successfully !";
      }
      else{
        $_SESSION["message"] = "Server busy please try again later !";
      }

     header("Location: exam_View_All.php");

    }
}
else{


//echo "i am in fetch <br>";

  $exam_time_table_id = $_GET['exam_time_table_id'];

  //echo $exam_time_table_id."<br>";

   $createservice = new ExamService();
    $result = $createservice->getExam($exam_time_table_id);
   // echo $exam_time_table_id."<br>";
      if($result != null){
        if ($result->num_rows > 0) {
       $row = $result->fetch_assoc();
       $exam_time_table_id = $row["exam_time_table_id"];
       $subject_name = $row["subject_name"];
       $exam_date = $row["exam_date"];
       $exam_time = $row["exam_time"];
       $remarks = $row["remarks"];
       
      }
   }
}
?>

				 <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
                <h2> Timetable Updation </h2>
                <p style="color:red;" > <?php echo $message; ?></p>
            <form class="form-horizontal" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' >
              <div class="form-group">
                  <label class="control-label col-sm-2" for="exam_time_table_id">Exam ID :</label>
                  <div class="col-sm-4">          
                    <input type="int" class="form-control" id="exam_time_table_id" placeholder="Enter exam_id" name="exam_time_table_id"
                    value='<?php echo $exam_time_table_id ;?>'readonly ="true" 
                    >
                    <span id="exam_time_table_id" style="color:red; font-size: 8px;
                    "><?php echo "$errid" ;?></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="subject_name">Subject Name:</label>
                  <div class="col-sm-4">
                    <select  class="form-control" id="subject_name" name="subject_name">
                        <?php
                      if($subject_name === 'JAVA')
                        {?>

                                <option value="" >Select one...</option>
                                <option value="PHP" >PHP</option>
                                <option value="JAVA" selected >JAVA</option>
                                <option value="PYTHON">PYTHON</option>
                      <?php  } ?> 
                      <?php
                      if($subject_name === 'PYTHON')
                        {?>

                                <option value="" >Select one...</option>
                                <option value="PHP" >PHP</option>
                                <option value="JAVA" >JAVA</option>
                                <option value="PYTHON" selected>PYTHON</option>
                      <?php  } ?>
                      <?php
                      if($subject_name === 'PHP')
                        {?>

                                <option value="" >Select one...</option>
                                <option value="PHP" selected>PHP</option>
                                <option value="JAVA"  >JAVA</option>
                                <option value="PYTHON">PYTHON</option>
                      <?php  } ?>                     
                    </select>

                    <span id="subject_name" style="color:red; font-size: 8px;
                    "><?php echo "$errSubjectName" ;?></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="exam_date">Exam Date :</label>
                  <div class="col-sm-4">          
                    <input type="date" class="form-control" id="exam_date" placeholder="Enter exam_date" name="exam_date"
                    value='<?php echo $exam_date ;?>'
                    >
                    <span id="exam_date" style="color:red; font-size: 8px;
                    "><?php echo "$errdate" ;?></span>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="control-label col-sm-2" for="exam_time">Exam Time:</label>
                  <div class="col-sm-4">          
                    <input type="time" class="form-control" id="exam_time" placeholder="Enter exam_time" name="exam_time" value='<?php  $date = date("H:i", strtotime($exam_time)); echo "$date";?>'>
                   
                    <span id="exam_time" style="color:red; font-size: 8px;
                                                 "><?php echo "$errtime" ;?>
                                                 </span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="remarks">Remarks:</label>
                  <div class="col-sm-4">          
                    <input type="text" class="form-control" id="remarks" placeholder="Enter remarks" name="remarks" value='<?php echo "$remarks" ;?>'>
                    <span id="remarks" style="color:red; font-size: 8px;"><?php echo "$errremarks" ;?></span>
                  </div>
                </div>



                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-4">
                    <button type="submit" class="btn btn-default">update</button>
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
