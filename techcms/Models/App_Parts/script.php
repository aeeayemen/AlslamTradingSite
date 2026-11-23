
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE plugins -->
<!--[if lt IE 9]>
<script src="../plugins/assets/global/plugins/respond.min.js"></script>
<script src="../plugins/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script> 


<script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<!--  jQuery('#list1').trigger("reloadGrid",[{page:1}]);   -->
<script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
   <script type="text/javascript" src="../tinymce/tinymce.min.js"></script>
<script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<!-- END CORE plugins -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->


<!-- تم حذفه لوجود تعارض مع تقويم الجرد وتم حذفه من الجدول -->
 <!-- <script src="<?php //echo PLUGINS_DIR; ?>/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>  -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>


 
<!-- END PAGE LEVEL plugins -->

 
       <!--  <script type="text/javascript" src="../plugins/assets/global/plugins/amcharts/script-char.js"></script>  --> 
  
 


<script src="<?php echo PLUGINS_DIR; ?>/assets/admin/pages/scripts/todo.js" type="text/javascript"></script>
<script src="<?php echo PLUGINS_DIR; ?>/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo PLUGINS_DIR; ?>/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo PLUGINS_DIR; ?>/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo PLUGINS_DIR; ?>/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
  <script src="<?php echo PHPGRIDPATH; ?>lib/js/jqgrid/js/i18n/grid.locale-ar.js" type="text/javascript"></script>  
 <script src="<?php echo PHPGRIDPATH; ?>lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>  
  <script src="<?php echo PHPGRIDPATH; ?>lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
 <!--  <script type="text/javascript" src="<?php echo PHPGRIDPATH; ?>lib/js/jscolor.js"></script>  -->
  
    <script type="text/javascript" src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/fancybox/source/jquery.fancybox.js"></script> 
<!-- BEGIN PAGE LEVEL SCRIPTS -->
   <script src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/select2/js/select2.min.js"></script>       
    <script type="text/javascript" src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo PLUGINS_DIR; ?>/assets/global/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>  --> 
  
 <!--    <script src="lib/js/ckeditor/ckeditor.js" type="text/javascript"></script> -->
 <script src="<?php echo PLUGINS_DIR; ?>/assets/admin/pages/scripts/index.js" type="text/javascript"></script>   

 <input type="hidden" name=""  id="NamehtisPage" value="<?php echo $partPage;  ?>">
<!-- END PAGE LEVEL SCRIPTS -->
  
<script>
 /*mete avisos al log, en distro no debería*/ (function(factory) { if (typeof define === "function" && define.amd) { define(["jquery", "jquery-ui-custom"], factory); } else { factory(jQuery); } }(function( $ ){ $.timepicker.log=function(){return} }));

  //removejscssfile("../plugins/js/bookingsetting.js","js");
  
jQuery(document).ready(function() {
     Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   Demo.init(); // init demo features
  Todo.init(); // init todo page
     $('.fancybox').fancybox();  
   //Index.init();   
   //Index.initDashboardDaterange();
   //Index.initChat();
   //Index.initMiniCharts();
    // load the content for the dashboard page.
          

 
    

    var  NamehtisPage=$('#NamehtisPage').val();
     $('.page-sidebar-menu  li#'+NamehtisPage).addClass('active');
    
            $('.page-sidebar-menu  li#'+NamehtisPage).parents('li').each(function () {
                $(this).addClass('active');
                 $('.page-sidebar-menu > li.active > a > span').addClass('open');
                // $(this).children('a > span.arrow').addClass('open');
                
            });  

 
});

   function SearchSelect2(id) 
     { 
           


var el = $('select[id='+id+'].FormElement')[0];
    if (el)
    {
      // remove nbsp; from start of textarea
      if(el.previousSibling) el.parentNode.removeChild(el.previousSibling);
         jQuery(el).parent().css('height','auto !important');
     // jQuery(el).parent().css('padding-left','5px');
      //jQuery(el).parent().css('padding-bottom','5px');
    }

    $('select[name='+id+'].editable, select[id='+id+']').select2({width:'90%'});
    $(document).unbind('keypress').unbind('keydown');   


     } 
 
</script>


<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>