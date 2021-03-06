<?php
session_start();
require_once '../../config/config.php';
require_once( ROOT_DIR.'/../model/examClass.php' );
require_once( ROOT_DIR.'/../service/examService.php');
include('../includes/header_sub.php');

?>

 <?php
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



            <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
                <h2>New Timetable Creation </h2>
                <p style="color:red;" > <?php echo $message; ?></p>
            <form class="form-horizontal" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' >
                <div class="form-group">
                  <label class="control-label col-sm-2" for="subject_name">Subject Name:</label>
                  <div class="col-sm-4">
              <select  class="form-control" id="subject_name" name="subject_name">
                <option value="" selected>Select one...</option>
                                <option value="PHP">PHP</option>
                                <option value="JAVA">JAVA</option>
                                <option value="PYTHON">PYTHON</option>
                                <option  selected hidden style="display:none;"> <?php echo "$subject_name"; ?> </option>
              </select>

                    <span id="subject_name" style="color:red; font-size: 8px;
                    "><?php echo "$errSubjectName" ;?></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="exam_date">Exam Date :</label>
                  <div class="col-sm-4">          
                    <input type="date" class="form-control" id="exam_date" placeholder="Enter exam_date" name="exam_date"
                    value='<?php echo "$exam_date" ;?>'
                    >
                    <span id="exam_date" style="color:red; font-size: 8px;
                    "><?php echo "$errdate" ;?></span>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="control-label col-sm-2" for="exam_time">Exam Time:</label>
                  <div class="col-sm-4">          
                    <input type="time" class="form-control" id="exam_time" placeholder="Enter exam_time" name="exam_time" value='<?php echo "$exam_time" ;?>'>
                    <span id="exam_time" style="color:red; font-size: 8px;
                                                 "><?php echo "$errtime" ;?></span>
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