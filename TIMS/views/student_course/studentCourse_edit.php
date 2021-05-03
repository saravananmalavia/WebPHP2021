<?php
session_start();
    require_once '../../student_course/studentCourse.class.php';
    require_once '../../student_course/studentCourseService.php';

$message ="";
$errStudent_course_id = $errStudent_id = $errCourse_code = $errCourse_id = $errStart_date = $errEnd_date = "";
$student_course_id = $student_id = $course_id = $course_code_id = $course_code = $start_date = $end_date = "";

$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

//echo"i'm in post<br>";

$student_course_id = $_POST['student_course_id'];
$student_id = $_POST['student_id'];
$course_code = $course_id = NULL;
$course_code_id = $_POST['course_code_id'];
//echo "$course_code_id";
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
        $_SESSION["message"] = "Student Course details updated successfully !";
      }
      else{
        $_SESSION["message"] = "Server busy please try again later !";
      }

     header("Location: studentCourse_view_all.php");

  }
}
else{
  //echo "i'm in else";
  $student_course_id =$_GET['student_course_id'];

  $studentCourseService1 = new StudentCourseService();
                 $result = $studentCourseService1->getStudentCourse($student_course_id);
                 if($result != null){
                     if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $student_course_id = $row["student_course_id"];
                        $student_id = $row["student_id"];
                        // if($course_id===" "||$course_id===null){
                        $course_id = $row["course_id"];
                        $course_code = $row["course_code"];
                        
                        $start_date = $row["start_date"];
                        $end_date = $row["end_date"];
                      }
                  }




}
?>
<!-- <H1><?php //echo "|$course_id|";?></H1> -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>KKC-Course</title>
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
                   <?php require_once '../../include/menu.php' ?>
                </ul>
            </td>

            <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
                <h2>New Course Creation </h2>
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
                                <option selected hidden> <?php echo "$student_id"; ?> </option>
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

              <!-- Course id -->
                <!-- <div class="form-group">
                  <label class="control-label col-sm-2" for="course_id">Course ID:</label>
                   <div class="col-sm-8">
                    <input type="text" class="form-control" id="course_id" placeholder="Enter Course ID" name="course_id"
                    value='<?php //echo "$course_id" ;?>'>
                    <span id="courseid" style="color:red; font-size: 12px; "><?php //echo "$errCourse_id" ;?></span>
                  </div>
                </div> -->

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
                                <option selected hidden> <?php echo "$course_id | $course_code"; ?> </option>
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



