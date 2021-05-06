<?php
   session_start();
    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/User.class.php' );    
    require_once( ROOT_DIR.'/../service/userService.php' );
    include('../includes/header.php')
?>


			<td  style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
				<h2>User Information </h2>
                <a href="user_details_create.php"; ><button class=button><span>Add New</span></button></a>
				<p  style="color:red;" > <?php echo $message; ?></p>

				<table  class="table">
					<thead>
						<tr>
							<th>User ID</th>
							<th>User Name</th>
							<th>Password</th>
							<th>User Type</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>

					<tbody>
						
						<?php

						$userService = new UserService();
                        $result = $userService->getUsers();

                        if($result != null){
                        	if ($result->num_rows > 0) {

                        		while($row = $result->fetch_assoc()) {
                        			?>

                        			<tr>
                        				<td><?php echo $row["user_id"]; ?></td>
                        				<td><?php echo $row["user_name"]; ?></td>
                        				<td><?php echo $row["password"]; ?></td>
                        				<td><?php echo $row["user_type"]; ?></td>
                        				
                        				<td><a class="btn-primary" href='user_details_edit.php?user_id=<?php echo $row['user_id'];  ?>' >Edit</a></td>
                        				<td><a class="btn-danger" href='user_details_delete.php?user_id=<?php echo $row['user_id'];  ?>' >Delete</a></td>
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