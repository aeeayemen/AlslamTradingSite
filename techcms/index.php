<?php

 
/**
  * كود فحص فيما اذا كان المستخدم مسجل للدخول ام لا 
  */ 
require_once "App/App_constant.php";
require_once  "Models/App_Classes/Logins.php" ;

if($Applogins_cls->logged_in){



  $userid=$Applogins_cls->user_group_id;
  $group_key=$Adatabase->GetGroupUserType($userid);
  header("Location:admin/index.php");

  

}else{
    $_SESSION['lasturl']=$_SESSION['url']=APP_PATH."index.php";
    header("Location:Logins.php");
      exit;
     die();  
    
    }
       
 





 ?>

 
 

       

