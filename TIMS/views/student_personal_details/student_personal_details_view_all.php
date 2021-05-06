  <?php
   session_start();
    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/studentDetails.class.php' );
    require_once( ROOT_DIR.'/../service/studentService.php' );
    include('../includes/header.php')
?>


			<td  style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
				<h2>Student Personal Information </h2>
                <a href="student_personal_details_create.php"; ><button class=button><span>Add New</span></button></a>
				<p  style="color:red;" > <?php echo $message; ?></p>

				<table  class="table">
					<thead>
						<tr>
							<th>Student ID</th>
							<th>Student Name</th>
							<th>Address</th>
							<th>Gender</th>
							<th>E Mail</th>
							<th>Mobile Number</th>
							<th>Education</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>

					<tbody>
						
						<?php

						$studentService = new StudentService();
                        $result = $studentService->getStudents();

                        if($result != null){
                        	if ($result->num_rows > 0) {

                        		while($row = $result->fetch_assoc()) {
                        			?>

                        			<tr>
                        				<td><?php echo $row["student_id"]; ?></td>
                        				<td><?php echo $row["student_name"]; ?></td>
                        				<td><?php echo $row["address"]; ?></td>
                        				<td><?php echo $row["gender"]; ?></td>
                        				<td><?php echo $row["email"]; ?></td>
                        				<td><?php echo $row["mobile"]; ?></td>
                        				<td><?php echo $row["education"]; ?></td>
                        				<td><a class="btn-primary" href='student_personal_details_edit.php?student_id=<?php echo $row['student_id'];  ?>' >Edit</a></td>
                        				<td><a class="btn-danger" href='student_personal_details_delete.php?student_id=<?php echo $row['student_id'];  ?>' >Delete</a></td>
                        			</tr>

                        			<?php  
                        		}
                        	}
                        	else{

                        		?>
                        		<tr>
                        			<td  colspan="9">No Records Found !</td>
                        		</tr>
                        		<?php
                        	}
                        	
                        }
                        else{

                        	?>
                        	<tr>
                        		<td  colspan="9">Server busy try again later !</td>
                        	</tr>
                        	<?php
                        }
                        ?>

                        
					</tbody>
				</table>
			</td>
		</tr>

		<tr>
			<td  colspan="3" style="padding:5px; background-color:#acb3b9; text-align:center;">
				<p>copyright &copy; <?php echo date("Y"); ?> keltron knowledge center</p>
			</td>
		</tr>
	</table>

</body>
</html>