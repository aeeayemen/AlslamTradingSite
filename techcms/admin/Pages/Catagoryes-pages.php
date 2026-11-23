<?php 
$grid = new jqgrid($db_conf);  
$opt["caption"] = "ادراة  التصنيفات   الصفحات";
$opt["resizable"] = true;
$opt["autowidth"] = true;
$opt["autoresize"] = false;
$opt["loadtext"] = $langs['GRID_LOADING_TXT'];
$datesxd=date("Y-d");
$reportnamex="Agents-Groups-Reports-".$datesxd;
$opt["export"] = array("format"=>"pdf", "filename"=>"$reportnamex", "heading"=>"تقرير بفئات المهام", "orientation"=>"portrait", "paper"=>"a4");
//$opt["export"] = array("format"=>"pdf", "filename"=>"$reportnamex", "heading"=>"تقرير بقائمة المُدن", "orientation"=>"landscape", "paper"=>"a4");
$opt["export"]["sheetname"] = $reportnamex;
$opt["export"]["range"] = "filtered"; // or "all"
//$opt["export"]["paged"] = "1";
$opt["toolbar"] = "bottom";
$opt["sortorder"] = "ASC"; // ASC or DESC
$opt["rowList"] = array(30,50,100,200,250,'ALL');
$opt["rowNum"] = 20;
$opt["view_options"]["width"] = "500";  // show form navigation
$opt["add_options"]["width"] = "500";  // show form navigation
$opt["edit_options"]["width"] = "500";  // show form navigation
$opt["multiselect"] = false; // allow you to multi-select through checkboxes 
$opt["width"] = "900";
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
$col["title"] = $langs['CARDCAT_PAGE_TYPCODE']; // caption of column
$col["name"] = "Cat_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = false;
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["width"] = "40";
$cols[] = $col;

$col = array();
$col["title"] = $langs['CARDCAT_PAGE_CARDCATNMAR']; // caption of column
$col["name"] = "Cat_title_ar"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "80";
$col["align"] = "center";
$col["editable"] = true;
$col["required"] = true;
 $col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true);
$cols[] = $col;



$col = array();
$col["title"] ="العنوان English"; // caption of column
$col["name"] = "Cat_title_en"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "80";
$col["align"] = "center";
$col["editable"] = true;
$col["required"] = true;
 
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true);
$cols[] = $col;





$col = array();
$col["title"] ="الايقونة"; // caption of column
$col["name"] = "menu_icon"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "80";
$col["align"] = "center";
$col["editable"] = true;
$col["required"] = true;  
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true); 
$cols[] = $col;



 



$col = array();
$col["title"] ="تفعيل "; // caption of column
$col["name"] = "Is_Enabled"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "80";
$col["align"] = "center";
$col["editable"] = true;
$col["required"] = true;  
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true); 
$cols[] = $col;



$col = array();
$col["title"] ="Is_adminpage"; // caption of column
$col["name"] = "Is_adminpage"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["width"] = "40";
$col["edittype"] = "select";
$col["stype"] = "select";  
$ty1="فعال";
$ty2="غير فعال";
$col["editoptions"] = array("value"=>"Yes:فعال;No:غير فعال");
$col["searchoptions"]["skipEmpty"]=true ;
$col["editoptions"]["skipEmpty"]=true ;  
$col["searchoptions"] =  array("value"=>"Yes:فعال;No:غير فعال");
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["viewable"] = false;
$col["required"] = true;
//$col["hidedlg"] = true;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
$cols[] = $col;



$col = array();
$col["title"] ="Is_visible"; // caption of column
$col["name"] = "Is_visible"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["width"] = "40";
$col["edittype"] = "select";
$col["stype"] = "select";  
$ty1="فعال";
$ty2="غير فعال";
$col["editoptions"] = array("value"=>"Yes:فعال;No:غير فعال");
$col["searchoptions"]["skipEmpty"]=true ;
$col["editoptions"]["skipEmpty"]=true ;  
$col["searchoptions"] =  array("value"=>"Yes:فعال;No:غير فعال");
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["viewable"] = false;
$col["required"] = true;
//$col["hidedlg"] = true;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
$cols[] = $col;




$col = array();
$col["title"] ="Is_Parent_Menu"; // caption of column
$col["name"] = "Is_Parent_Menu"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["width"] = "40";
$col["edittype"] = "select";
$col["stype"] = "select";  
$ty1="فعال";
$ty2="غير فعال";
$col["editoptions"] = array("value"=>"Yes:فعال;No:غير فعال");
$col["searchoptions"]["skipEmpty"]=true ;
$col["editoptions"]["skipEmpty"]=true ;  
$col["searchoptions"] =  array("value"=>"Yes:فعال;No:غير فعال");
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["viewable"] = false;
$col["required"] = true;
//$col["hidedlg"] = true;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
$cols[] = $col;


$col = array();
$col["title"] ="Parent_id"; // caption of column
$col["name"] = "Parent_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "80";
$col["align"] = "center";
$col["editable"] = true;
$col["required"] = true;  
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); 
$cols[] = $col;



$col = array();
$col["title"] ="الترتيب"; // caption of column
$col["name"] = "Menu_order"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "80";
$col["align"] = "center";
$col["editable"] = true;
$col["required"] = true;  
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true); 
$cols[] = $col;




