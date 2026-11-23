<?php
require_once '../Models/App_Parts/initial-page.php';
require_once 'Pages/Privilegs_Managemts.php'; 
require_once "../Models/App_Parts/Header.php" ; 
require_once "../Models/App_Parts/inerr-header.php"; 

 ?>

<?php
    


  $sql="SELECT * FROM privilegs  ";
  $result=$app_func->query($sql);


  $sql1="SELECT * FROM app_pages  ";
  $result1=$app_func->query($sql1);
    
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
                 <strong>إدارة   صلاحية  الصفحات</strong>
    </li>
    <li>
      <a href="#"></a>
    </li>
  </ul>
 
</div>
                  
      <div class="row">


  <form id="privlige_form">
    <input type="hidden" name="checktype" value="ADDAccessPage">
       <div class="row">
            <div class="col-md-6">
                 
          <select class="form-control" name="Page_id" id="Page_id" style="width:50%; ">
                  <option> إختيار الملف أو الصفحة</option>

            <?php
            while($rows1=$result1->fetch_array()){
                    echo '<option value="'.$rows1['Page_id'].'"> '.$rows1['Page_name_ar']."-".$rows1['page_type'].'</option> ';
            } 
            ?>
          </select>
            </div>
             <div class="col-md-6">
                 
              <select class="form-control" name="activeate" style="width:50%; ">
                        <option> تفعيل ـ إلغاء التفعيل</option>

                         <option value="1">تفعيل  </option>
                         <option value="0">إلغاء التفعيل  </option>
              </select>
             </div>
       </div>
       <hr>
 <table id="sample_1" class="table table-condensed table-hover table-bordered table-striped bootgrid-table" width="30%" cellspacing="0">
      <thead>
          <tr>
              
               <th>إختيار الصلاحية</th>
               <th> اسم الصلاحية</th>                        
          </tr>
      </thead>
      
      <tbody>


<?php
while($rows=$result->fetch_array()){
?>

    <tr class="odd gradeX">
        <td>
            <input type="checkbox" class="emp_select" name="Privilege_id[]" value="<?php echo $rows["Privilege_id"]; ?>"   /> </td> 
 
      <td><?php echo $rows['Privilege_title_ar']; ?></td> 
</tr>
<?php
}
?>
 
</tbody>
</table>
 
  <div class="row">
<div class="col-md-2 ">
 
<input name="submit" type="submit" id="deactivate" class="btn btn-xs btn-block " value="ارسال" />  
 </div>

<div class="col-md-2 ">
  
<!--   <input name="activate" type="submit" class="btn btn-xs btn-block green" id="activate" value="ألغاء التفعيل" />  --> 
<span class="rows_selected" id="select_count">0 Selected</span>
 </div>
</div>  
</form>
       
              <div style="margin:10px">
              <?php

             
              if($Access_role)
              {
                   //echo $out;
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
  

  $('#Page_id').select2();
 function fill_form()
 {
    var selectedRow = jQuery('#pageprivilegs').jqGrid('getGridParam','selrow');  
     var rd = jQuery('#pageprivilegs').jqGrid('getCell', selectedRow, 'grup_id'); // where invdate is column name 
   var cityid = $('#Page_id option:selected').val();
   // alert("changed"+cityid);
      if (cityid==""){
       
      }else{
$("#Privilege_id").load("Pages/Check-Funcations.php?checkidx=pageprivlages&pageidx="+cityid);       
      }
    
 }   


// select all checkbox
$('#select_all').on('click', function(e) {
  

if($(this).is(':checked',true)) {

$(".emp_select").prop('checked', true);
}
else {
$(".emp_select").prop('checked',false);
}
// set all checked checkbox count
$("#select_count").html($("input.emp_select:checked").length+" Selected");
});
// set particular checked checkbox count
$(".emp_select").on('click', function(e) {
$("#select_count").html($("input.emp_select:checked").length+" Selected");
});

  $(document).ready(function(e){       
    
  $("#privlige_form").on('submit',(function(e) {
       
    e.preventDefault();
    $.ajax({
          url: "../Models/App_Classes/privlige_page.php",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
          cache: false,
      processData:false,
      success: function(data)
        {
 
            alert(data);
   
        },
        error: function() 
        {
        }           
     });
  }));

  });
   
</script>

      
</body> 
</html>