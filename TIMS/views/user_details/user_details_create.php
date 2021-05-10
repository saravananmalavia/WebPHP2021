<?php 
session_start();

    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/User.class.php' );    
    require_once( ROOT_DIR.'/../service/userService.php' );
    include('../includes/header_sub.php');
    //require_once 'User.class.php';
    //require_once 'UserService.php';
?>

<?php
$message ="";
$errUserName = $errPassword = $errUserType = "";
$user_name = $password = $user_type = "";

$error = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];
    

 //name
    if(empty($user_name)){
      $errUserName = "* Name should not be empty";
        $error = true;
    }

 //password
    if(empty($password)){
      $errPassword = "* Password should contain minimum 8 characters";
        $error = true;
    }

 //user_type
    if(empty($user_type)){
      $errUserType = "* Please select";
      $error = true;
  }

  if($error == true ){
    $message = "please fix the errors";
  }
  else{
    echo $user_name;


    $userObj = new User();

        $userObj->setUserName($user_name);
        $userObj->setPassword($password);
        $userObj->setUserType($user_type);
        

        $userService = new UserService();
        $result = $userService->addUser($userObj);


        if($result > 0){
          $_SESSION["message"] = "User details added successfully !";
        }
        else{
          $_SESSION["message"] = "Server busy please try again later !";
        }

        header("Location: user_details_view_all.php");
  }

}
?>




               
      
      <td  style="padding:20px; background-color:#f2f2f2; vertical-align:top;">
        <h2>New User Creation</h2>
        <p  style="color:red;" > <?php echo $message; ?></p>

        <form  class="form-horizontal" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>


          <!--NAME-->
                    
          <div  class="form-group">
            <label  class="control-label col-sm-2" for="user_name">User Name:</label>
            <div  class="col-sm-8">

              <input  type="text" 
                      class="form-control" 
                      id="user_name" 
                      placeholder="Enter user name" 
                      name="user_name"
                      value='<?php echo "$user_name" ;?>'>

                            <span  id="e2" ><br/><?php echo "$errUserName" ;?></span>
            </div>
          </div>


          <!--PASSWORD-->

          <div  class="form-group">
            <label  class="control-label col-sm-2" for="password">Password:</label>
            <div  class="col-sm-8">
              
              <input  type="password" 
                      class="form-control" 
                      id="password" 
                      placeholder="Enter your password" 
                      name="password"
                      minlength="8" required
                      value='<?php echo "$password" ;?>'>

                            <span  id="e2" ><br/><?php echo "$errPassword" ;?></span>
            </div>
          </div>


              <!--USER_TYPE-->  

          <div  class = "form-group">
               <label  class="control-label col-sm-2" for="user_type">User Type:</label>
            <div  class="col-sm-8">
               <label>  <input type = "radio" name = "user_type" <?php if (isset($user_type) && $user_type=="student")echo "checked";?> value = "student"> Student </label>        
               <label>  <input type = "radio" name = "user_type" <?php if (isset($user_type) && $user_type=="staff")echo "checked";?> value = "staff"> Staff </label>
               <label>  <input type = "radio" name = "user_type" <?php if (isset($user_type) && $user_type=="admin")echo "checked";?> value = "admin"> Admin </label>

                          <span  id="e2" ><br/><?php echo "$errUserType" ;?></span>
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