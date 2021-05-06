<?php  
session_start();

    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/studentDetails.class.php' );
    require_once( ROOT_DIR.'/../service/studentService.php' );
    //require_once 'studentDetails.class.php';
    //require_once 'StudentService.php';

$message ="";
$errStudentName = $errAddress = $errGender = $errEmail = $errMobile = $errEducation = "";
$student_name = $address = $gender = $email= $mobile =  $education = "";

$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$student_name = $_POST['student_name'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $education = $_POST['education'];

 //name
    if(empty($student_name)){
    	$errStudentName = "* Name should not be empty";
        $error = true;
    }

 //address
    if(empty($address)){
    	$errAddress = "* Address should not be empty";
        $error = true;
    }

 //gender
    if(empty($gender)){
	    $errGender = "* Please select";
	    $error = true;
	}

 //email
	if(empty($email)){
		$errEmail = "This Field Is Mandatory";
	    $error = true;
	}
	else{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errEmail = "Invalid email format";
            $error = true;
		}
	}

 //mobile
	if(empty($mobile)){
		$errMobile = " Mobile No should not be empty";
	    $error = true;
	}
	else{
		if (filter_var($mobile, FILTER_VALIDATE_INT)){
			if (strlen($mobile) !=10 ){
				$errMobile = "Mobile No must be Ten Digit long";
			    $error = true;
			}
		}
		else{
			$errMobile ="Mobile No should be an Intger";
 	 	    $error = true;
		}
	}

 //education
	if(empty($education)){
		$errEducation = "* Education should not be empty";
        $error = true;
	}

	if($error == true ){
		$message = "please fix the errors";
	}
	else{
		echo $student_name;

		$studentObj = new Student();

		$studentObj->setStudentName($student_name);
        $studentObj->setAddress($address);
        $studentObj->setGender($gender);
        $studentObj->setEmail($email);
        $studentObj->setMobile($mobile);
        $studentObj->setEducation($education);

        $studentService = new StudentService();
        $result = $studentService->addStudent($studentObj);

        if($result > 0){
        	$_SESSION["message"] = "Student details added successfully !";
        }
        else{
        	$_SESSION["message"] = "Server busy please try again later !";
        }

        header("Location: student_personal_details_view_all.php");
	}

}
?>

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
				</td>
			</tr>


		 <tr  style="height:270px;">
				<td  style="width:12%; padding:10px 10px; background-color:#d4d7dc; vertical-align: top;">
					<ul  style="list-style:none; padding:0px; line-height:24px;">
						<?php require_once ( ROOT_DIR.'/../views/includes/menu.php' ); ?>
					</ul>
				</td>		
					  
			


			<td  style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
				<h2>New Student Profile Creation</h2>
				<p  style="color:red;" > <?php echo $message; ?></p>

				<form  class="form-horizontal" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
                         <!--NAME-->
                    
					<div  class="form-group">
						<label  class="control-label col-sm-2" for="student_name">Student Name:</label>
						<div  class="col-sm-10">

							<input  type="text" 
							        class="form-control" 
							        id="student_name" 
							        placeholder="Enter student name" 
							        name="student_name"
                                    value='<?php echo "$student_name" ;?>'>

                            <span  id="e2" ><br/><?php echo "$errStudentName" ;?></span>
						</div>
					</div>
                            <!--ADDRESS-->

					<div  class="form-group">
						<label  class="control-label col-sm-2" for="address">Address:</label>
						<div  class="col-sm-10">
							
							<input  type="text" 
							        class="form-control" 
							        id="address" 
							        placeholder="Enter student name" 
							        name="address"
                                    value='<?php echo "$address" ;?>'>

                            <span  id="e2" ><br/><?php echo "$errAddress" ;?></span>
						</div>
					</div>
                              <!--GENDER-->

					<div  class = "form-group">
						<label  class="control-label col-sm-2" for="gender">Gender:</label>
						<div  class="col-sm-10">
						   <label>  <input type = "radio" name = "gender" <?php if (isset($gender) && $gender=="male")echo "checked";?> value = "male"> Male </label>
						  <!--  <labe>   <input type = "radio" name = "gender" id = "female"> Female </label>-->
						   <label>  <input type = "radio" name = "gender" <?php if (isset($gender) && $gender=="female")echo "checked";?> value = "female"> Female </label>
						   <label>  <input type = "radio" name = "gender" <?php if (isset($gender) && $gender=="other")echo "checked";?> value = "other"> Other </label>

                          <span  id="e2" ><br/><?php echo "$errGender" ;?></span>
					 	</div>				
					</div>
                            <!--EMAIL-->

					<div  class="form-group">
						<label  class="control-label col-sm-2" for="email">Email:</label>
						<div  class="col-sm-10">

							<input  type="text" 
							        class="form-control" 
							        id="email" 
							        placeholder="Enter email ID" 
							        name="email"
                                    value='<?php echo "$email" ;?>'>

                            <span  id="e2" ><br/><?php echo "$errEmail" ;?></span>
						</div>
					</div>
                            <!--MOBILE-->

					<div  class="form-group">
						<label  class="control-label col-sm-2" for="mobile">Mobile:</label>
						<div  class="col-sm-10">

						 <input  type="number" 
							        class="form-control" 
							        id="mobile" 
							        placeholder="Enter mobile number" 
							        name="mobile"
                                    value='<?php echo "$mobile" ;?>'>

                          <span  id="e2" ><br/><?php echo "$errMobile" ;?></span>
					    </div>
					</div>
                               <!--EDUCATION-->  

					<div  class="form-group">
						<label  class="control-label col-sm-2" for="education">Education:</label>
						<div  class="col-sm-10">
							<select  class="default" id="education" name="education">
								<option value="" selected>Select one...</option>
                                <option value="UG">UG</option>
                                <option value="PG">PG</option>
                                <option value="PhD">PhD</option>
							</select>

						 <span  id="e2" ><br/><?php echo "$errEducation" ;?></span>
						</div>
					</div>
                              <!--SUBMIT-->

					<div  class="form-group">
						<div  class="col-sm-offset-2 col-sm-10">
							<button  type="submit" class="btn btn-default">Submit</button>
						</div>
					</div>


				</form>
			</td>		
		  </tr>

		  <tr>
		  	<td  colspan="3" style="padding:5px; background-color:#acb3b9; text-align:center;">
		  		<p>copyright &copy; <?php echo date("Y"); ?> keltron knowledge center</p>
		  	</td>
		  </tr>	
			
			
		</table>
    </body>
</head>
    
    	

  


   





