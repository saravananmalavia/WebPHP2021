

  <?php
   session_start();
  require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/staffClass.php' );    
    require_once( ROOT_DIR.'/../service/staffService.php' );

    include('../includes/header.php')
?>

            <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
                <hh>Staff Information </hh>
                <a href="CreateStaff_details.php"; ><button class=button><span>Add New</span></button></a>
                <p style="color:red;" > <?php echo $message; ?></p>
                <table class="table">
                        <thead>
                            <tr>
                                <th>Staff ID</th>
                                <th>Staff Name</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Education</th>
                                <th>Subject</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                <?php
                 $staffservice = new staffservice();
                 $result = $staffservice->getStaffs();
                 if($result != null){
                     if ($result->num_rows > 0) {
                       // output data of each row
                       while($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row["staff_id"]; ?></td>
                                <td><?php echo $row["staff_name"]; ?></td>
                                <td><?php echo $row["address"]; ?></td>
                                <td><?php echo $row["gender"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["mobile"]; ?></td>
                                <td><?php echo $row["education"]; ?></td>
                                <td><?php echo $row["subject"]; ?></td>
                                
                                <td><a class="btn-primary" href='staffEdit.php?staff_id=<?php echo $row['staff_id'];  ?>' >Edit</a></td>
                                <td><a class="btn-danger" href='staffDelete.php?staff_id=<?php echo $row['staff_id'];  ?>' >Delete</a></td>

                            </tr>
                            <?php

                                        }
                                 } else {
                                    ?>
                                        <tr>
                                            <td colspan="10"> No Records Found !</td>
                                        </tr>
                                    <?php
                                 }   
                                }else{
                                    ?>
                                    <tr>
                                         <td colspan="10"> Server busy try again later !</td>
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
