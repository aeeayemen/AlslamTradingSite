<?php

/**
 * كود تسجيل الخروج  
 */
 include("App/App_constant.php"); 
include("Models/App_Classes/Logins.php");
if($Applogins_cls->logged_in){
$Applogins_cls->logout();
$_SESSION['lasturl']=$_SESSION['url']=APP_PATH."index.php";
    header("Location:../index.php");
      exit;
}else{
$_SESSION['lasturl']=$_SESSION['url']=APP_PATH."index.php";
    header("Location:Logins.php");
      exit;
    
    }
       
?>