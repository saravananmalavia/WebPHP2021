  <?php
   session_start();
    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/examClass.php' );    
    require_once( ROOT_DIR.'/../service/examService.php' );
    include('../includes/header.php')
?>

           <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
                <hh>Exam Time-table Details</hh>
                <a href="createExam_details.php"; ><button class=button><span>Add New</span></button></a>
                <p style="color:red;" > <?php echo $message; ?></p>
                <table class="table">
                        <thead>
                            <tr>
                                <th>Exam Timetable ID</th>
                                <th>Subject Name</th>
                                <th>Exam Date</th>
                                <th>Exam Time</th>
                                <th>Remarks</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                <?php
                 $examservice = new ExamService();
                 $result = $examservice->getExams();
                 if($result != null){
                     if ($result->num_rows > 0) {
                       // output data of each row
                       while($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row["exam_time_table_id"]; ?></td>
                                <td><?php echo $row["subject_name"]; ?></td>
                                <td><?php echo $row["exam_date"]; ?></td>
                                <td><?php echo $row["exam_time"]; ?></td>
                                <td><?php echo $row["remarks"]; ?></td>
                                
                                <td><a class="btn-primary" href='examEdit.php?exam_time_table_id=<?php echo $row['exam_time_table_id'];  ?>' >Edit</a></td>
                                <td><a class="btn-danger" href='examDelete.php?exam_time_table_id=<?php echo $row['exam_time_table_id'];  ?>' >Delete</a></td>

                            </tr>
                            <?php

                                        }
                                 } else {
                                    ?>
                                        <tr>
                                            <td colspan="7"> No Records Found !</td>
                                        </tr>
                                    <?php
                                 }   
                                }else{
                                    ?>
                                    <tr>
                                         <td colspan="7"> Server busy try again later !</td>
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
                <p>copyright &copy; <?php echo date("Y"); ?> keltron knowledge center</p>
            </td>
        </tr>
    </table>
</body>
</html>
