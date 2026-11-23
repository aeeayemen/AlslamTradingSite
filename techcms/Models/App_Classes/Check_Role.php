<?php
/**
 * كلاس فحص صلاحية المستخدم
 * يحتوي على دوال فرعيه 
 * كل داله واضحه من اسمها   
 */
include("App_constant.php");
include("DB.php");

class Check_Roles
{       
    
     var $userrols=array();      
   /**
    * Note: referrer should really only be considered the actual
    * page referrer in process.php, any other time it may be
    * inaccurate.
    */

   /* Class constructor */


   function startSession(){
      global $Adatabase;  //The database connection
      session_start();   //Tell PHP to start the session
      }
    
     
     /**
     * authenticity. Returns true if the user has logged in.
    */
 function check_user_roles($userid,$pagefilename){
      global $Adatabase;  //The database connection
      $rolearray=$Adatabase->Get_UserPage_Roles($userid,$pagefilename);
      }
};
$Check_Role_cls = new Check_Roles;
/* Initialize form object */
//echo $Applogins_cls->login("mmm","engassa");
$arry=$Check_Role_cls->check_user_roles(1,"Add_Department");
print_r($arry);
?>
