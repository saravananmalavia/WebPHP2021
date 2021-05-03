<?php

session_start();
require_once 'DBconnectionclass.php';   
 //secho"ok";

require_once 'staffClass.php';
    //require_once '../../student/StudentService.php';
    require_once 'staffService.php';


$message ="";
$errStaffName = $errAddress = $errgender = $erremailid = $errmobileno = $errEducation = $errSubject = $errid = "";
$staff_name = $address = $gender = $email= $mobile=$education = $subject = $staff_id =  "";

$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "i am in post <br>";
$staff_id = $_POST['staff_id'];
$staff_name = $_POST['staff_name'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$education = $_POST['education'];
$subject = $_POST['subject'];


if(empty($staff_id)){
    $errid = "* ID should not be empty";
    $error = true;
}

if(empty($staff_name)){
    $errStaffName = "* Name should not be empty";
    $error = true;
}
if(empty($address)){
    $errAddress = "* Address should not be empty";
    $error = true;
}

if(empty($gender)){
  $errgender = "* Gender is required";
  $error = true;
}


if (empty($email)){
  $erremailid = "Email ID is required";
  $error = true;
}
else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $erremailid = "Invalid email format";
      $error = true;
    }
  }
  if(empty($mobile)){
  $errmobileno = " Mobile No should not be empty";
  $error = true;
}else{
  if (filter_var($mobile, FILTER_VALIDATE_INT)) {
    if (strlen($mobile) !=10 ){
      $errmobileno = "Mobile No must be Ten Digit long";
      $error = true;
    }
  }else{
    $errmobileno ="Mobile No should be an Intger";
    $error = true;
  }
    
}

if(empty($education)){
    $errEducation = "* Education should not be empty";
    $error = true;
}
if(empty($subject)){
    $errSubject = "* Subject should not be empty";
    $error = true;
}

if($error == true ){
    $message = "please fix the errors";

}else{
 // echo " iam in else <br>";

   // echo $staff_name;

    $staffObj = new Staff();

    $staffObj->setStaffID($staff_id);
    $staffObj->setStaffName($staff_name);
    $staffObj->setAddress($address);
    $staffObj->setGender($gender);
    $staffObj->setEmail($email);
    $staffObj->setMobile($mobile);
    $staffObj->setEducation($education);
    $staffObj->setSubject($subject);


    $createservice = new StaffService();
    $result = $createservice->updateStaff($staffObj);

    if($result > 0){
        $_SESSION["message"] = "Staff details updated successfully !";
      }
      else{
        $_SESSION["message"] = "Server busy please try again later !";
      }

    header("Location: staff_View_All.php");

    }
  }

else{
  //echo "i am in else part";
    $staff_id = $_GET['staff_id'];

   $createservice = new StaffService();
    $result = $createservice->getStaff($staff_id);
      if($result != null){
        if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
       $staff_id = $row["staff_id"]; 
       $staff_name = $row["staff_name"];
       $address = $row["address"];
       $gender = $row["gender"];
       $email = $row["email"];
       $mobile = $row["mobile"];
       $education = $row["education"];
       $subject = $row["subject"];

      }
   }
}
?><!DOCTYPE html>
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
    input {
      position: relative;
    }
    
    .none {
      display: none;
    }
    
    span {
      color: red;
      font-weight: 50;
    }
    
    #num {
      width: 3em;
    }
    
    fieldset {
      margin-left: 2em;
    }
  </style>

