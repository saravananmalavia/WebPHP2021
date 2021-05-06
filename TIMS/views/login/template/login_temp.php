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
    <title>Login</title>
    <link rel="stylesheet"
          href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
</head>
<body>
    <div class="col-sm-3">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="" placeholder="Enter Username">
                <span class="ErrUser_name" style="color:red; font-size: 12px;"> 
                </span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="" placeholder="Enter Password">
                <span class="ErrPassword"> <?php //echo  ; ?> 
                </span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="ROOT_DIR./../../login/register.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>