$col = array();
$col["title"] ="Menu_level"; // caption of column
$col["name"] = "Menu_level"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "80";
$col["align"] = "center";
$col["editable"] = true;
$col["required"] = true;  
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); 
$cols[] = $col;


$col = array();
$col["title"] = $langs['PRPSLCAT_PAGE_ADDATE']; //  
$col["name"] = "adding_date"; 
$col["align"] = "center";
$col["width"] = "50";
$col["editable"] = true; // this column is editable
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in add/edit dialog
$col["formatoptions"] = array("srcformat"=>'Y-m-d',"newformat"=>'Y-m-d');
$col["formatter"] = "date"; // format as date
$cols[] = $col;



$col = array();
$col["title"] = $langs['PRPSLCAT_PAGE_EDTDATE']; //  
$col["name"] = "Modify_date"; 
$col["align"] = "center";
$col["width"] = "50";
$col["editable"] = true; // this column is editable
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in add/edit dialog
$col["formatoptions"] = array("srcformat"=>'Y-m-d',"newformat"=>'Y-m-d');
$col["formatter"] = "date"; // format as date
$cols[] = $col;


 



 




$col = array();
$col["title"] = "اسم المستخدم"; // caption of column
$col["name"] = "User_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "60";
$client_lookup = $grid->get_dropdown_values("select distinct  employees_users.User_id as k,  employees_users.Shown_Name as v from  employees_users where Is_Actived='Yes' ");  
$col["stype"] = "select";
$col["align"] = "center";  
$col["searchoptions"] = array("value" => ":;".$client_lookup); 
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["editable"] = false;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing 
$cols[] = $col;


// enable inline editing buttons
      

$grid->set_actions(array(
    "add"=>"can_insert", // allow/disallow add
  "edit"=>"can_edit", // allow/disallow edit
    "delete"=>"can_delete", // allow/disallow delete
    "rowactions"=>false, // show/hide row wise edit/del/save option
    "search" => "advance", // show single/multi field search condition (e.g. simple or advance)
         "inlineadd" => false,
          "autofilter" => true,
         "showhidecolumns" => $Showhidecolumns,  
          "view"=>true,
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
 
    $Cat_id=$app_func->GetOrderTable('Cat_id','app_pages_categories');
$User_names=$_SESSION['AppLoginName'];
$Cat_title_ars=$data["params"]["Cat_title_ar"];
$Is_Parent_Menu=$data["params"]["Is_Parent_Menu"];

$Cat_title_en=$data["params"]["Cat_title_en"];
$menu_icon=$data["params"]["menu_icon"];

$Is_adminpage=$data["params"]["Is_adminpage"];
$Menu_level=$data["params"]["Menu_level"];
$Menu_order=$data["params"]["Menu_order"];
$Cat_details=$data["params"]["Cat_details"];
$Is_Enabled=$data["params"]["Is_Enabled"];
$expiry_years=0;
$mss=date('Y-m-d');
$add_dates=$mss;
$Last_Modifys=$add_dates;
$Is_visible=$data["params"]["Is_visible"];
$newquerys="insert into app_pages_categories (Cat_id,Cat_title_ar,Cat_title_en,menu_icon,Menu_level,Menu_order,Cat_details,Is_Enabled, Is_Parent_Menu,Is_visible,User_id) values 
('$Cat_id','$Cat_title_ars','$Cat_title_en','$menu_icon','$Menu_level','$Menu_order','$Cat_details','$Is_Enabled','$Is_Parent_Menu','$Is_visible','$userid')";
 
$result = $app_func->query($newquerys);
if (!$result) {
   
   $errs=$app_func->error();
   $k1="tagents_group_title_ar_UK";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
    phpgrid_error("لايُسمح بادخال اسم متكرر تأكد من التسمية- عربي");
   }
   
   
   $msg="Invalid query: " .$app_func->error();
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
     //$data["params"]["Last_Modify"]=$mss;
      //$data["params"]["User_name"]=$User_names;
        $empno= $data["Cat_id"];
  $s = array();
  foreach($data["params"] as $k=>$v)
  {
    
     
    $s[] = "$k = '$v'";
        
  }
  $s = implode(",",$s);
    
  $w = "Cat_id = $empno ";
     
$result = $app_func->query("UPDATE app_pages_categories set  $s WHERE $w");
if (!$result) {
   
   $errs=$app_func->error();
   $k1="tagents_group_title_ar_UK";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
    phpgrid_error("لايُسمح بادخال اسم متكرر تأكد من التسمية- عربي");
   }
   $msg="Invalid query: " .$app_func->error();
     phpgrid_error($msg);   
    
}

}
//---------------------filter_display funcation start here----------------
//---------------------filter_display funcation start here----------------
function filter_display($data) 
{ 
      
    foreach($data["params"] as &$d) 
    { 
        
        
        
          $isactivs= $d["Is_visible"];
        if ($isactivs=="Yes")
        {
           $d["Is_visible"] ='فعال';
           
        }else{
            $d["Is_visible"] ='غير فعال';
        }
     
} 

}

//---------------------delete_data funcation start here----------------

function delete_data($data)
{
    global $Applogins_cls,$app_func;
  $city=$data["Cat_id"];
  $w = "Cat_id = $city";
  $res=$app_func->query("DELETE from app_pages_categories WHERE $w");
  
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


$grid->table = "app_pages_categories";
$grid->set_columns($cols);
$out = $grid->render("app_pages_categories");
?>
  