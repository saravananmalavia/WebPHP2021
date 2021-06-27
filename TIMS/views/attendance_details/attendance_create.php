<?php
session_start();
    // require_once 'attendance.class.php';
    // require_once 'AttendanceService.php';

    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/attendance.class.php' );    
    require_once( ROOT_DIR.'/../service/AttendanceService.php' );
    include('../includes/header_sub.php');



$message ="";
$errstudentattendanceid = $errstudentid = $errattendancedate = $errattendancesession = $errstatus = $errremarks = "";
$student_attendance_id = $student_id = $attendance_date = $attendance_session = $status = $remarks = "";

$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$student_attendance_id = $_POST['student_attendance_id'];
$student_id = $_POST['student_id'];
$attendance_date = $_POST['attendance_date'];
$attendance_session = $_POST['attendance_session'];
$status = $_POST['status'];
$remarks = $_POST['remarks'];


if(empty($student_attendance_id)){
  $errstudentattendanceid = "* studentattendanceid should not be empty";
  $error = true;
}


if(empty($student_id)){
  $errstudentid = "* studentid should not be empty";
  $error = true;
}

if(empty($attendance_date)){
  $errattendancedate = "* attendancedate should not be empty";
  $error = true;
}
if(empty($attendance_session)){
  $errattendancesession = "* attendancesession should not be empty";
  $error = true;
}


if(empty($status)){
  $errstatus = "* status should not be empty";
  $error = true;
}

if($error == true ){
    $message = "please fix the errors";

}else{

    echo $student_attendance_id;

    $attendanceObj = new Attendance();

    $attendanceObj->setstudentattendanceid($student_attendance_id);
    $attendanceObj->setstudentid($student_id);
    $attendanceObj->setattendancedate($attendance_date);
    $attendanceObj->setattendancesession($attendance_session);
    $attendanceObj->setstatus($status);
    $attendanceObj->setremarks($remarks);

    $attendanceService = new AttendanceService();
    $result = $attendanceService->addAttendance($attendanceObj);

    if($result > 0){
        $_SESSION["message"] = "Student details added successfully !";
      }
      else{
        $_SESSION["message"] = "Server busy please try again later !";
      }

     header("Location: attendance_view_all.php");

    }





}
?>


            <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
                <h2>New Student Creation </h2>
                <p style="color:red;" > <?php echo $message; ?></p>
            <form class="form-horizontal" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' >
                <div class="form-group">
                  <label class="control-label col-sm-2" for="student_attendance_id">Student Attendance Id:</label>
                  <div class="col-sm-10">
                    <input type="varchar" class="form-control" id="student_attendance_id" placeholder="Enter student attendance id" name="student_attendance_id"
                    value='<?php echo "$student_attendance_id" ;?>'
                    >
                    <span id="e2" ><br/><?php echo "$errstudentattendanceid" ;?></span>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-2" for="studentid">Student Id:</label>
                  <div class="col-sm-10">          
                    <input type="varchar" class="form-control" id="student_id" placeholder="Enter student id" name="student_id"
                    value='<?php echo "$student_id" ;?>'
                    >
                    <span id="student_id" style="color:red; font-size: 8px;
                    "><?php echo "$errstudentid" ;?></span>
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-sm-2" for="attendancedate">Attendance Date:</label>
                  <div class="col-sm-10">          
                    <input type="date" class="form-control" id="attendance_date" placeholder="Enter attendance date" name="attendance_date"
                    value='<?php echo "$attendance_date" ;?>'
                    >
                    <span id="attendance_date" style="color:red; font-size: 8px;
                    "><?php echo "$errattendancedate" ;?></span>
                  </div>
                </div>

                

                    <div  class="form-group">
                <label  class="control-label col-sm-2" for="attendancesession">Attendance Session:</label>
                <div  class="col-sm-10">
                  <select  class="default" id="attendance_date" name="attendance_session">
                    <option value="" selected>Select one...</option>
                                    <option value="FN">FN</option>
                                    <option value="AN">AN</option>
                                    
                  </select>

                 <span  id="e2" ><br/><?php echo "$errattendancesession" ;?></span>
                </div>
              </div>



                <div  class="form-group">
            <label  class="control-label col-sm-2" for="status">Status:</label>
            <div  class="col-sm-10">
              <select  class="default" id="status" name="status">
                <option value="" selected>Select one...</option>
                                <option value="P">P</option>
                                <option value="A">A</option>
                                
              </select>

             <span  id="e2" ><br/><?php echo "$errattendancesession" ;?></span>
            </div>
          </div>

                <div  class="form-group">
            <label  class="control-label col-sm-2" for="remarks">Remarks:</label>
            <div  class="col-sm-10">
              <select  class="default" id="remarks" name="remarks">
                <option value="" selected>Select one...</option>
                                <option value="Late">Late</option>
                                <option value="Permission">Permission</option>
                                <option value="LeaveApplied">Leave Applied</option>
              </select>

             <span  id="e2" ><br/><?php echo "$errremarks" ;?></span>
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
                <p>copyright &copy; <?php echo date("Y"); ?> keltron Student Attendance Details</p>
            </td>
        </tr>
    </table>
</body>
</html>