<?php 
  //session_start();
  require_once '../../config/config.php';
  require_once( ROOT_DIR.'/../db/DBConnection.class.php' );  
  require_once( ROOT_DIR.'/../model/User.class.php' );
  //require_once 'User.class.php';
  //require_once 'DBConnection.class.php';

class LoginService{


    public function checkLogin(User $user){

        try{

        $sql  =  "SELECT * FROM tbluser_details WHERE user_name = '$user->user_name' and password = '$user->password'   ";

        //echo $sql;
        $result = DBConnection::execQery($sql);
        return $result;

        }   
        catch(Exception $e)
        {
             echo "$e";
        }

    }
    public  function changePassword(User $user){
              try{

        $sql  =  "update tbluser_details set
                  password = '$user->password'
                  where user_name = '$user->user_name' ";

        //echo $sql;
        $result = DBConnection::execQery($sql);
        return $result;

        }   
        catch(Exception $e)
        {
             echo "$e";
        }

    }
   public  function logOut(){

     unset($_SESSION['message']);
     unset($_SESSION['user_id']);
     unset($_SESSION['user_name']);
     unset($_SESSION['user_type']);
      session_destroy();

                       
    }
 
}
?>