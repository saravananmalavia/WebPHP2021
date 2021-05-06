<?php
session_start();
    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/courseClass.php' );    
    require_once( ROOT_DIR.'/../service/courseService.php' );
    include('../includes/header.php');

?>



      <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
          <hh>Course Information </hh>
          <a href="course_create.php"; ><button class=button><span>Add New</span></button></a>
          <p style="color:red;" > <?php echo $message; ?></p>
          <table class="table">
                  <thead>
                      <tr>
                          <th>Course ID</th>
                          <th>Course Code</th>
                          <th>Course Name</th>
                          <th>Syllabus</th>
                          <th>Duration</th>
                          <th>Fees</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </tr>
                  </thead>
                  <tbody>

          <?php
           $courseService = new courseService();
           $result = $courseService->getCourses();
           if($result != null){
               if ($result->num_rows > 0) {
                
                 // output data of each row
                 while($row = $result->fetch_assoc()) {
                      ?>
                      <tr>
                          <td><?php echo $row["course_id"]; ?></td>
                          <td><?php echo $row["course_code"]; ?></td>
                          <td><?php echo $row["course_name"]; ?></td>
                          <td><?php echo $row["syllabus"]; ?></td>
                          <td><?php echo $row["duration"]; ?></td>
                          <td><?php echo $row["fees"]; ?></td>
                          <td><a class="btn-primary" href='course_edit.php?course_id=<?php echo $row["course_id"];  ?>' >Edit</a></td>
                          <td><a class="btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" href='course_delete.php?course_id=<?php echo $row["course_id"];  ?>' >Delete</a></td>

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