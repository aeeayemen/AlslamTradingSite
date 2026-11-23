<?php
require_once '../Models/App_Parts/initial-page.php';
require_once "../Models/App_Parts/Header.php" ; 
require_once "../Models/App_Parts/inerr-header.php"; 

 ?>
    
 
<div class="clearfix">
</div>
 
<div class="clearfix">
</div>
<div class="container">
 

<div class="page-container"> 
     <?php require_once  "../Models/App_Parts/Sidebar.php";  ?> 
       <div class="page-content-wrapper">
              <div class="page-content"> 
                  <div class="page-content-body">

              <div class="page-bar"> 
                <ul class="page-breadcrumb">
                  <li>
                    <i class="fa fa-home"></i>
                  <a class="" href="index.php"><?php echo $langs["Home_PGTITL"];?></a>
                    <i class="fa fa-angle-<?php if($_SESSION["lang"]=="ar"){echo "left";}else{echo "right";}?>"></i>
                  </li>
                  <li>
                  <a class="" href="index.php"><?php echo $langs["Home_PGNAME"];?></a>
                  </li>
                </ul>
                
              </div>
              
                       <?php require_once  "../Models/App_Parts/Home-Stats.php"; ?>

                     
                  </div>
    
    
         </div>
    
     </div>
  
</div>
 
 
</div>
  
<?php

require_once "../Models/App_Parts/Footer.php";   
require_once '../Models/App_Parts/script.php';
?>

<script type="text/javascript">

jQuery(document).ready(function() {
      
        $('#homePage').addClass('active');  
   
});


  
  
</script>
 
</body> 
</html>

