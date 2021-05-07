
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>KKC-Home</title>
<link rel="stylesheet"
      href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<link rel="stylesheet"
     href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

<style>
	input{
		position: relative;
	}

	.none{
		display: none;
	}

	span{
		color: red;
        font-weight: 50;
	}

	#num{
		width: 3em;
	}

	fieldset{
		margin-left: 2em;
	}
</style>

<head>
	<body style="margin:0px;">
		<table  style="width:100%; border-collapse:collapse; font:14px Arial,sans-serif;">
			<tr>
				<td  colspan="3" style="padding:10px 20px; background-color:#acb3b9;">
					<h1 style="font-size:24px;"> Keltron Knowledge Center</h1>
					<div>
        			<?php include(ROOT_DIR.'/../views/includes/banner.php'); ?>
        			</div>
				</td>
			</tr>


		 <tr  style="height:270px;">
				<td  style="width:12%; padding:10px 10px; background-color:#d4d7dc; vertical-align: top;">
					<ul  style="list-style:none; padding:0px; line-height:24px;">
						<?php require_once ( ROOT_DIR.'/../views/includes/menu.php' ); ?>
					</ul>
				</td>	