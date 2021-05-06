<?php
session_start();
    //require_once '../../config/config.php';
    //require_once( ROOT_DIR.'/../model/______Class.php' );    
    //require_once( ROOT_DIR.'/../service/______Service.php' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet"
          href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="col-sm-3">
        <h2>Change Password</h2>
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
</html>