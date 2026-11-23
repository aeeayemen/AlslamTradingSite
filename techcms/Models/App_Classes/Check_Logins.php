<?php
/**
 * ملف مختصر لاستدعاء كلاس فحص حالة تسجيل الدخول  
 */
include("Login.php");
if($Applogins_cls->logged_in){

}else{
      header("Location:../../Login.php");
    //print ("<meta http-equiv='refresh'  content='.01; URL=../../Login.php'>");
     exit;
     die();
}
?>
