<?php 
     if(!isset($_SESSION['user_name'])){
       header("Location: ../login/login.php");

    }
   
?>
<?php

    if(isset($_SESSION['message'])){
    	$message = $_SESSION['message'];
        unset($_SESSION['message']);
    }
    else{
    	 $message=" ";
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
    <link rel="stylesheet" href="../includes/mystyle.css">
</head>



<body  style="margin:0px;">
	<table  style="width:100%; border-collapse:collapse; font:14px Arial,sans-serif;">
		<tr>
			<td  colspan="3" style="padding:10px 20px; background-color:#acb3b9;">
				<h1  style="font-size:24px;"> Keltron Knowledge Center</h1>
        <div>
        <?php include(ROOT_DIR.'/../views/includes/banner.php'); ?>
        </div>
			</td>
		</tr>

      <tr>
      <td  colspan="3" style="padding:10px 20px; background-color:#acb3b9;">
        
        <div>
            <?php echo "Name : " . $_SESSION['user_name']; ?>
            <?php echo "User Type  : " . $_SESSION['user_type']; ?>
        </div>
      </td>
    </tr>

		<tr  style="height:270px;">
			<td  style="width:12%; padding:10px 10px; background-color:#d4d7dc; vertical-align: top;">
				<ul  style="list-style:none; padding:0px; line-height:24px;">
					<?php 

          if($_SESSION['user_type'] == 'student' ){
            require_once ( ROOT_DIR.'/../views/includes/menu_student.php' ); 
          }else {
             require_once ( ROOT_DIR.'/../views/includes/menu_staff.php' );

          } 


      

          ?>
				</ul>
			</td>