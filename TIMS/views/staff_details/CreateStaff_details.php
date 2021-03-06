<?php
session_start();
    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/staffClass.php' );    
    require_once( ROOT_DIR.'/../service/staffService.php' );
    include('../includes/header_sub.php');
?>

<?php
$message ="";
$errStaffName = $errAddress = $errgender = $erremailid = $errmobileno = $errEducation = $errSubject = "";
$staff_name = $address = $gender = $email= $mobile=$education = $subject = $result =  "";

$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
$staff_name = $_POST['staff_name'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$education = $_POST['education'];
$subject = $_POST['subject'];

echo "$mobile";


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
  if(!isset($mobile)){
  $errmobileno = " Mobile No should not be empty";
  $error = true;
}else{
  if (filter_var($mobile, FILTER_VALIDATE_INT)) {
    // if (strlen($mobile) !=10 ){
    //   $errmobileno = "Mobile No must be Ten Digit long";
    //   $error = true;
    // }
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
  echo "no errors <br>";

    echo $staff_name;

    $staffObj = new Staff();

    //$studentObj->setRollNo($roll_no);
    $staffObj->setStaffName($staff_name);
    $staffObj->setAddress($address);
    $staffObj->setGender($gender);
    $staffObj->setEmail($email);
    $staffObj->setMobile($mobile);
    $staffObj->setEducation($education);
    $staffObj->setSubject($subject);


    $createservice = new StaffService();
    $result = $createservice->addStaff($staffObj);

    if($result > 0){
        $_SESSION["message"] = "Staff details added successfully !";
      }
      else{
        $_SESSION["message"] = "Server busy please try again later !";
      }

     header("Location: staff_View_All.php");

    }
}
?>


            <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
                <h2>New Staff Creation </h2>
                <p style="color:red;" > <?php echo $message; ?></p>
            <form class="form-horizontal" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' >
                <div class="form-group">
                  <label class="control-label col-sm-2" for="staff_name">Staff Name:</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="staff_name" placeholder="Enter staff name " name="staff_name"
                    value='<?php echo "$staff_name" ;?>'
                    >
                    <span id="staff_name" style="color:red; font-size: 8px;
                    "><?php echo "$errStaffName" ;?></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="address">Address:</label>
                  <div class="col-sm-4">          
                    <input type="text" class="form-control" id="address" placeholder="Enter address" name="address"
                    value='<?php echo "$address" ;?>'
                    >
                    <span id="address" style="color:red; font-size: 8px;
                    "><?php echo "$errAddress" ;?></span>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="control-label col-sm-2" for="gender">Gender:</label>
                  <div class="col-sm-4">
                        
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
                  <div class="col-sm-4">          
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value='<?php echo "$email" ;?>'>
                    <span id="email" style="color:red; font-size: 8px;"><?php echo "$erremailid" ;?>
                      </span>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="mobile">Mobile:</label>
                  <div class="col-sm-4">          
                    <input type="number" class="form-control" id="mobile" placeholder="Enter mobile" name="mobile" value='<?php echo "$mobile" ;?>'>
                    <span id="mobile" style="color:red; font-size: 8px;
                                                 "><?php echo "$errmobileno" ;?></span>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="education">Education:</label>
                  <div class="col-sm-4">          
              <select  class="form-control" id="education" name="education">
                <option value="" selected>Select one...</option>
                                <option value="UG">UG</option>
                                <option value="PG">PG</option>
                                <option value="PhD">PhD</option>
                                <option  selected hidden style="display:none;"> <?php echo "$education"; ?> </option>
              </select>

                    <span id="education" style="color:red; font-size: 8px;
                                                 "><?php echo "$errEducation" ;?></span>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="subject">Subject:</label>
                  <div class="col-sm-4">          
              <select  class="form-control" id="subject" name="subject">
                <option value="" selected>Select one...</option>
                                <option value="PHP">PHP</option>
                                <option value="PYTHON">PYTHON</option>
                                <option value="JAVA">JAVA</option>
                                <option  selected hidden style="display:none;"> <?php echo "$subject"; ?> </option>
              </select>

                    <span id="subject" style="color:red; font-size: 8px;
                                                 "><?php echo "$errSubject" ;?></span>
                  </div>
                </div>
                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-4">
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