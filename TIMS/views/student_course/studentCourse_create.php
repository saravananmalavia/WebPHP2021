 <?php
session_start();
    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/studentCourseClass.php' );    
    require_once( ROOT_DIR.'/../service/studentCourseService.php' );

$message ="";
$errStudent_course_id = $errStudent_id = $errCourse_code = $errCourse_id = $errStart_date = $errEnd_date = "";
$student_course_id = $student_id = $course_id = $course_code_id = $course_code = $start_date = $end_date = "";

$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$student_id = $_POST['student_id'];
$course_code_id = $_POST['course_code_id'];
$c_explode = explode('|', $course_code_id);
$course_id = $c_explode[0];
$course_code = $c_explode[1];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];


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
    $result = $studentCourseService->addStudentCourse($studentCourseObj);

    if($result > 0){
        $_SESSION["message"] = "Student Course details added successfully !";
      }
      else{
        $_SESSION["message"] = "Server busy please try again later !";
      }

     header("Location: studentCourse_view_all.php");

  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>KKC-Course</title>
<link rel="stylesheet"
      href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<link rel="stylesheet"
     href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">

<style>
    input {
      position: relative;
    }
    
    .none {
      display: none;
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
                   <?php require_once( ROOT_DIR.'/../views/includes/menu.php' ); ?>
                </ul>
            </td>

            <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
                <h2>New Student Course Registration </h2>
                <p style="color:red;" > <?php echo $message; ?></p>
            <form class="form-horizontal" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' >



                <!-- Student ID -->
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="student_id">Student ID:</label>
                  <div class="col-sm-8">
                    <select id='student_id' class="form-control" name='student_id' required="true">
                     <option value="" disabled selected hidden >Select Student ID</option>
                     <?php
                     $studentCourseService = new StudentCourseService();
                     $result = $studentCourseService->getStudentID1();
                     if($result != null){
                         if ($result->num_rows > 0) {
                           // output data of each studenr id
                           while($row = $result->fetch_assoc()) {
                                ?>
                                <option value='<?php echo $row['student_id' ]; ?>' ><?php echo $row["student_id"];  ?>

                              
                              <?php
                            }  
                          }?>
                      </option>

                          <?php
                          if(!empty($student_id)){ ?>
                          <option  selected hidden style="display:none;"> <?php echo "$student_id"; ?> </option>
                           <?php 
                           }
                         
                    }else{
                        ?>
                        <option value="" disabled> Server busy try again later !</option>
                    <?php
                       }
                    ?> 
                            
                    </select>

                    <script>

                      $("#student_id").chosen();
                    </script>
                     
                    <span id="Studentid" style="color:red; font-size: 12px;
                                                 "><?php echo "$errStudent_id" ;?></span>
                 </div>
                </div>

                <!-- Course code -->
                <div class="form-group">
                  <label class="control-label col-sm-2" for="course_code">Course Code:</label>
                  <div class="col-sm-8">
                    <select id="course_code_id"class="form-control" name='course_code_id' required="true">

                     <option value="" disabled selected hidden>Select the Course Code
                     </option>
                  <?php
                 $studentCourseService = new StudentCourseService();
                 $result = $studentCourseService->getCourseID1();

                 if($result != null){
                     if ($result->num_rows > 0) {
                       // output data of each studenr id
                       while($row = $result->fetch_assoc()) {
                            ?>
                            <option value="<?php echo  $row["course_id"]."|".$row["course_code"]; ?>"><?php echo $row["course_id"]." | ".$row["course_code"]; ?> </option>
                      <?php 
                       }
                      } 

                      if(!empty($course_code)){ 
                        ?>
                      <option selected style="display:none;" value="<?php echo  "$course_id"."|"."$course_code"; ?>"> <?php echo "$course_id | $course_code"; ?> </option>
                      <?php
                       }   
                }else{
                    ?>
                    <option value="" disabled> Server busy try again later !</option>
                <?php
                   }
                ?>                  
                    </select>
                    <script>
                      $("#course_code_id").chosen();
                    </script>
                     
                    <span id="Studentid" style="color:red; font-size: 12px;"> <?php echo "$errCourse_code" ;?> 
                    </span>
                  </div>
                </div>

                <!-- Start Date -->
                <div class="form-group">
                  <label class="control-label col-sm-2" for="duration">Start Date:</label>
                  <div class="col-sm-8">          
                    <input type="date" class="form-control" id="start_date" placeholder="Enter the Start Date" name="start_date" value='<?php echo "$start_date" ;?>'>
                    <span id="errStart_date" style="color:red; font-size: 12px;"> <?php echo "$errStart_date" ;?> 
                    </span>
                  </div>
                </div>

                <!-- End Date -->
                <div class="form-group">
                  <label class="control-label col-sm-2" for="fees">End Date:</label>
                  <div class="col-sm-8">          
                    <input type="date" class="form-control" id="end_date" placeholder="Enter the Fee" name="end_date" value='<?php echo "$end_date" ;?>'>
                    <span id="errEnd_date" style="color:red; font-size: 12px;"> <?php echo "$errEnd_date" ;?>
                    </span>
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
