<?php
session_start();
    require_once '../../config/config.php';
    //require_once( ROOT_DIR.'/../model/______Class.php' );    
    //require_once( ROOT_DIR.'/../service/______Service.php' );
if(isset($_SESSION["message"])){
    $message = $_SESSION["message"];
    unset($_SESSION["message"]);
}
else{
    $message="";    
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
                   <?php require_once( ROOT_DIR.'/../views/includes/welcome.php' ); ?>
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
                  <p>Please enter old password as well as new password</p>
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <div class="form-group">
                          <label>Old Password</label>
                          <input type="password" name="" class="form-control" value="" placeholder="Enter Old Password">
                          <span class="ErrOld_pass">
                              <?php //echo ; ?>                    
                          </span>
                      </div>    
                      <div class="form-group">
                          <label>New Password</label>
                          <input type="password" name="new_password" class="form-control" value="" placeholder="Enter New Password">
                          <span class="ErrNewPassword">
                              <?php //echo ; ?>
                          </span>
                      </div>
                      <div class="form-group">
                          <label>Confirm Password</label>
                          <input type="password" name="confirm_password" class="form-control" value="" placeholder="Confirm Password">
                          <span class="ErrConfirmPassword">
                              <?php //echo ; ?>
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