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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
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
          /*margin-left:75%;*/
          margin-right:2em;
          float: right;
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
        }
        input {
          position: relative;
        }
        
        .none {
          display: none;
        }
        
        #num {
          width: 3em;
        }
        
        fieldset {
          margin-left: 2em;
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