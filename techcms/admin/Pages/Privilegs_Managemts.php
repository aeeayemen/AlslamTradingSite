<?php 

$grid = new jqgrid($db_conf);  
$opt["caption"] = "اعداد صلاحيات الصفحات";
$opt["toolbar"] = "bottom";
$opt["direction"] = "rtl";

$grid->set_options($opt);




$col = array(); 
$col["title"] = "PK"; 
$col["name"] = "pk"; 
$col["search"] = false;
$col["export"] = false; 
$col["hidden"] = true;
$col["isnull"] = true;
$col["hidedlg"] = true;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing  
$cols[] = $col;

 
  
$col = array(); 
$col["title"] = "اسم الصفحة"; 
$col["name"] = "Page_id";  
$col["editable"] = true; 
$col["width"] = "60";
$dropdown= $grid->get_dropdown_values("select distinct  app_pages.Page_id as k,  app_pages.Page_name_ar as v from  app_pages");  
$col["stype"] = "select";
$col["align"] = "center";  
$col["searchoptions"] = array("value" =>$dropdown); 
$col["edittype"] = "select";
$col["editoptions"] = array("value"=>$dropdown);          
$col["editrules"] = array("required"=>true);
$col["formatter"] = "select"; // display label, not value
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role; 
$col["show"]["edit"] = false;
$cols[] = $col;
   

$col = array(); 
$col["title"] = "اسم الصلاحية"; 
$col["name"] = "Privilege_id"; 
$col["editable"] = true; 
$col["width"] = "60";
$privilegs = $grid->get_dropdown_values("select distinct   privilegs.Privilege_id as k,   privilegs.Privilege_title_ar as v from  privilegs");  
$col["stype"] = "select";
$col["align"] = "center";  
$col["searchoptions"] = array("value" =>$privilegs); 
$col["edittype"] = "select"; 
$col["editoptions"] = array("value"=> $privilegs);          
$col["editrules"] = array("required"=>true);
$col["formatter"] = "select"; // display label, not value
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role; 
$col["show"]["edit"] = false;
$cols[] = $col;
   
         

$col = array();
$col["title"] = "حالة التفعيل"; // caption of column
$col["name"] = "is_granted"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["width"] = "40";
$col["edittype"] = "checkbox"; // render as checkbox
$col["editoptions"] = array("value"=>"1:0"); // with these values "checked_value:unchecked_value"
$col["formatter"] = "checkbox";
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["viewable"] = false;
$col["required"] = true;
$col["hidedlg"] = true;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing
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
        
)
);

// params are array(<function-name>,<class-object> or <null-if-global-func>,<continue-default-operation>)
// if you pass last argument as true, functions will act as a data filter, and insert/update will be performed by grid 
$e["on_insert"] = array("add_data", null, false);
$e["on_update"] = array("update_data", null, false);
$e["on_delete"] = array("delete_data", null, false);
$grid->set_events($e);


function add_data($data)
{
    
//$idx=$data["params"]["id"];   
$citid=$data["params"]["Page_id"];
 $zoneid=$data["params"]["Privilege_id"];
  $cityids= 1;
  $result=mysql_query("SELECT MAX(id)+1 AS NB FROM  page_privilegs_config where Page_id=$citid");
 while ($row = mysql_fetch_assoc($result)) {
    if($row["NB"]>0)
    {
   $cityids= $row["NB"];     
    }else{
        $cityids= 1;
    }
    }
$is_granteds=$data["params"]["is_granted"];
$newquerys="insert into  page_privilegs_config (id,Page_id,Privilege_id,is_granted) values ('$cityids','$citid','$zoneid','$is_granteds')";

$result = mysql_query($newquerys);
if (!$result) {
    $errs=mysql_error();
   $k1="Page_privilegs_config_Privilegs_fk";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
phpgrid_error("تم ربط الصلاحية المحدده مسبقاً لايمسح بالتكرار");
   }
    $errs=mysql_error();
   $k1="Page_privilegs_config_App_Pages_fk";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
phpgrid_error("تم ربط الصلاحية المحدده مسبقاً لايمسح بالتكرار");
   }   
   $errs=mysql_error();

   $msg="Invalid query: " .$errs;
     phpgrid_error($msg);   
    
}



}
//---------------------Edit funcation start here----------------

function update_data($data)
{
    list($city,$zone) = explode("-",$data["pk"]);

  $s = array();
  foreach($data["params"] as $k=>$v)
  {
     if($k=="pk"){
         
     }else{
         
     
    $s[] = "$k = '$v'";
        }
  }
  $s = implode(",",$s);
  
  $w = "Page_id = $city and Privilege_id=$zone";
     
$result = mysql_query("UPDATE page_privilegs_config set  $s WHERE $w");
if (!$result) {
   $errs=mysql_error();
   $k1="Page_privilegs_config_Privilegs_fk";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
phpgrid_error("تم ربط الصلاحية المحدده مسبقاً لايمسح بالتكرار");
   }
   $errs=mysql_error();

   $msg="Invalid query: " .$errs;
     phpgrid_error($msg);   
    
} 
}

//---------------------filter_display funcation start here----------------


//---------------------delete_data funcation start here----------------

function delete_data($data)
{
    list($city,$zone) = explode("-",$data["pk"]);
  $w = "Page_id = $city and Privilege_id=$zone";
  $res=mysql_query("DELETE from page_privilegs_config WHERE $w");
    $errnos= mysql_errno();
    if (!$res) {
  $errs=mysql_error();
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

$grid->select_command = "SELECT id,concat(Page_id,'-',Privilege_id) as pk,Page_id,Privilege_id,is_granted FROM  page_privilegs_config ";
$grid->table = "page_privilegs_config";
$grid->set_columns($cols);
$out = $grid->render("pageprivilegs");
?> 
