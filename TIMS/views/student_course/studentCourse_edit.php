<?php
session_start();
    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/studentCourseClass.php' );    
    require_once( ROOT_DIR.'/../service/studentCourseService.php' );
    include('../includes/header_sub.php');

$message ="";
$errStudent_course_id = $errStudent_id = $errCourse_code = $errCourse_id = $errStart_date = $errEnd_date = "";
$student_course_id = $student_id = $course_id = $course_code_id = $course_code = $start_date = $end_date = "";

$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$student_course_id = $_POST['student_course_id'];
$student_id = $_POST['student_id'];
$course_code = $course_id = NULL;
$course_code_id = $_POST['course_code_id'];
$a_explode = explode('|', $course_code_id);
$course_id = $a_explode[0];
$course_code = $a_explode[1];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

if(empty($student_course_id)){
    $errStudent_course_id = "* Student Course ID should not be empty";
    $error = true;
}
if(empty($student_id)){
    $errStudent_id = "* Please select a valid Student ID";
    $error = true;
}
if(empty($course_id)){
    $errCourse_id = "*  Please select a valid Course ID";
    $error = true;
}

if(empty($course_code)){
    $errCourse_code = "* Course Code should not be empty";
    $error = true;
  }

if (empty($start_date)) {
    $errStart_date = "*  Please select a valid Start Date";
    $error = true;
}

if (empty($end_date)) {
    $errEnd_date = "*  Please select a valid End Date";
    $error = true;
}


