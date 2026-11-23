<?php
require_once '../Models/App_Parts/initial-page.php';
require_once 'Pages/Companyes-Managments.php'; 
require_once "../Models/App_Parts/Header.php" ; 
require_once "../Models/App_Parts/inerr-header.php"; 

 ?>

<style type="text/css">
    .tabbable-custom{
        overflow:unset; 
    }
    .nav-tabs li a{
        font-weight:bold;
        font-size:20px; 
    }
</style>
 
        
  
 
<?php
 
 

 
  $rowar = $app_func->select("SELECT * FROM companyes where lang_id=1  ")[0] ?? [];
  
  $logoar = techcms_clean_image_path($rowar["logo"] ?? "", "admin", "../../assets/images/no-image.png");
  $Image_bannerar = techcms_clean_image_path($rowar["Image_banner"] ?? "", "admin", "../../assets/images/no-image.png");
  $bannerar1 = techcms_clean_image_path($rowar["banner1"] ?? "", "admin", "../../assets/images/no-image.png");
  $bannerar2 = techcms_clean_image_path($rowar["banner2"] ?? "", "admin", "../../assets/images/no-image.png");
  $bannerar3 = techcms_clean_image_path($rowar["banner3"] ?? "", "admin", "../../assets/images/no-image.png");
  $bannerar4 = techcms_clean_image_path($rowar["banner4"] ?? "", "admin", "../../assets/images/no-image.png");

  $rowen = $app_func->select("SELECT * FROM companyes where lang_id=2  ")[0] ?? [];
 
  $logoen = techcms_clean_image_path($rowen["logo"] ?? "", "admin", "../../assets/images/no-image.png");
  $Image_banneren = techcms_clean_image_path($rowen["Image_banner"] ?? "", "admin", "../../assets/images/no-image.png");
  $banneren1 = techcms_clean_image_path($rowen["banner1"] ?? "", "admin", "../../assets/images/no-image.png");
  $banneren2 = techcms_clean_image_path($rowen["banner2"] ?? "", "admin", "../../assets/images/no-image.png");
  $banneren3 = techcms_clean_image_path($rowen["banner3"] ?? "", "admin", "../../assets/images/no-image.png");
  $banneren4 = techcms_clean_image_path($rowen["banner4"] ?? "", "admin", "../../assets/images/no-image.png");
 
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

        <div class="col-md-12">
          <div class="tabbable tabbable-custom  boxless tabbable-reversed">
            <ul class="nav nav-tabs nav-justified">
                <li class="active">
                <a href="#tab_0" data-toggle="tab">
                البيانات بالغة العربية </a>
              </li>  
             <li>
                <a href="#tab_1" data-toggle="tab">
                   Data English Language </a>
              </li> 
            </ul>

                     <div class="tab-content">
              <div class="tab-pane active" id="tab_0">
                                <?php  require_once 'Pages/Form-DetailCompanyar.php'; ?>

              </div>

              <div class="tab-pane" id="tab_1">
                                <?php  require_once 'Pages/Form-DetailCompanyen.php'; ?>
              </div>
              
               </div> 
          </div>
        
  </div>
       
              <div style="margin:10px;display: none;">
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


<script type="text/javascript">

