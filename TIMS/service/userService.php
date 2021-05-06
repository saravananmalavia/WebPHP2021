<?php 
  
  require_once '../../config/config.php';
  require_once( ROOT_DIR.'/../db/DBConnection.class.php' );  
  require_once( ROOT_DIR.'/../model/User.class.php' );
  //require_once 'User.class.php';
  //require_once 'DBConnection.class.php';

class UserService{
 // insert the user record
    function addUser(User $user){
        $user_name  = $user->getUserName();
        $password  = $user->getPassword();
        $user_type = $user->getUserType();


        $sql  =  "INSERT INTO tbluser_details(user_name,password,user_type) VALUES('$user_name','$password','$user_type')";
          echo "$sql";
         $output = DBConnection::execNonQery($sql);
          return $output;
    }

  // update the user
    function updateUser(User $user){

        $user_id = $user->getUserId();
        $user_name  = $user->getUserName();
        $password  = $user->getPassword();
        $user_type = $user->getUserType();
        

        $sql  =  "UPDATE tbluser_details SET 
                user_name = '$user_name', 
                password = '$password',
                user_type = '$user_type'                
                WHERE user_id = $user_id";

        echo "$sql";
        $output = DBConnection::execNonQery($sql);
        return $output;
    }


    // Delete the particular student
    function deleteUser($user_id){

        $sql  =  "DELETE FROM tbluser_details WHERE user_id = $user_id";

        return DBConnection::execNonQery($sql);
    }


    // get the particular student details
    function getUser($user_id){

        $sql  =  "SELECT * FROM tbluser_details WHERE user_id = $user_id";

        $result = DBConnection::execQery($sql);
        return $result;
    }


    // get all the students details
    function getUsers(){

        $sql  =  "SELECT * FROM tbluser_details ORDER BY user_id DESC";

        $result = DBConnection::execQery($sql);
        return $result;
    }

}
?>