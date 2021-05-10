<?php
session_start();
//require_once '../../course/Course.class.php';
//require_once '../../course/Course.Service.php';
    require_once '../../config/config.php';
    require_once( ROOT_DIR.'/../model/fees.class.php' );    
    require_once( ROOT_DIR.'/../service/FeesService.php' );

$fees_collection_id =$_GET['fees_collection_id'];

$feesService = new feesService();
$result = $feesService->deleteFees($fees_collection_id);

if($result > 0){
          $_SESSION["message"] = "Fees details deleted successfully !";
        }
        else{
          $_SESSION["message"] = "Server busy please try again later !";
          
        }

       header("Location: fees_view_all.php");


?>