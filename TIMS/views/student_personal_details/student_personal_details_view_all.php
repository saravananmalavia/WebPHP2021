<?php
session_start();
    
    require_once 'studentDetails.class.php';
    require_once 'studentService.php';

    if(isset($_SESSION["message"])){
    	$message = $_SESSION["message"];
        unset($_SESSION["message"]);
    }
    else{
    	 $message="";
    }
?>


<!DOCTYPE html>
<html>
<head>
	<title>KKC-Home</title>
	<link rel="stylesheet"
      href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet"
     href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>

<body  style="margin:0px;">
	<table  style="width:100%; border-collapse:collapse; font:14px Arial,sans-serif;">
		<tr>
			<td  colspan="3" style="padding:10px 20px; background-color:#acb3b9;">
				<h1  style="font-size:24px;"> Keltron Knowledge Center</h1>
			</td>
		</tr>

		<tr  style="height:270px;">
			<td  style="width:12%; padding:10px 10px; background-color:#d4d7dc; vertical-align: top;">
				<ul  style="list-style:none; padding:0px; line-height:24px;">
					<?php require_once 'menu.php' ?>
				</ul>
			</td>

			<td  style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
				<h2>Student Personal Information </h2>
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