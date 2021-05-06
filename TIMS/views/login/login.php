<?php
session_start();
    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/User.class.php' );    
    require_once( ROOT_DIR.'/../service/LoginService.php' );


$message ="";
$errUserName = $errPassword ="";
$user_name = $password = "";

$error = false;

 if(isset($_SESSION["message"])){
        $message = $_SESSION["message"];
        unset($_SESSION["message"]);
 }



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
   $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    

 //name
    if(empty($user_name)){
      $errUserName = "* user name should not be empty";
        $error = true;
    }

 //password
    if(empty($password)){
      $errPassword = " Password should not be empty";
        $error = true;
    }

 
  if($error == true ){
    $message = "please enter the valid details";
  }
  else{
  
    $userObj = new User();

        $userObj->setUserName($user_name);
        $userObj->setPassword($password);
        

        $loginService = new LoginService();
        $result = $loginService->checkLogin($userObj);

         if($result != null){
            if ($result->num_rows > 0) {
                    if($row = $result->fetch_assoc()) {

                        echo  $row['user_id']. "<br>";
                        echo  $row['user_name']. "<br>";
                        echo  $row['password']. "<br>";
                        echo  $row['user_type']. "<br>";

                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['user_name'] = $row['user_name'];
                        $_SESSION['user_type'] = $row['user_type'];

                        header("Location: ../user_details/user_details_view_all.php");
                                        
                    }
                }
                else{
                    $message = "Wrong uer name or password";
                }
            }
            else{
                   $message = "Server busy, try again later";
            }




        if($result > 0){
          $_SESSION["message"] = "User details added successfully !";
        }
        else{
          $_SESSION["message"] = "Server busy please try again later !";
        }

      
  }

}
?>
<?php

    // if(isset($_SESSION["message"])){
    //     $message = $_SESSION["message"];
    //     unset($_SESSION["message"]);
    // }
    // else{
    //     $message="";    
    // }
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
                   <?php require_once( ROOT_DIR.'/../views/includes/welcome.php' ); ?>
                </ul>
            </td>

            <td style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
                <h2>Login</h2>
                
                <p style="color:red;" > <?php echo $message; ?></p>
                <table class="table">
                  <thead>
                   
                  </thead>
                  <body>
                    <div class="col-sm-3">
                    <p>Please fill in your credentials to login.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="user_name" class="form-control" value='<?php echo $user_name;?>'>
                            <span class="ErrUser_name" style="color:red; font-size: 12px;"> 
                                <?php echo "$errUserName" ;?>
                            </span>
                        </div>    
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                             <span class="ErrPassword" style="color:red; font-size: 12px;"> 
                                <?php echo "$errPassword" ;?>
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Login">
                        </div>
                        <p>Don't have an account? <a href="ROOT_DIR./../../login/register.php">Sign up now</a>.</p>
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