<?php
session_start();
    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/User.class.php' );    
    require_once( ROOT_DIR.'/../service/LoginService.php' );

$message ="";
$errOldPassword = $errNewPassword = $errConfirmPassword = "";
$old_password = $new_password = $confirm_password = "";

$error = false;

 if(isset($_SESSION["message"])){
        $message = $_SESSION["message"];
        unset($_SESSION["message"]);
 }



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_SESSION['user_name'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    

 //old password
    if(empty($old_password)){
      $errOldPassword = "* Please enter correct password";
        $error = true;
    }

 //new password
    if(empty($new_password)){
      $errNewPassword = " New Password should not be empty";
        $error = true;
    }

//confirm password
    if(empty($confirm_password)){
      $errConfirmPassword = " Re enter the New Password";
        $error = true;
    }
    if ($new_password != $confirm_password) {
        $errConfirmPassword = "New Password and Confirm Password should match";
      $error = true;
    }
 
  if($error == true ){
    $message = "please enter the valid details";
  }
  else{
  
    $userObj = new User();

        $userObj->setUserName($user_name);
        $userObj->setPassword($old_password);
        

        $loginService = new LoginService();
        $result = $loginService->checkLogin($userObj);

         if($result != null){
            if ($result->num_rows > 0) {
                    if($row = $result->fetch_assoc()) {

                        // echo  $row['user_id']. "<br>";
                        // echo  $row['user_name']. "<br>";
                        // echo  $row['password']. "<br>";
                        // echo  $row['user_type']. "<br>";

                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['user_name'] = $row['user_name'];
                        $_SESSION['user_type'] = $row['user_type'];

                        $userObj2 = new User();
                        $userObj2->setUserName($user_name);
                        $userObj2->setPassword($new_password);
                        $loginService2 = new LoginService();
                        $result = $loginService->changePassword($userObj2);
                        if($result != null){
                           $_SESSION["message"] = "Password changed successfully";
                         }
                        header("Location: ../user_details/user_details_view_all.php");
                                        
                    }
                }
                else{
                    $message = "Wrong password";
                }
            }
            else{
                   $message = "Server busy, try again later";
            }
      
  }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>KKC-Course</title>
<link rel="stylesheet"
      href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<link rel="stylesheet"
     href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

</head>
<style>
        hh {
        font-size: 30px;
        }
</style>
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
                   <?php require_once( ROOT_DIR.'/../views/includes/menu.php' ); ?>
                </ul>
            </td>

            <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
                <h2>Change Password</h2>
                
                <p style="color:red;" > <?php echo $message; ?></p>
                <table class="table">
                  <thead>
                   
                  </thead>
                  <body>

                  <div class="col-sm-3">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <div class="form-group">
                          <label>Old Password</label>
                          <input type="password" name="old_password" class="form-control" value="" placeholder="Enter Old Password">
                          <span class="ErrOld_pass" style="color:red; font-size: 12px;">
                              <?php echo $errOldPassword; ?>                    
                          </span>
                      </div>    
                      <div class="form-group">
                          <label>New Password</label>
                          <input type="password" name="new_password" class="form-control" value="" placeholder="Enter New Password">
                          <span class="ErrNewPassword" style="color:red; font-size: 12px;">
                              <?php echo $errNewPassword; ?>
                          </span>
                      </div>
                      <div class="form-group">
                          <label>Confirm Password</label>
                          <input type="password" name="confirm_password" class="form-control" value="" placeholder="Confirm Password">
                          <span class="ErrConfirmPassword" style="color:red; font-size: 12px;">
                              <?php echo $errConfirmPassword; ?>
                          </span>
                      </div>
                      <div class="form-group">
                          <input type="submit" class="btn btn-primary" value="Submit">
                          <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                      </div>

                  </form>
              </div>
          
              </body>
          </table>


            </td>

        </tr>
     
             

        </tr>
        <table border="0" width="100%" >
        <tr>
            <td colspan="3" style="padding:1px; background-color:#acb3b9; text-align:center;">
                <p>copyright &copy; <?php echo date("Y"); ?> keltron knowledge center</p>
            </td>
        </tr>
    </table>
</body>
</html>