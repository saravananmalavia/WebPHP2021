<?php
session_start();
    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/fees.class.php' );    
    require_once( ROOT_DIR.'/../service/FeesService.php' );
    include('../includes/header.php');

    ?>


            <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
                <hh>Fees Information </hh>
                <a href="fees_create.php"; ><button class=button><span>Add New</span></button></a>
                <p style="color:red;" > <?php echo $message; ?></p>
                <table class="table">
                        <thead>
                            <tr>
                                            
                                
                                            <th>>Fees Collection Id</th>
                                            <th> Student Id</th>
                                            <th>Collection Date</th>
                                            <th>Amount</th>
                                            <th>Particulars </th>
                                            <th>Edit </th>
                                            <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                <?php
                 $feesService = new feesService();
                 $result = $feesService->getFeess();
                 if($result != null){
                     if ($result->num_rows > 0) {
                       // output data of each row
                       while($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td> <?php echo $row["fees_collection_id"];  ?> </td>
                                <td><?php echo $row["student_id"];  ?></td>
                                <td><?php echo $row["collection_date"];  ?></td>
                                <td><?php echo $row["amount"];  ?></td>
                                <td><?php echo $row["particulars"];  ?></td>
        
                                <td><a class="btn-primary" href='fees_edit.php?fees_collection_id=<?php echo $row['fees_collection_id'];  ?>' >Edit</a></td>
                                <td><a class="btn-danger" href='fees_delete.php?fees_collection_id=<?php echo $row['fees_collection_id'];  ?>' >Delete</a></td>

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
                <p>copyright &copy; <?php echo date("Y"); ?> Keltron 2021 Student Fees Details</p>
            </td>
        </tr>
    </table>
</body>
</html>