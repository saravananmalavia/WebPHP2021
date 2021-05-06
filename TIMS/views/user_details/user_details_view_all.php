<?php 
session_start();
    
    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/User.class.php' );    
    require_once( ROOT_DIR.'/../service/userService.php' );
    //require_once 'User.class.php';
    //require_once 'userService.php';

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
          margin-left:75%;
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
          margin-right: 55%;
          padding-right: 300px;
          left: 60%;
        }
</style>

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
					<?php require_once ( ROOT_DIR.'/../views/includes/menu.php' ); ?>
				</ul>
			</td>

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