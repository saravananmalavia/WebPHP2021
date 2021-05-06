 <?php
   session_start();
    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/studentDetails.class.php' );
    require_once( ROOT_DIR.'/../service/studentService.php' );
    include('../includes/header_sub.php')
?>	

 <?php

$message ="";
$errStudentId = $errStudentName = $errAddress = $errGender = $errEmail = $errMobile = $errEducation = "";
$student_id = $student_name = $address = $gender = $email= $mobile =  $education = "";

$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$student_id = $_POST['student_id'];
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

		$studentObj->setStudentId($student_id);
		$studentObj->setStudentName($student_name);
        $studentObj->setAddress($address);
        $studentObj->setGender($gender);
        $studentObj->setEmail($email);
        $studentObj->setMobile($mobile);
        $studentObj->setEducation($education);

        $studentService = new StudentService();
        $result = $studentService->updateStudent($studentObj);

        if($result > 0){
        	$_SESSION["message"] = "Student details update successfully !";
        }
        else{
        	$_SESSION["message"] = "Server busy please try again later !";
        }

        header("Location: student_personal_details_view_all.php");
	}
}
	else{
		 $student_id =$_GET['student_id'];

		 $studentService = new studentService();
		 $result = $studentService->getStudent($student_id);

		  if($result != null){
		 	 if ($result->num_rows > 0){
		 		$row = $result->fetch_assoc();

		 		        $student_id = $row["student_id"];
                        $student_name = $row["student_name"];
                        $address = $row["address"];
                        $gender = $row["gender"];
                        $email = $row["email"];
                        $mobile = $row["mobile"];
                        $education = $row["education"];
		 	 }
		  }
	}

  
?>


			<td  style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
				<h2>New Student Profile Creation</h2>
				<p  style="color:red;" > <?php echo $message; ?></p>

				<form  class="form-horizontal" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>

                             <!--ID-->

					<div  class="form-group">
						<label  class="control-label col-sm-2" for="user_id">Student ID:</label>
						<div  class="col-sm-8">
							<input type="number" 
							       class="form-control"
							       id="student_id"
							       placeholder="Enter Student ID"
							       name="student_id"
							       readonly ="true"
							       value='<?php echo "$student_id" ;?>'>

							    <span id="e2" style="color:red; font-size: 12px; "><?php echo "$errStudentId" ;?></span>
						</div>
					</div>


                         <!--NAME-->
                    
					<div  class="form-group">
						<label  class="control-label col-sm-2" for="student_name">Student Name:</label>
						<div  class="col-sm-8">

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
						<div  class="col-sm-8">
							
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
						<div  class="col-sm-8">

						    <label>  <input type = "radio" name = "gender" <?php if (isset($gender) && $gender=="male")echo "checked";?> value = "male"> Male </label>			
						    <label>  <input type = "radio" name = "gender" <?php if (isset($gender) && $gender=="female")echo "checked";?> value = "female"> Female </label>
						    <label>  <input type = "radio" name = "gender" <?php if (isset($gender) && $gender=="other")echo "checked";?> value = "other"> Other </label>

                          <span  id="e2" ><br/><?php echo "$errGender" ;?></span>
					 	</div>				
					</div>
                            <!--EMAIL-->

					<div  class="form-group">
						<label  class="control-label col-sm-2" for="email">Email:</label>
						<div  class="col-sm-8">

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
						<div  class="col-sm-8">

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
						<div  class="col-sm-8">
							<select  class="default" id="education" name="education">

								<?php
								if($education === 'UG'){
									?>
								    <option value="">Select one...</option>
                                    <option value="UG" selected >UG</option>
                                    <option value="PG">PG</option>
                                    <option value="PhD">PhD</option>
                                  <?php
                                }
                                ?>

                                <?php
								if($education === 'PG'){
									?>
								    <option value="">Select one...</option>
                                    <option value="UG">UG</option>
                                    <option value="PG" selected >PG</option>
                                    <option value="PhD">PhD</option>
                                  <?php
                                }
                                ?>

                                 <?php
								if($education === 'PhD'){
									?>
								    <option value="">Select one...</option>
                                    <option value="UG">UG</option>
                                    <option value="PG">PG</option>
                                    <option value="PhD" selected >PhD</option>
                                  <?php
                                }
                                ?>
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