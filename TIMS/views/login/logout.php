<?php

require_once '../../config/config.php';
require_once( ROOT_DIR.'/../service/LoginService.php' );

   $loginService = new LoginService();
   $loginService->logOut();

    header("Location: login.php");

?>