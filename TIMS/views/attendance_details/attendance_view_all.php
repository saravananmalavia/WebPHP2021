<?php
session_start();
    // require_once 'attendance.class.php';
    // require_once 'AttendanceService.php';

    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/attendance.class.php' );    
    require_once( ROOT_DIR.'/../service/AttendanceService.php' );
    

    if(isset($_SESSION["message"])){
    $message = $_SESSION["message"];
    unset($_SESSION["message"]);
}
else{
    $message="";    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Attendance List</title>
<link rel="stylesheet"
      href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<link rel="stylesheet"
     href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

</head>
<style>

.button {
          border-radius: 4px;
          background-color: #008000;
          border: none;
          color: #FFFFFF;
          text-align: center;
          font-size: 15px;
          padding: 5px;
          width: 115px;
          transition: all 0.5s;
          cursor: pointer;
          margin: 5px;
          margin-left:55%;
        }

        .button span {
          cursor: pointer;
          display: inline-block;
          position: relative;
          transition: 0.5s;
        }

        .button span:after {
          content: '\00bb';
          position: absolute;
          opacity: 0;
          top: 0;
          right: -20px;
          transition: 0.5s;
        }

        .button:hover span {
          padding-right: 15px;
        }

        .button:hover span:after {
          opacity: 1;
          right: 0;
        }

        hh {
        font-size: 30px;
        /*margin-right: 55%;*/
        /*padding-right: 300px;*/
        /*left: 60%;*/
        }

        </style>
<body style="margin:0px;">
    <table   style="width:100%; border-collapse:collapse; font:14px Arial,sans-serif;">
        <tr>
            <td colspan="3" style="padding:10px 20px; background-color:#acb3b9;">
                <h1 style="font-size:24px;"> Student Attendance Management System</h1>
            </td>
        </tr>
        <tr style="height:270px;">
           
             <td style="width:12%; padding:10px 10px; background-color:#d4d7dc; vertical-align: top;">
                <ul style="list-style:none; padding:0px; line-height:24px;">
                <?php require_once( ROOT_DIR.'/../views/includes/menu.php' ); ?>
                </ul>
            </td> 

            <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
                <hh>Attendance Information </hh>
                <a href="attendance_create.php"; ><button class=button><span>Add New</span></button></a>
                <p style="color:red;" > <?php echo $message; ?></p>

            <!-- <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
                <h2>Student Information </h2>
                <p style="color:red;" > <?php //echo $message; ?></p> -->
                <table class="table">
                        <thead>
                            <tr>
                                            
                                
                                            <td>Student Attendance Id</td>
                                            <td> Student Id</td>
                                            <td>Attendance Date</td>
                                            <td>Attendance Session</td>
                                            <td>Status</td>
                                            <td>Remarks </td>
                                            <td>Edit </td>
                                            <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>

                <?php
                 $attendanceService = new attendanceService();
                 $result = $attendanceService->getAttendances();
                 if($result != null){
                     if ($result->num_rows > 0) {
                       // output data of each row
                       while($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td> <?php echo $row["student_attendance_id"];  ?> </td>
                                <td><?php echo $row["student_id"];  ?></td>
                                <td><?php echo $row["attendance_date"];  ?></td>
                                <td><?php echo $row["attendance_session"];  ?></td>
                                <td><?php echo $row["status"];  ?></td>
                                <td><?php echo $row["remarks"];  ?></td>
        
                                 <td><a class="btn-primary" href='attendance_edit.php?student_attendance_id=<?php echo $row["student_attendance_id"];  ?>' >Edit</a></td>
                                <td><a class="btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" href='attendance_delete.php?student_attendance_id=<?php echo $row["student_attendance_id"];  ?>' >Delete</a></td>
                            </tr>
                            <?php

                                        }
                                 } else {
                                    ?>
                                        <tr>
                                            <td colspan="9"> No Records Found !</td>
                                        </tr>
                                    <?php
                                 }   
                                }else{
                                    ?>
                                    <tr>
                                         <td colspan="9"> Server busy try again later !</td>
                                    </tr>
                                    
                                 <?php
                            }
                            ?>
                        


                                       
                        </tbody>
                </table>


            </td>

        </tr>
     
             

        </tr>
        <tr>
            <td colspan="3" style="padding:5px; background-color:#acb3b9; text-align:center;">
                <p>copyright &copy; <?php echo date("Y"); ?> Keltron 2021 Student Attendance</p>
            </td>
        </tr>
    </table>
</body>
</html>