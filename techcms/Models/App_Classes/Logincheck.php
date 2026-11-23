<?php
/**
 * ‗זÏ ÝÍÕ ÊÓÌםב ÇבÏÎזב 
 * םÚדב Úבל ÇÓÊÞÈÇב ÇבÈםÇהÇÊ 
 * דה ÝזÑד ÊÓÌםב ÇבÏÎזב 
 * םÞזד ÈÇבÊÍÞÞ דה ÈםÇהÇÊ ÇבÏÎזב 
 * זÊÓÌםב ÇבÏÎזב Çז ÇבÎÑזÌ ÍÓÈ ÇבÈםÇהÇÊ ÇבזÇÑÏו דה ÏÇבÉ ÇÓÊÏÚÇÁ וÐÇ ÇבדבÝ 
 * םÊד ÇÓÊÏÚÇÁו דה דבÝ ÊÓÌםב ÇבÏÎזב
 */
include("App_constant.php");
include("Logins.php");
require_once("App_Funcations.php");
$empno=$_REQUEST["EmployeeNos"];
$password=$_REQUEST["APasswords"];
$remeber=$_REQUEST['remeber'];
$Fun_cls2=new App_Funcation();
$app_fun=new App_Funcation();
$User_name=$empno;

if($Applogins_cls->logged_in){
$Applogins_cls->logout();
   $_SESSION["loginattemps"]=0;  
}else{
  
}
procLogin($User_name,$password);
 function procLogin($User,$password){
      global $Applogins_cls;
      if(!isset($_SESSION["loginattemps"]))
      {
      $_SESSION["loginattemps"]=0;  
      }else{
        $_SESSION["loginattemps"]+=1;
      }
      if($_SESSION["loginattemps"]>3)
      {
         $Applogins_cls->block_user($User);
          $_SESSION["loginattemps"]=0;  
         $resultadmin=array('status'=>5,'url'=>$Applogins_cls->referrer);

       	echo json_encode($resultadmin);
        
      }else{
        
        
    $app_fun=new App_Funcation();
      /* Login attempt */
      $logedcheck = $Applogins_cls->login($User, $password);
      $resultadmin=array();
      /* Login successful */
     if($logedcheck){
       $errsarry=$Applogins_cls->errorarray;
        $erno=$errsarry["errono"];
          $_SESSION["loginattemps"]=0;

          $rowComun=$app_fun->getDetailscampany(1,1);
          $Email =$rowComun['EmailNotifcation'];
          $subject =$Applogins_cls->Shown_Name;
          $message ='בÇÍÙהÇ ÊÓÌםב ÇבÏÎזב Åבל ÍÓÇÈ‗ דה ÌוÇÒ ÌÏםÏ. וב וÐÇ ÇהÊ¿';
          if ($Email!='') {
               $app_fun->SendEmailFront($Email,$subject,$message);
          }
        
        $resultadmin=array('status'=>$erno,'url'=>$Applogins_cls->referrer);
       	echo json_encode($resultadmin);
        
      }
      /* Login failed */
      else{
        $errsarry=$Applogins_cls->errorarray;
        $erno=$errsarry["errono"];
        $resultadmin=array('status'=>$erno,'url'=>$Applogins_cls->referrer);
       	echo json_encode($resultadmin);
        // header("Location: ".$adlogins->referrer);
      }
        }
   }
 //  if($Applogins_cls->logged_in){
   //$Applogins_cls->logout();
//echo "logedin";
//}else{
// echo "Not logedin";  
//}
//echo "$User_name";
//echo count($_SESSION['error_array']);
//print_r($Applogins_cls->errorarray);
//  //$resultadmin=array('issucessdb'=>'YES','campinsrtstatus' =>'<strong> Êד ÇÖÇÝÉ דÓÊÎÏד ÌÏםÏ ÈהÌÇÍ</strong>');
//    //   	echo json_encode($resultadmin);
//
?>



