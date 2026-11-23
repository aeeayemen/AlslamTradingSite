<?php 
 

$grid = new jqgrid($db_conf);

 
$opt["caption"] = "ادارة المشتركين";
$opt["resizable"] = true;
$opt["autowidth"] = true;
$opt["autoresize"] = true;
$opt["loadtext"] = $langs['GRID_LOADING_TXT'];
$datesxd=date("Y-d");
 
$opt["toolbar"] = "bottom";
$opt["sortorder"] = "ASC"; // ASC or DESC
$opt["rowList"] = array(30,50,100,200,250,'ALL');
$opt["rowNum"] = 20;
$opt["view_options"]["width"] = "900";  // show form navigation
$opt["add_options"]["width"] = "900";  // show form navigation
$opt["edit_options"]["width"] = "900";  // show form navigation
$opt["multiselect"] = false; // allow you to multi-select through checkboxes 
$opt["width"] = "900";
$opt["reloadedit"] = true;  
$opt["direction"] = "$lngdir";
$datesxd=date("Y-d");
$opt["form"]["position"] = "center";
//$opt["add_options"]["jqModal"] = true;
//$opt["edit_options"]["jqModal"] = true;
$opt["add_options"]["success_msg"] = "تم اضافة البيانات بنجاح";
$opt["edit_options"]["success_msg"] = "تم تعديل البيانات بنجاح";
$opt["delete_options"]["success_msg"] = "تم حذف البيانات بنجاح"; 
$grid->set_options($opt);

 

   
$col = array();
$col["title"] = "الرقم"; // caption of column
$col["name"] = "id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = false;
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["editoptions"] = array("readonly"=>"readonly");  
$col["width"] = "40";
$col["show"]["edit"] = false;
$col["show"] = array("list"=>true,"edit"=>false,"add"=>false); // only show in listing
$cols[] = $col;
 
 


 



$col = array();
$col["title"] = "بريد المشترك الاكتروني"; // caption of column
$col["name"] = "email"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "110";
$col["align"] = "center";
$col["editable"] = true; 
$col["required"] = true;
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true);
$cols[] = $col;




 

$col = array();
$col["title"] = "المعرف"; // caption of column
$col["name"] = "hash"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["sortable"] = false; // this column is not sortable 
$col["search"] = false; // this column is not searchable 
$col["editable"] = true; 
$col["edittype"] = "text"; // render as textarea on edit 
//$col["editoptions"] = array("rows"=>30, "cols"=>50); // with these attributes  
// connect tinymce  
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); 
$cols[] = $col; 


$col = array();
$col["title"] = "تاريخ الاشتراك"; // caption of column
$col["name"] = "subscribDate"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["sortable"] = false; // this column is not sortable 
$col["search"] = false; // this column is not searchable 
$col["editable"] = true; 
$col["edittype"] = "text"; // render as textarea on edit 
//$col["editoptions"] = array("rows"=>30, "cols"=>50); // with these attributes  
// connect tinymce  
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true); 
$cols[] = $col; 

 


$col = array();
$col["title"] = "حالة التفعيل"; // caption of column
$col["name"] = "Is_Actieved"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["width"] = "60";
$col["edittype"] = "select";
$col["stype"] = "select";  
$ty1="نعم";
$ty2="لا";
$col["editoptions"] = array("value"=>"Yes:نعم;No:لا");
$col["searchoptions"]["skipEmpty"]=true ;
$col["editoptions"]["skipEmpty"]=true ;  
$col["searchoptions"] =  array("value"=>"Yes:نعم;No:لا");
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["viewable"] = false;
$col["required"] = true;
//$col["hidedlg"] = true;
$col["show"] = array("list"=>true,"true"=>true,"add"=>true); // only show in listing
$cols[] = $col;

 
 
   
 
      

// enable inline editing buttons
      

$grid->set_actions(array(
    "add"=>$Add_role, // allow/disallow add
  "edit"=>$Edit_role, // allow/disallow edit
    "delete"=>$Delet_role, // allow/disallow delete
    "rowactions"=>false, // show/hide row wise edit/del/save option
    "search" => "advance", // show single/multi field search condition (e.g. simple or advance)
         "inlineadd" => false,
          "autofilter" => true,
         "showhidecolumns" => $Showhidecolumns,  
          "view"=>false,
           //"export_excel"=>$Export_role, // export excel button 
                        "export_pdf"=>$Export_role, // export pdf button 
                        //"export_csv"=>$Export_role, // export csv button 
          // "export"=>$Export_role        
)
);

