<?php
require_once '../Models/App_Parts/initial-page.php';
require_once 'Pages/Users-Groups-config.php'; 
require_once "../Models/App_Parts/Header.php" ; 
require_once "../Models/App_Parts/inerr-header.php"; 

 ?>
     
<div class="clearfix">
</div>
 
<div class="clearfix">
</div>
<div class="container">
 

<div class="page-container"> 
     <?php require_once("../Models/App_Parts/Sidebar.php");  ?> 
       <div class="page-content-wrapper">
              <div class="page-content"> 
                  <div class="page-content-body">

                  
<div class="page-bar">
<!-- BEGIN PAGE Title-->
  <ul class="page-breadcrumb">
    <li>
      <i class="fa fa-home"></i>
      <a class="ajaxify" href="Home.php"><?php echo $langs['Home_PGTITL'].":".$langs['Home_PGNAME'];?></a>
      <i class="fa fa-angle-left"></i>
               <strong>إدارة مجموعات المستخدمين </strong>
    </li>
    <li>
      <a href="#"></a>
    </li>
  </ul>
 
</div>
                  
      <div class="row">
       
              <div style="margin:10px">
              <?php

             
              if($Access_role)
              {
                   echo $out;
               }else{
                  $erromsg=$langs['NOT_PAUTHRIZED_MSG'];
                  $btntxt=$langs['NOT_PAUTHRIZED_BTNTXT'];
                 echo '<br><br><br><br><br><br><br><br><div class="alert alert-danger display-show" style="text-align: center; color:#F71616;font-size:16px;" id="erroxsmsg"><strong> '.$erromsg.'<br></strong><br/><a class="ajaxify" href="Home.php"><strong>'.$btntxt.'</strong></a></strong> </div>';
               }
                 
               ?>

              </div>
 

 
 
      </div> 

                     
                  </div>
    
    
         </div>
    
     </div>
  
</div>
 
 
</div>
  
<?php

require_once "../Models/App_Parts/Footer.php";   
require_once '../Models/App_Parts/script.php';
?>


 
      
</body> 
</html>