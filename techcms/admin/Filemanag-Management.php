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
<strong>ادارة الوسائط  </strong>
    </li>
    <li>
      <a href="#"></a>
    </li>
  </ul>
 
</div>
          <?php  if($Access_role)   {   ?>          
      <div class="row">
       
               
            




<div class="form-group field-posts-post_images iframe-btn">
 <label for="post_image" class="control-label">مسار الصورة</label>
 <input type="text" maxlength="255" name="post[]"  class="form-control" id="post_image" multiple="">
</div>

<!-- <iframe src="../plugins/tinymce/js/tinymce/plugins/filemanager/dialog.php?type=1&lang=eng&field_id=post_image" style="zoom:0.60" frameborder="0" height="900px" width="100%"></iframe> -->
<iframe src="<?PHP echo FILEMANAGERPATH;  ?>/dialog.php?type=0" style="zoom:0.60" frameborder="0" height="1000px" width="99.6%"></iframe>

               
 

 
 
      </div> 


            <?php   }else{
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
  
<?php

require_once "../Models/App_Parts/Footer.php";   
require_once '../Models/App_Parts/script.php';
?>


 
      
</body> 
</html>
  