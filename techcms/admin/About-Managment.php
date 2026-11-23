<?php
require_once '../Models/App_Parts/initial-page.php';
require_once 'Pages/About-Managment.php'; 
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


<script>



    var opts = {
        'loadComplete': function () {
            $('body').on('keydown', 'input, select, textarea', function(e) {
                var self = $(this)
                  , form = self.parents('form:eq(0)')
                  , focusable
                  , next
                  ;
                if (e.keyCode == 13) {
                    focusable = form.find('input,a,select,button,textarea').filter(':visible');
                    next = focusable.eq(focusable.index(this)+1);
                    if (next.length) {
                        next.focus();
                    } else {
                        form.submit();
                    }
                    return false;
                }
            });
        }
    };

    

$('.iframe-btn').fancybox({ 
    'width'     : 900,
    'height'    : 600,
    'type'      : 'iframe',
    'autoScale' : false
});

    function edit_as_custom(o)
    {
        setTimeout(function(){
            jQuery(o).parent().append('<a  class="btn iframe-btn" type="button" href="<?PHP echo FILEMANAGERPATH;  ?>/dialog.php?type=1&editor=mce_0&field_id=Image&multiple=0">اختيار صورة</a>');
            jQuery(o).css('display','none');

            // here you can also read #closed value (if set) and set in checkboxes using jquery for edit mode

        },100);
    }

    function edit_as_custom_banar(o)
    {
        setTimeout(function(){
            jQuery(o).parent().append('<a  class="btn iframe-btn" type="button" href="<?PHP echo FILEMANAGERPATH;  ?>/dialog.php?type=1&editor=mce_0&field_id=Image&multiple=0">اختيار صورة</a>');
            jQuery(o).css('display','none');

            // here you can also read #closed value (if set) and set in checkboxes using jquery for edit mode

        },100);
    }
     function edit_as_customPdf(o)
    {
        setTimeout(function(){
            jQuery(o).parent().append('<a  class="btn iframe-btn" type="button" href="<?PHP echo FILEMANAGERPATH;  ?>/dialog.php?type=2&editor=mce_0&field_id=PdfFile&multiple=0">اختيار  ملف     </a>');
            jQuery(o).css('display','none');

            // here you can also read #closed value (if set) and set in checkboxes using jquery for edit mode

        },100);
    }

    function edit_as_custom_vedio(o)
    {
        setTimeout(function(){
            jQuery(o).parent().append('<a  class="btn iframe-btn" type="button" href="<?PHP echo FILEMANAGERPATH;  ?>/dialog.php?type=3&editor=mce_0&field_id=links&multiple=0">اختيار  ملف الفيديو</a>');
            jQuery(o).css('display','none');

            // here you can also read #closed value (if set) and set in checkboxes using jquery for edit mode

        },100);
    }

 
</script>
 
      
</body> 
</html>