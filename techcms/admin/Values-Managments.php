<?php
require_once '../Models/App_Parts/initial-page.php';
require_once 'Pages/Values-Managments.php'; 
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
            <a class="" href="index.php"><?php echo $langs['Home_PGTITL'].":".$langs['Home_PGNAME'];?></a>
            <i class="fa fa-angle-left"></i>
                <strong><?php  echo $DetailPage['Page_name_ar'];  ?></strong>
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
               ?>
               <div class="alert alert-danger display-hide" style="display: block;">
                  <button class="close" data-close="alert"></button>
                  <span>
                 <?php  echo $erromsg; ?> </span>
                </div>
               <?php
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
  require_once "../Models/App_Parts/Footer.php" ; 
  require_once "../Models/App_Parts/Theme_Customizer.php" ; 
  
  require_once "../Models/App_Parts/script.php" ; 
 ?>
 
<script>
    jQuery(document).ready(function() {    
       Metronic.init(); // init metronic core componets
       Layout.init(); // init layout
       QuickSidebar.init(); // init quick sidebar
       Demo.init(); // init demo features 
    });
  </script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
