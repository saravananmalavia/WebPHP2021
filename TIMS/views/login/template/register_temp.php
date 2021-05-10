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
    
</head>
<body>
    <div class="col-sm-3">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="" class="form-control" value="" placeholder="Enter Username">
                <span class="ErrNew_User_name">
                    <?php echo $new_user_name; ?>                    
                </span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="" placeholder="Enter Password">
                <span class="ErrSignup_Password">
                    <?php echo $signup_password; ?>
                </span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="" placeholder="Confirm Password">
                <span class="Errconfirm_signup_Password">
                    <?php echo $confirm_signup_password ; ?>
                </span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="ROOT_DIR./../../login/login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>