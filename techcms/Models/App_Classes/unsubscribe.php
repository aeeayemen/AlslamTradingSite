<?php

 require_once 'App_constant.php';
$conect=mysqli_connect(PHPGRID_DBHOST, PHPGRID_DBUSER, PHPGRID_DBPASS,PHPGRID_DBNAME)or die("cannot connect"); 
 
   mysqli_set_charset($conect, "utf8");

 $key = "";
 if (isset($_GET['key'])) {
 	  $key=$_GET['key'];
 }
 
 
  $check ="DELETE FROM subscribusers WHERE hash='$key' ";
   $query=mysqli_query($conect,$check) or die (mysqli_error() );

if ($query) {
  echo "<h1>اصبحت غير مشترك!</h1>";
}else{
  mysqli_error();
}
   
 

 
 








?>