</head>
<body style="margin:0px;">
    <table   style="width:100%; border-collapse:collapse; font:14px Arial,sans-serif;">
        <tr>
            <td colspan="3" style="padding:10px 20px; background-color:#acb3b9;">
                <h1 style="font-size:24px;"> Keltron Knowledge Center</h1>
            </td>
        </tr>
        <tr style="height:270px;">
           
            <td style="width:12%; padding:10px 10px; background-color:#d4d7dc; vertical-align: top;">
                <ul style="list-style:none; padding:0px; line-height:24px;">
                   <?php require_once 'menuoop.php' ?>
                   <!--<?php //require_once '../../include/menu.php' ?> -->
                </ul>
            </td>

            <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
                <h2>New Staff Creation </h2>
                <p style="color:red;" > <?php echo $message; ?></p>
            <form class="form-horizontal" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' >
              <div class="form-group">
                  <label class="control-label col-sm-2" for="staff_id">Staff ID :</label>
                  <div class="col-sm-10">          
                    <input type="int" class="form-control" id="staff_id" placeholder="Enter staff_id" name="staff_id"
                    value='<?php echo $staff_id ;?>'readonly ="true" 
                    >
                    <span id="exam_time_table_id" style="color:red; font-size: 8px;
                    "><?php echo "$errid" ;?></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="staff_name">Staff Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="staff_name" placeholder="Enter staff name " name="staff_name"
                    value='<?php echo "$staff_name" ;?>'
                    >
                    <span id="staff_name" style="color:red; font-size: 8px;
                    "><?php echo "$errStaffName" ;?></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="address">Address:</label>
                  <div class="col-sm-10">          
                    <input type="text" class="form-control" id="address" placeholder="Enter address" name="address"
                    value='<?php echo "$address" ;?>'
                    >
                    <span id="address" style="color:red; font-size: 8px;
                    "><?php echo "$errAddress" ;?></span>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="control-label col-sm-2" for="gender">Gender:</label>
                  <div class="col-sm-10">
                        
                    <input type="radio" name = "gender" 
                   <?php if (isset($gender) && $gender=="female")echo "checked";?> value="female">Female
                      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male")echo "checked";?> value="male">Male
                      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other")echo "checked";?> value="other">Other

                    <span id="gender" style="color:red; font-size: 8px;
                                                 "><?php echo "$errgender" ;?></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Email:</label>
                  <div class="col-sm-10">          
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value='<?php echo "$email" ;?>'>
                    <span id="email" style="color:red; font-size: 8px;
                                                 "><?php echo "$erremailid" ;?></span>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="mobile">Mobile:</label>
                  <div class="col-sm-10">          
                    <input type="number" class="form-control" id="mobile" placeholder="Enter mobile" name="mobile" value='<?php echo "$mobile" ;?>'>
                    <span id="mobile" style="color:red; font-size: 8px;
                                                 "><?php echo "$errmobileno" ;?></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="education">Education:</label>
                  <div class="col-sm-10">
                    <select  class="default" id="education" name="education">
                        <?php
                      if($education === 'UG')
                        {?>

                                <option value="" >Select one...</option>
                                <option value="UG"selected >UG</option>
                                <option value="PG" >PG</option>
                                <option value="PhD">PhD</option>
                      <?php  } ?> 
                      <?php
                      if($education === 'PG')
                        {?>

                                <option value="" >Select one...</option>
                                <option value="UG" >UG</option>
                                <option value="PG"selected >PG</option>
                                <option value="PhD">PhD</option>
                      <?php  } ?>
                      <?php
                      if($education === 'PhD')
                        {?>

                                <option value="" >Select one...</option>
                                <option value="UG">UG</option>
                                <option value="PG"  >PG</option>
                                <option value="PhD"selected>PhD</option>
                      <?php  } ?>                     
                    </select>

                    <span id="education" style="color:red; font-size: 8px;
                    "><?php echo "$errEducation" ;?></span>
                  </div>
                </div>
                                <div class="form-group">
                  <label class="control-label col-sm-2" for="subject">Subject:</label>
                  <div class="col-sm-10">
                    <select  class="default" id="subject" name="subject">
                        <?php
                      if($subject === 'JAVA')
                        {?>

                                <option value="" >Select one...</option>
                                <option value="PHP" >PHP</option>
                                <option value="JAVA" selected >JAVA</option>
                                <option value="PYTHON">PYTHON</option>
                      <?php  } ?> 
                      <?php
                      if($subject === 'PYTHON')
                        {?>

                                <option value="" >Select one...</option>
                                <option value="PHP" >PHP</option>
                                <option value="JAVA" >JAVA</option>
                                <option value="PYTHON" selected>PYTHON</option>
                      <?php  } ?>
                      <?php
                      if($subject === 'PHP')
                        {?>

                                <option value="" >Select one...</option>
                                <option value="PHP" selected>PHP</option>
                                <option value="JAVA"  >JAVA</option>
                                <option value="PYTHON">PYTHON</option>
                      <?php  } ?>                     
                    </select>

                    <span id="subject" style="color:red; font-size: 8px;
                    "><?php echo "$errSubject" ;?></span>
                  </div>
                </div>
                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Submit</button>
                  </div>
                </div>
              </form>

            </td>

        </tr>
     
             

        </tr>
        <tr>
            <td colspan="3" style="padding:5px; background-color:#acb3b9; text-align:center;">
                <p>copyright &copy; <?php echo date("Y"); ?> keltron knowledge center</p>
            </td>
        </tr>
    </table>
</body>
</html>