if($error == true ){
    $message = "Please fix the errors";

}else{ //Comparing old and new values
       $oldstudent_course_id = $_POST['oldstudent_course_id'];
       $oldstudent_id = $_POST['oldstudent_id'];
       $oldcourse_code_id = $_POST['oldcourse_code_id'];
       $oldcourse_id = $_POST['oldcourse_id'];
       $oldcourse_code = $_POST['oldcourse_code'];
       $oldstart_date = $_POST['oldstart_date'];
       $oldend_date = $_POST['oldend_date'];

    if ($student_course_id==$oldstudent_course_id && $student_id==$oldstudent_id && $course_code_id==$oldcourse_code_id && $course_id==$oldcourse_id && $course_code==$oldcourse_code && $start_date==$oldstart_date && $end_date==$oldend_date) {
        $_SESSION["message"] = "No Changes were Made for Student Course ID $student_course_id !";

    }else{

        $studentCourseObj = new StudentCourse();

        $studentCourseObj->setStudentCourseID($student_course_id);
        $studentCourseObj->setStudentID($student_id);
        $studentCourseObj->setCourseID($course_id);
        $studentCourseObj->setCourseCode($course_code);
        $studentCourseObj->setStartDate($start_date);
        $studentCourseObj->setEndDate($end_date);

        $studentCourseService = new StudentCourseService();
        $result = $studentCourseService->updateStudentCourse($studentCourseObj);

        if($result > 0){
            $_SESSION["message"] = "Student Course details updated successfully for Student Course ID $student_course_id !";
        }
        else{
          $_SESSION["message"] = "Server busy please try again later !";
        }

     header("Location: studentCourse_view_all.php");
  }
  header("Location: studentCourse_view_all.php");
  }
}else{
  $student_course_id =$_GET['student_course_id'];

  $studentCourseService1 = new StudentCourseService();
                 $result = $studentCourseService1->getStudentCourse($student_course_id);
                 if($result != null){
                     if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $student_course_id = $row["student_course_id"];
                        $student_id = $row["student_id"];
                        $course_id = $row["course_id"];
                        $course_code = $row["course_code"];
                        $start_date = $row["start_date"];
                        $end_date = $row["end_date"];
                        $oldstudent_course_id = $student_course_id;
                        $oldstudent_id = $student_id;
                        $oldcourse_code_id = $course_id.'|'.$course_code;
                        $oldcourse_id = $course_id;
                        $oldcourse_code = $course_code;
                        $oldstart_date = $start_date;
                        $oldend_date = $end_date;
                      }
                  }
}
?>


      <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
          <h2>Edit Course Registration </h2>
          <p style="color:red;" > <?php echo $message; ?></p>
      <form class="form-horizontal" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' >

         <!--Student Course ID -->
          <div class="form-group">
            <label class="control-label col-sm-2" for="student_course_id"> Student Course ID:</label>
            <div class="col-sm-8">          
              <input type="text" class="form-control" id="student_course_id" placeholder="Enter the Student Course ID" name="student_course_id" 
              value='<?php echo "$student_course_id" ;?>'
               readonly ="true">
              <span id="Student_course" style="color:red; font-size: 12px; "><?php echo "$errStudent_course_id" ;?></span>
            </div>
          </div>

          <!-- old values -->
          <input type="hidden" id="oldstudent_course_id" name="oldstudent_course_id" value='<?php echo "$oldstudent_course_id"; ?>'>
          <input type="hidden" id="oldstudent_id" name="oldstudent_id" value='<?php echo "$oldstudent_id"; ?>'>
          <input type="hidden" id="oldcourse_code_id" name="oldcourse_code_id" value='<?php echo "$oldcourse_code_id"; ?>'>
          <input type="hidden" id="oldcourse_id" name="oldcourse_id" value='<?php echo "$oldcourse_id"; ?>'>
          <input type="hidden" id="oldcourse_code" name="oldcourse_code" value='<?php echo "$oldcourse_code"; ?>'>
          <input type="hidden" id="oldstart_date" name="oldstart_date" value='<?php echo "$oldstart_date"; ?>'>
          <input type="hidden" id="oldend_date" name="oldend_date" value='<?php echo "$oldend_date"; ?>'>

          <!-- Student ID -->
           <div class="form-group">
            <label class="control-label col-sm-2" for="syllabus">Student ID:</label>
            <div class="col-sm-8">
              <select class="form-control" name='student_id' required >
               <option value="" disabled selected hidden>Select the Student ID</option>
               <?php
           $studentCourseService = new StudentCourseService();
           $result = $studentCourseService->getStudentID1();
           if($result != null){
               if ($result->num_rows > 0) {
                 // output data of each studenr id
                 while($row = $result->fetch_assoc()) {
                      ?>
                      <option value='<?php echo $row["student_id"]; ?>'><?php echo $row["student_id"];  ?>

                        <?php if(!empty($student_id)){ ?>
                          <option selected hidden style="display:none;"> <?php echo "$student_id"; ?> </option>
                        <?php } ?>
                      </option>

                          <?php
                                  }
                           } else {
                              ?>    
                              <option value="" disabled> No Records Found !</option> 
                              <?php
                           }   
                          }else{
                              ?>
                              <option value="" disabled> Server busy try again later !</option>
                          <?php
                             }
                          ?> 
                      
              </select>
               
              <span id="Studentid" style="color:red; font-size: 12px;"><?php echo "$errStudent_id" ;?>
              </span>
            </div>
          </div>

          <!-- Course code -->
          <div class="form-group">
            <label class="control-label col-sm-2" for="course_code">Course Code:</label>
            <div class="col-sm-8">
              <select class="form-control" name='course_code_id' required >

               <option value="" disabled selected hidden>Select the Course Code</option>
               <?php
           $studentCourseService = new StudentCourseService();
           $result = $studentCourseService->getCourseID1();

           if($result != null){
               if ($result->num_rows > 0) {
                 // output data of each studenr id
                 while($row = $result->fetch_assoc()) {
                      ?>
                      <option value="<?php echo  $row["course_id"]."|".$row["course_code"]; ?>"><?php echo $row["course_id"]." | ".$row["course_code"]; ?>

                        <?php if(!empty($course_code)){ ?>
                          <option selected style="display:none;" value="<?php echo  "$course_id"."|"."$course_code"; ?>"> <?php echo "$course_id | $course_code"; ?> </option>
                        <?php } ?>
                      </option>

                          <?php
                                  }
                           } else {
                              ?>    
                              <option value="" disabled> No Records Found !</option> 
                              <?php
                           }   
                          }else{
                              ?>
                              <option value="" disabled> Server busy try again later !</option>
                          <?php
                             }
                          ?> 
                      
              </select>
               
              <span id="Studentid" style="color:red; font-size: 12px;
                                           "><?php echo "$errStudent_id" ;?></span>
            </div>
          </div>

          <!-- Start Date -->
          <div class="form-group">
            <label class="control-label col-sm-2" for="duration">Start Date:</label>
            <div class="col-sm-8">          
              <input type="date" class="form-control" id="start_date" placeholder="Enter the Start Date" name="start_date" value='<?php echo "$start_date" ;?>'>
              <span id="errStart_date" style="color:red; font-size: 12px;
                                           "><?php echo "$errStart_date" ;?></span>
            </div>
          </div>

          <!-- End Date -->
          <div class="form-group">
            <label class="control-label col-sm-2" for="fees">End Date:</label>
            <div class="col-sm-8">          
              <input type="date" class="form-control" id="end_date" placeholder="Enter the Fee" name="end_date" value='<?php echo "$end_date" ;?>'>
              <span id="errEnd_date" style="color:red; font-size: 12px;
                                           "><?php echo "$errEnd_date" ;?></span>
            </div>
          </div>

          <!-- submit -->
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