$('.iframe-btn').fancybox({ 
    'width'     : 900,
    'height'    : 600,
    'type'      : 'iframe',
    'autoScale' : false
});

     // save form data to database using grid api 
    jQuery("#savedata").click(function()  
                            {  


                                var id = jQuery("#company_id").val();  
                                if(id)  
                                {  
                                    var grid = jQuery("#companyes"); 
                               
                                    grid.jqGrid('FormToGrid',id,"#formdetailcoarabic");  
                                     
                                    // call ajax to update date in db 
                                    var request = ''; 
                                    request = $('#formdetailcoarabic').serialize(); 
                                    request += '&oper=edit&id='+id; 
                                     
                                    jQuery.ajax({ 
                                        url: grid.jqGrid('getGridParam','url'), 
                                        dataType: 'html', 
                                        data: request, 
                                        type: 'POST', 
                                        error: function(res, status) { 
                                            jQuery.jgrid.info_dialog(jQuery.jgrid.errors.errcap,'<div class=\"ui-state-error\">'+ res.responseText +'</div>',  
                                                    jQuery.jgrid.edit.bClose,{buttonalign:'right'}); 
                                        }, 
                                        success: function( data ) { 
                                            // reload grid for data changes 
                                            grid.jqGrid().trigger('reloadGrid',[{jqgrid_page:1}]); 

                                             alert("تمت    العملية   بنجاح  ");
   
                                      

                                       
                                     

 
                                        } 
                                    }); 
                                     
                                     
                                }  
                            }); 
 
  jQuery("#savedataEn").click(function()  
                            {  


                                var id = jQuery("#company_id").val();  
                                if(id)  
                                {  
                                    var grid = jQuery("#companyes"); 
                               
                                    grid.jqGrid('FormToGrid',id,"#formdetailcoEnglish");  
                                     
                                    // call ajax to update date in db 
                                    var request = ''; 
                                    request = $('#formdetailcoEnglish').serialize(); 
                                    request += '&oper=edit&id='+id; 
                                     
                                    jQuery.ajax({ 
                                        url: grid.jqGrid('getGridParam','url'), 
                                        dataType: 'html', 
                                        data: request, 
                                        type: 'POST', 
                                        error: function(res, status) { 
                                            jQuery.jgrid.info_dialog(jQuery.jgrid.errors.errcap,'<div class=\"ui-state-error\">'+ res.responseText +'</div>',  
                                                    jQuery.jgrid.edit.bClose,{buttonalign:'right'}); 
                                        }, 
                                        success: function( data ) { 
                                            // reload grid for data changes 
                                            grid.jqGrid().trigger('reloadGrid',[{jqgrid_page:1}]); 

                                             alert("تمت    العملية   بنجاح  ");
   
                                      

                                       
                                     

 
                                        } 
                                    }); 
                                     
                                     
                                }  
                            }); 
 

 function fixPreviewUrl(link){
    if (!link) return '../../assets/images/no-image.png';
    link = $.trim(link).replace(/\\/g, '/');
    var m = link.match(/(?:^|\/)uploads\/(.*)$/i);
    if (m) {
        return '../../uploads/' + m[1];
    }
    return link.indexOf('http') === 0 || link.indexOf('/') === 0 ? link : '../../' + link;
 }

 function check(){
    var link=$('#logoar').val();
    $('#imagelogoar').attr('src', fixPreviewUrl(link));
 }
 
 function checken(){
    var link=$('#logoen').val();
    $('#imagelogoen').attr('src', fixPreviewUrl(link));
 }

 function checkbannerar1(){
    var link=$('#bannerar1').val();
    $('#imagebannerar1').attr('src', fixPreviewUrl(link)); 
 }

 function checkbannerar2(){
    var link=$('#bannerar2').val();
    $('#imagebannerar2').attr('src', fixPreviewUrl(link)); 
 }
 function checkbannerar3(){
    var link=$('#bannerar3').val();
    $('#imagebannerar3').attr('src', fixPreviewUrl(link)); 
 }
 function checkbannerar4(){
    var link=$('#bannerar4').val();
    $('#iframePdfAgents').attr('src', fixPreviewUrl(link)); 
 }

 function checkbanneren1(){
    var link=$('#banneren1').val();
    $('#imagebanneren1').attr('src', fixPreviewUrl(link)); 
 }

 function checkbanneren2(){
    var link=$('#banneren2').val();
    $('#imagebanneren2').attr('src', fixPreviewUrl(link)); 
 }
 function checkbanneren3(){
    var link=$('#banneren3').val();
    $('#imagebanneren3').attr('src', fixPreviewUrl(link)); 
 }
 function checkbanneren4(){
    var link=$('#banneren4').val();
    $('#imagebanneren4').attr('src', fixPreviewUrl(link)); 
 }
 
 function isNumberKey(evt){
         var charCode = (evt.which) ? evt.which : event.keyCode;
         if (charCode > 31 && (charCode < 48 || charCode > 57)){
            return false;
            }
         return true;
      }

 

</script>

 
      
</body> 
</html>