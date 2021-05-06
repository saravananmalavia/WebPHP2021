
  <?php
   session_start();
   require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/studentCourseClass.php' );    
    require_once( ROOT_DIR.'/../service/studentCourseService.php' );

    include('../includes/header.php');
    // ROOT_DIR.'/../views/includes/menu.php'
?>

            <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
                
                <hh>Student Course Information</hh>

                <a href="studentcourse_create.php"; ><button class=button><span >Add New</span></button></a>
                
                <p style="color:red;" > <?php echo $message; ?></p>
                <table class="table">
                        <thead>
                            <tr>
                                <th>Student Course ID</th>
                                <th>Student ID</th>
                                <th>Course code</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                <?php
                 $studentCourseService = new StudentCourseService();
                 $result = $studentCourseService->getStudentCourses();
                 if($result != null){
                     if ($result->num_rows > 0) {
                       // output data of each row
                       while($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row["student_course_id"]; ?></td>
                                <td><?php echo $row["student_id"]; ?></td>
                                <td><?php echo $row["course_code"]; ?></td>
                                <td><?php echo $row["start_date"]; ?></td>
                                <td><?php echo $row["end_date"]; ?></td>
                                <td><a class="btn-primary" href='studentCourse_edit.php?student_course_id=<?php echo $row["student_course_id"];  ?>' >Edit</a></td>
                                <td><a class="btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" href='studentCourse_delete.php?student_course_id=<?php echo $row["student_course_id"];  ?>'  >Delete</a></td>

                            </tr>
                            <?php

                                        }
                                 } else {
                                    ?>
                                        <tr>
                                            <td colspan="8"> No Records Found !</td>
                                        </tr>
                                    <?php
                                 }   
                                }else{
                                    ?>
                                    <tr>
                                         <td colspan="8"> Server busy try again later !</td>
                                    </tr>
                                    
                                 <?php
                            }
                            ?>
                        


                                       
                        </tbody>
                </table>


            </td>

        </tr>
     
             

        </tr>
        <table border="0" width="100%" >
        <tr>
            <td colspan="3" style="padding:1px; background-color:#acb3b9; text-align:center;">
                <p>copyright &copy; <?php echo date("Y"); ?> keltron knowledge center</p>
            </td>
        </tr>
    </table>
</body>
</html>