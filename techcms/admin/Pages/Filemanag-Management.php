 

<html>
<head>
<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<?php
	if($lngdir=="ltr")
    {
	   
	}else{
	   ?>
              
       <style> 
      /* RTL CSS customizations, change 'cityadd' in css selector with your grid-id */ 
.modal{
    z-index: 1025551314 !important;
    overflow: visible !important;
}
.ui-jqdialog{
    
       z-index:  33330 !important;
    
}
     
    .ui-jqgrid .ui-jqgrid-title { 
        margin: 0.1em 0.2em; 
    } 
    .ui-jqgrid .ui-jqgrid-htable th div { 
        text-align: center; 
        padding-right: 2px; 
    } 
      
    #years_pager_left { 
        float: right; 
        width: 33%; 
    } 
    #years_pager_center { 
        float: right; 
        white-space: pre; 
        width: 33%; 
    } 
    #years_pager_right { 
        float: left; 
        padding-left: 7px; 
    }     
    .ui-jqgrid .ui-pg-table { 
        float: right; 
    } 
    .ui-custom-icon { 
        float: right; 
    }


    </style> 
    
    <?php
       
	}
    
?>

</head>
 <body>


                            
<div class="page-bar">
<!-- BEGIN PAGE Title-->
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a class="ajaxify" href="Home.php"><?php echo $langs['Home_PGTITL'].":".$langs['Home_PGNAME'];?></a>
			<i class="fa fa-angle-left"></i>
<strong>ادارة الملفات</strong>
		</li>
		<li>
			<a href="#"></a>
		</li>
	</ul>
    <!-- End PAGE Title-->
    
    <!-- BEGIN PAGE Toolbar-->
<div class="page-toolbar">
		<div class="btn-group pull-right">
			<button type="button" class="btn btn-fit-height red-soft dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
		<?php echo $langs['SHURT_LNKTITL'];?> <i class="fa fa-angle-down"></i>
			</button>
			<ul class="dropdown-menu pull-right" role="menu">
             <!--	<li>
						<a class="ajaxify" href="#"> قائمة   المواقع</a>
				</li>-->
			</ul>
		</div>
	</div>
     <!-- END PAGE Toolbar-->
</div>

      <div class="row">
      
<div class="form-group field-posts-post_images iframe-btn">
 <label for="post_image" class="control-label">مسار الصورة</label>
 <input type="text" maxlength="255" name="post[]"  class="form-control" id="post_image" multiple="">
</div>

<!-- <iframe src="../plugins/tinymce/js/tinymce/plugins/filemanager/dialog.php?type=1&lang=eng&field_id=post_image" style="zoom:0.60" frameborder="0" height="900px" width="100%"></iframe> -->
<iframe src="../filemanager/dialog.php?type=0" style="zoom:0.60" frameborder="0" height="700px" width="99.6%"></iframe>
 
  
 
<div style="margin:10px">
<?php
if($Access_role)
{ 
 }else{
    $erromsg=$langs['NOT_PAUTHRIZED_MSG'];
    $btntxt=$langs['NOT_PAUTHRIZED_BTNTXT'];
    echo '<br><br><br><br><br><br><br><br><div class="alert alert-danger display-show" style="text-align: center; color:#F71616;font-size:16px;" id="erroxsmsg"><strong> '.$erromsg.'<br></strong><br/><a class="ajaxify" href="Home.php"><strong>'.$btntxt.'</strong></a></strong> </div>';
 }
   
 ?>

</div>
 
 
 
      </div><!--/row-->
 
<!-- <textarea id="tinymce" class="tinymce" name="tinymce" rows="60" cols="80">
</textarea> -->
 
  </body>
</html>
 

 
 
  