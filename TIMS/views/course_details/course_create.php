<?php
session_start();
    //require_once '../../course/Course.class.php';
    //require_once '../../course/Course.Service.php';
    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/courseClass.php' );    
    require_once( ROOT_DIR.'/../service/courseService.php' );

$message ="";
$errCourse_id = $errCourse_code = $errCourse_name = $errSyllabus = $errDuration = $errFees = "";
$course_id = $course_code = $course_name = $syllabus = $duration = $fees = "";

$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

//$course_id = $_POST['course_id'];
$course_code = $_POST['course_code'];
$course_name = $_POST['course_name'];
$syllabus = $_POST['syllabus'];
// echo htmlspecialchars($_POST['syllabus']);
$duration = $_POST['duration'];
$fees = $_POST['fees'];


// if (filter_var($course_id, FILTER_VALIDATE_INT)) {} 
// else {
//     $errCourse_id = "* Course ID should not be empty";
//     $error = true;
// }
if(empty($course_code)){
    $errCourse_code = "* Course Code should not be empty";
    $error = true;
}
if(empty($course_name)){
    $errCourse_name = "* Course Name should not be empty";
    $error = true;
}
if(empty($syllabus)){
    $errSyllabus = "* Syllabus need to be specified";
    $error = true;
}

if (filter_var($duration, FILTER_VALIDATE_INT)) {

} else {
    $errDuration = "should be a valid integer";
    $error = true;
}

if (filter_var($fees, FILTER_VALIDATE_INT)) {

} else {
    $errFees = "should be a valid integer";
    $error = true;
}


if($error == true ){
    $message = "Please fix the errors";

}else{

    echo $course_name;

    $courseObj = new Course();

    $courseObj->setCourseID($course_id);
    $courseObj->setCourseCode($course_code);
    $courseObj->setCourseName($course_name);
    $courseObj->setSyllabus($syllabus);
    $courseObj->setDuration($duration);
    $courseObj->setFees($fees);

    $courseService = new CourseService();
    $result = $courseService->addCourse($courseObj);

    if($result > 0){
        $_SESSION["message"] = "Course details added successfully !";
      }
      else{
        $_SESSION["message"] = "Server busy please try again later !";
      }

     header("Location: course_view_all.php");

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
                   <?php require_once( ROOT_DIR.'/../views/includes/menu.php' ); ?>
                </ul>
            </td>

            <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
                <h2>New Course Creation </h2>
                <p style="color:red;" > <?php echo $message; ?></p>
            <form class="form-horizontal" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' >

              <!-- Course id -->
               <!--  <div class="form-group">
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
                    <input type="text" class="form-control" id="course_code" placeholder="Enter Course Code" name="course_code"
                    value='<?php echo "$course_code" ;?>'>
                    <span id="courseid" style="color:red; font-size: 12px; "><?php echo "$errCourse_code" ;?></span>
                  </div>
                </div>

                <!-- Course name -->
                <div class="form-group">
                  <label class="control-label col-sm-2" for="course_name">Course Name:</label>
                  <div class="col-sm-8">          
                    <input type="text" class="form-control" id="course_name" placeholder="Enter the Course Name" name="course_name"
                    value='<?php echo "$course_name" ;?>'
                    >
                    <span id="course_name" style="color:red; font-size: 12px; "><?php echo "$errCourse_name" ;?></span>
                  </div>
                </div>

                <!-- syllabus -->
                 <div class="form-group">
                  <label class="control-label col-sm-2"  for="syllabus">Syllabus:</label>
                  <div class="col-sm-8">
                     <textarea input type="text" class="form-control" id="syllabus" rows="3" placeholder="Enter the Syllabus" name="syllabus" ><?php echo htmlspecialchars("$syllabus");?></textarea>
                    <span id="syllabus" style="color:red; font-size: 12px;
                                                 "><?php echo "$errSyllabus" ;?></span>
                  </div>
                </div>

                <!-- duration -->
                <div class="form-group">
                  <label class="control-label col-sm-2" for="duration">Duration:</label>
                  <div class="col-sm-8">          
                    <input type="text" class="form-control" id="duration" placeholder="Duration for the Course" name="duration" value='<?php echo "$duration" ;?>'>
                    <span id="duration" style="color:red; font-size: 12px;
                                                 "><?php echo "$errDuration" ;?></span>
                  </div>
                </div>

                <!-- fees -->
                <div class="form-group">
                  <label class="control-label col-sm-2" for="fees">Fees:</label>
                  <div class="col-sm-8">          
                    <input type="text" class="form-control" id="fees" placeholder="Enter the Fee" name="fees" value='<?php echo "$fees" ;?>'>
                    <span id="fees" style="color:red; font-size: 12px;
                                                 "><?php echo "$errFees" ;?></span>
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