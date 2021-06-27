<?php
session_start();
    // require_once 'attendance.class.php';
    // require_once 'AttendanceService.php';

    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/attendance.class.php' );    
    require_once( ROOT_DIR.'/../service/AttendanceService.php' );
    include('../includes/header.php');
    ?>


 

            <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
          <hh>Attendance Information </hh>
          <a href="attendance_create.php"; ><button class=button><span>Add New</span></button></a>
          <p style="color:red;" > <?php echo $message; ?></p>
            <table class="table">
            <thead>
            <tr>
                                            
                                
                                            <th>Student Attendance Id</th>
                                            <th> Student Id</th>
                                            <th>Attendance Date</th>
                                            <th>Attendance Session</th>
                                            <th>Status</th>
                                            <th>Remarks </th>
                                            <th>Edit </th>
                                            <th>Delete</th>
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