// params are array(<function-name>,<class-object> or <null-if-global-func>,<continue-default-operation>)
// if you pass last argument as true, functions will act as a data filter, and insert/update will be performed by grid 
$e["on_data_display"] = array("filter_display", null, true); 
$e["on_insert"] = array("add_data", null, false);
$e["on_update"] = array("update_data", null, false);
$e["on_delete"] = array("delete_data", null, false);

$grid->set_events($e);

 
function add_data($data)
{
      global $Applogins_cls,$app_func;

    $userid=$Applogins_cls->useridx;  
  
  $id=$app_func->GetOrderTable('id','subscribusers');
$Is_Actieved=$data["params"]["Is_Actieved"]; 

$email=str_replace("'","",$data["params"]["email"]);
$hash=str_replace("'","",$data["params"]["hash"]);
$subscribDate=$data["params"]["subscribDate"]; 


$User_names=$_SESSION['AppLoginName'];
$mss=date('Y-m-d');
$creating_date=$mss; 
       

    $result=0;
  
$newquerys="insert into subscribusers (`id`,`email`,`hash`, `Is_Actieved`,`subscribDate`) values 
('$id','$email','$hash','$Is_Actieved','$mss')";
       $result = $app_func->query($newquerys);
   
 
 
if (!$result) {
    $errs=$app_func->error();
   $k1="Title_UK";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
phpgrid_error(" عفواً يوجد عميل مضاف بنفس الاسم مسبقاً قم بتغيير الاسم");
   }
   
       $errs=$app_func->error();
   $k1="keyword_UK";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
phpgrid_error("هذا الايميل مقترن بعميل اخر لايًسمح بالتكرار ادخل ايميل جديد");
   }
   $errs=$app_func->error();
   $k1="published_state_UK";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
phpgrid_error("رقم الجوال موجود مسبقاً لايمسح بالتكرار ادخل رقم جديد");
   }
   
  
   $errs=$app_func->error();

   $msg="خطاء غير متوقع: " .$errs;
     phpgrid_error($msg);   
    
}


}

//---------------------Edit funcation start here----------------

function update_data($data)
{
    global $Applogins_cls,$app_func;
    $userid=$Applogins_cls->useridx;  
    $User_names=$_SESSION['AppLoginName'];
   $mss=date('Y-m-d');

     
  
        $empno= $data["id"];
      
     
  $s = array();
  foreach($data["params"] as $k=>$v)
  {
    
     
   
       
       $s[] = "$k = '$v'";   
    
        
  }
  $s = implode(",",$s);
  $s=$s." ".$set; 
   
  $w = "id=$empno";
$result = $app_func->query("UPDATE subscribusers set  $s WHERE $w");
// phpgrid_error($result); 
if (!$result) { 
   $errs=$app_func->error(); 
   $msg="خطاء غير متوقع: " .$errs;
     phpgrid_error($msg);   
    
}
}

//---------------------filter_display funcation start here----------------
function filter_display($data) 
{ 
    
    foreach($data["params"] as &$d) 
    { 
         $id= $d["id"];
        
           
         $isactivs= $d["Is_Actieved"];
        if ($isactivs=="Yes")
        {
           $d["Is_Actieved"] ='فعال';
           
        }else{
            $d["Is_Actieved"] ='غير فعال';
        }
         
 
            
        
        
        
    } 
} 


//---------------------delete_data funcation start here----------------

function delete_data($data)
{ 

     global $Applogins_cls,$app_func;
      $empno= $data["id"];

  $res=0;
   
  $w = "id=$empno ";
  $res=$app_func->query("DELETE from subscribusers WHERE $w");
 
  
    if (!$res) {
  $errs=$app_func->error();
    if ($errnos==1451){
    $msg="لايمكن حذف هذا السجل نظراً لوجود بيانات مرتبه به في جداول اخرى";
     phpgrid_error($msg); 
   }else{
    $msg="حدث خطاء غير متوقع رقم الخطاء:".$errnos."  msg".$errs;
   }
   
        }

          

}

function check_error($err,$searchfor)
{
    $mystring = $err;
$findme   = $searchfor;
$pos = strpos($mystring, $findme);
if ($pos !== false) {
return true;
}else{
   return false; 
}

    
}

//$grid->select_command = "SELECT concat(font_icon_id,'-',ZoneID) as pk,font_icon_id,ZoneID,ZoneName_ar,Zone_start_font_icon,Zone_start_password,quility,zonecode,ZoneName_en, Description,creating_date,Modify_date,type,Show_on_Map,User_name FROM  zones ";
 
 $grid->table = "subscribusers";
$grid->set_columns($cols);
$out = $grid->render("subscribusers");
?>
 