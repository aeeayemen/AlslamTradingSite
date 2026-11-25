<?php 
$grid = new jqgrid($db_conf);
$opt["caption"] = "إدارة مجموعات المستخدمين";
$opt["resizable"] = true;
$opt["autowidth"] = true;
$opt["autoresize"] = true;
$opt["loadtext"] = $langs['GRID_LOADING_TXT'];
//$opt["autoresize"] = true;
$datesxd=date("Y-d");
$reportnamex="Users-Groups-Reports-".$datesxd;
$opt["export"] = array("format"=>"pdf", "filename"=>"$reportnamex", "heading"=>"تقرير بقائمة المجموعات", "orientation"=>"portrait", "paper"=>"a4");
$opt["export"]["sheetname"] = $reportnamex;
$opt["export"]["range"] = "filtered"; // or "all"
//$opt["export"]["paged"] = "1";
$opt["toolbar"] = "bottom";
$opt["sortorder"] = "ASC"; // ASC or DESC
$opt["rowList"] = array(7,50,100,200,250,'ALL');
$opt["rowNum"] = 7;
$opt["view_options"]["width"] = "500";  // show form navigation
$opt["add_options"]["width"] = "500";  // show form navigation
$opt["edit_options"]["width"] = "500";  // show form navigation
$opt["multiselect"] = false; // allow you to multi-select through checkboxes 
$opt["height"] = "150";
$opt["direction"] = "$lngdir";
$datesxd=date("Y-d");
$opt["form"]["position"] = "center";
$opt["detail_grid_id"] = "list2";
$opt["subgridparams"] = "grup_id";  
//$opt["add_options"]["jqModal"] = true;
//$opt["edit_options"]["jqModal"] = true;
$opt["edit_options"]["afterSubmit"] = "function(){ jQuery('#list2').trigger('reloadGrid', [{current:true}]); return [true,'']; jQuery('#list1').setSelection(jQuery('#list1').jqGrid('getGridParam','selrow')); }";

// select after add 
$opt["add_options"]["afterComplete"] = "function (response, postdata) { try { var r = JSON.parse(response.responseText); if (r && r.id) $('#list1').setSelection(r.id); } catch(e) {} }"; 

$opt["add_options"]["success_msg"] = "تم اضافة البيانات بنجاح";
$opt["edit_options"]["success_msg"] = "تم تعديل البيانات بنجاح";
$opt["delete_options"]["success_msg"] = "تم حذف البيانات بنجاح";
$grid->set_options($opt);

                  
$col = array();
$col["title"] = "الرقم"; // caption of column
$col["name"] = "grup_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = false;
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["width"] = "40";
$cols[] = $col;

$col = array();
$col["title"] = "التسميه-عربي"; // caption of column
$col["name"] = "grup_title_ar"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "50";
$col["align"] = "center";
$col["editable"] = true;
$col["required"] = true;
$col["editrules"] = array("required"=>true); 
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;

$cols[] = $col;

$col = array();
$col["title"] = "التسمية -انجليزي"; // caption of column
$col["name"] = "grup_title_en"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "50";
$col["align"] = "center";
$col["required"] = true;
$col["editrules"] = array("required"=>true);
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["editable"] = true;
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing 
$cols[] = $col;

$col = array();
$col["title"] = "تاريخ الاضافة"; //  
$col["name"] = "add_date"; 
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
$col["title"] = "تفعيل حتى تاريخ"; //  
$col["name"] = "Actived_To_Date"; 
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
$col["title"] = "اخر تعديل"; //  
$col["name"] = "Last_Modify"; 
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
$col["title"] = "حالة التفعيل"; // caption of column
$col["name"] = "Is_Actieved"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$cols[] = $col;

$col = array();
$col["title"] = "الدخول بعد الدوام"; // caption of column
$col["name"] = "can_login_anytime"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["width"] = "40";
$col["edittype"] = "checkbox"; // render as checkbox
$col["editoptions"] = array("value"=>"1:0"); // with these values "checked_value:unchecked_value"
$col["formatter"] = "checkbox";
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["viewable"] = false;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["hidedlg"] = true;
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$cols[] = $col;


$col = array();
$col["title"] = "حالة التفعيل"; // caption of column
$col["name"] = "Is_Actieved2"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = false;
$col["width"] = "40";
$col["search"] = false;
$col["isnull"] = true;
$col["export"] = true;
$col["sortable"] = false;
$col["align"] = "center";
$cols[] = $col;

$col = array();
$col["title"] ="امكانية الدخول بعد فترة الدوام" ; // caption of column
$col["name"] = "can_login_anytime2"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = false;
$col["width"] = "40";
$col["search"] = false;
$col["isnull"] = true;
$col["export"] = true;
$col["sortable"] = false;
$col["align"] = "center";
$cols[] = $col;



$col = array();
$col["title"] = $langs['DEPT_PAGE_DEPTNOTS']; // caption of column
$col["name"] = "Group_Notes"; //
$col["editable"] = true;
$col["align"] = "center";
$col["edittype"] = "textarea";
$col["editoptions"] = array("defaultValue" => $langs['DEPT_PAGE_DEPTNONOTS']);
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["width"] = "70";
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
          "view"=>true,
           //"export_excel"=>$Export_role, // export excel button 
                        "export_pdf"=>$Export_role, // export pdf button 
                        //"export_csv"=>$Export_role, // export csv button 
          "export"=>$Export_role        
)
);

// params are array(<function-name>,<class-object> or <null-if-global-func>,<continue-default-operation>)
// if you pass last argument as true, functions will act as a data filter, and insert/update will be performed by grid
$e["on_data_display"] = array("filter_display", null, true); 
$e["on_insert"] = array("add_data", null, false);
$e["on_update"] = array("update_data", null, true);
$e["on_delete"] = array("delete_data", null, false);
$grid->set_events($e);


function add_data($data)
{
    global $app_func;
     global $app_func;
     $cityids= 1;
  $result=$app_func->query("SELECT MAX(grup_id)+1 AS NB FROM privilege_groups");
  if ($result && $row = $result->fetch_assoc()) {
    if($row["NB"]>0)
    {
       $cityids= $row["NB"];     
    }
  }
   
    $User_names=$_SESSION['AppLoginName'] ?? 'admin';
  $CityName_ars=addslashes($data["params"]["grup_title_ar"] ?? '');
$CityName_ens=addslashes($data["params"]["grup_title_en"] ?? '');
$Is_actives=addslashes($data["params"]["Is_Actieved"] ?? 'Yes');
$can_login_anytime=intval($data["params"]["can_login_anytime"] ?? 1);
$activetodate=addslashes($data["params"]["Actived_To_Date"] ?? date('Y-m-d', strtotime('+5 years')));
$Descriptions=addslashes($data["params"]["Group_Notes"] ?? '');
$groupkey='grp_' . $cityids;

$mss=date('Y-m-d');
$add_dates=$mss;
$Last_Modifys=$add_dates;
$newquerys="insert into privilege_groups (grup_id,grup_title_ar, grup_title_en, Group_Notes,Actived_To_Date, Is_Actieved, can_login_anytime, add_date, groupkey) values 
($cityids,'$CityName_ars','$CityName_ens','$Descriptions','$activetodate','$Is_actives',$can_login_anytime,'$Last_Modifys','$groupkey')";

$result = $app_func->query($newquerys);
if (!$result) {
   
   $errs=$app_func->error();
   $k1="Privilege_grup_title_ar_UK";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
    phpgrid_error("تم اضافةهذا الاسم مسبقاً لايُسمح بالتكرار  تاكد من التسمية عربي ");
   }
   $k1="Privilege_grup_title_en_UK";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
    phpgrid_error("تم اضافةهذا الاسم مسبقاً لايُسمح بالتكرار  تاكد من التسمية -انجليزي ");
   }
    
   $msg="Invalid query: ".$app_func->error();
     phpgrid_error($msg);   
    
}


}

//---------------------Edit funcation start here----------------

function update_data($data)
{
    global $app_func;
   $User_names=$_SESSION['AppLoginName'];
   $mss=date('Y-m-d');
     //$data["params"]["Last_Modify"]=$mss;
      //$data["params"]["User_name"]=$User_names;
        $empno= $data["grup_id"];
  $s = array();
  foreach($data["params"] as $k=>$v)
  {
    
     
    $s[] = "$k = '$v'";
        
  }
  $s = implode(",",$s);
    $set=",Last_Modify='$mss',modify_by='$User_names' ";
  $s=$s." ".$set;
  $w = "grup_id = $empno ";
     
$result = $app_func->query("UPDATE privilege_groups set  $s WHERE $w");
if (!$result) {
   
   $errs=$app_func->error();
   $k1="Privilege_grup_title_ar_UK";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
    phpgrid_error("تم اضافةهذا الاسم مسبقاً لايُسمح بالتكرار  تاكد من التسمية عربي ");
   }
   $k1="Privilege_grup_title_en_UK";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
    phpgrid_error("تم اضافةهذا الاسم مسبقاً لايُسمح بالتكرار  تاكد من التسمية -انجليزي ");
   }
    
   $msg="Invalid query: " .$app_func->errno();
     phpgrid_error($msg);   
    
}

}

//---------------------filter_display funcation start here----------------
function filter_display($data) 
{ 
    
    foreach($data["params"] as &$d) 
    { 
        
        
        
          $isactivs= $d["Is_Actieved"];
        if ($isactivs)
        {
           $d["Is_Actieved2"] ='فعال';
           
        }else{
            $d["Is_Actieved2"] ='غير فعال';
        }
      $isactivs= $d["can_login_anytime"];
        if ($isactivs==1)
        {
           $d["can_login_anytime2"] ='ممكن';
        }else{
            $d["can_login_anytime2"] ='محدود';
        }
    } 
} 


//---------------------delete_data funcation start here----------------

function delete_data($data)
{
    global $app_func;
  $city=$data["grup_id"];
  $w = "grup_id = $city";
  $res=$app_func->query("DELETE from privilege_groups WHERE $w");
    $errnos= $app_func->errno();
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

if($useridxrx>1)
{
$grid->select_command = "SELECT  * from privilege_groups where grup_id>1";    
}
$grid->table = "privilege_groups";
$grid->set_columns($cols);
$out_master = $grid->render("list1");


$grid2 = new jqgrid();

$optz["caption"] = "قائمة الصلاحيات";
$optz["resizable"] = true;
$optz["autowidth"] = true;
$optz["autoresize"] = true;
$optz["loadtext"] = $langs['GRID_LOADING_TXT'];
//$opt["autoresize"] = true;
//$opt["export"]["paged"] = "1";
$optz["toolbar"] = "bottom";
$optz["sortorder"] = "ASC"; // ASC or DESC
$optz["sortname"] = 'id'; // by default sort grid by this field 
$optz["datatype"] = "local"; // stop loading detail grid at start 
$optz["rowList"] = array(10,50,100,200,250,'ALL');
$optz["rowNum"] = 10;
$optz["add_options"]["width"] = "500";  // show form navigation
$optz["edit_options"]["width"] = "500";  // show form navigation
$optz["multiselect"] = false; // allow you to multi-select through checkboxes
$optz["reloadedit"] = true;  
$optz["height"] = "180";
$optz["direction"] = "$lngdir";
$datesxd=date("Y-d");
$optz["form"]["position"] = "center";
//$opt["add_options"]["jqModal"] = true;

//$opt["edit_options"]["jqModal"] = true;
$optz["add_options"]["success_msg"] = "تم اضافة البيانات بنجاح";
$optz["edit_options"]["success_msg"] = "تم تعديل البيانات بنجاح";
$optz["delete_options"]["success_msg"] = "تم حذف البيانات بنجاح";
$optz["onAfterSave"] = "function(){ jQuery('#list1').trigger('reloadGrid',[{jqgrid_page:1}]); }";
$optz["onAfterSave"] = "function(){ var selr = jQuery('#list1').jqGrid('getGridParam','selrow'); jQuery('#list1').trigger('reloadGrid',[{jqgrid_page:1}]); setTimeout( function(){jQuery('#list1').setSelection(selr,true);},500 ); }";
$optz["add_options"]["beforeInitData"] = "function(formid){ var selr = jQuery('#list1').jqGrid('getGridParam','selrow'); if (!selr) { alert('الرجاء تحديد مجموعة قبل الاضافة'); return false; } }"; 
  
$grid2->set_options($optz);

 

$colx = array(); 
$colx["title"] = "PK"; 
$colx["name"] = "pk"; 
$colx["search"] = false;
$colx["export"] = false; 
$colx["hidden"] = true;
$colx["isnull"] = true;
$colx["hidedlg"] = true;
$colx["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing  
$cols2[] = $colx;
    
$colx = array();
$colx["title"] = "الرقم"; // caption of column
$colx["name"] = "id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$colx["editable"] = false;
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
$colx["align"] = "center";
$colx["width"] = "40";
$cols2[] = $colx;
 
  
$colx = array(); 
$colx["title"] = "اسم الصفحة"; 
$colx["name"] = "Page_id";  
$colx["editable"] = true; 
$colx["width"] = "60";
$client_lookup = $grid2->get_dropdown_values("select distinct  app_pages.Page_id as k,  app_pages.Page_name_ar as v from  app_pages where Is_Superadminpage='0' and Is_visibled='1'");  
$colx["stype"] = "select";
$colx["align"] = "center";  
$colx["searchoptions"] = array("value" => ":;".$client_lookup); 
$colx["edittype"] = "select"; // render as select 
$str = $grid2->get_dropdown_values("select distinct  app_pages.Page_id as k,  app_pages.Page_name_ar as v from  app_pages where Is_Superadminpage='0' and Is_visibled='1'");
$colx["editoptions"] = array( 
            "value"=>":;".$str,  
            "onchange" =>"fill_form();");           
$colx["editrules"] = array("required"=>true);
$colx["formatter"] = "select"; // display label, not value
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role; 
$colx["show"]["edit"] = false;
$cols2[] = $colx;
   

$col = array(); 
$col["title"] = "اسم الصلاحية"; 
$col["name"] = "Privilege_id"; 
$col["editable"] = true; 
$col["width"] = "60";
$client_lookup = $grid2->get_dropdown_values("select distinct   privilegs.Privilege_id as k,   privilegs.Privilege_title_ar as v from  privilegs");  
$col["stype"] = "select";
$col["align"] = "center";  
$col["searchoptions"] = array("value" => ":;".$client_lookup); 
$col["edittype"] = "select"; // render as select 
$str = $grid2->get_dropdown_values("select distinct   privilegs.Privilege_id as k,   privilegs.Privilege_title_ar as v from  privilegs");
$col["editoptions"] = array( 
            "value"=>":;".$str);  
 //,  "onchange" =>"check_acessroles();"                  
$col["editrules"] = array("required"=>true);
$col["formatter"] = "select"; // display label, not value
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role; 
$col["show"]["edit"] = false;
$cols2[] = $col;
   
         

$col = array();
$col["title"] = "حالة التفعيل"; // caption of column
$col["name"] = "is_granted"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["width"] = "40";
$col["edittype"] = "checkbox"; // render as checkbox
$col["editoptions"] = array("value"=>"1:0"); // with these values "checked_value:unchecked_value"
$col["formatter"] = "checkbox";
$col["search"] = $Search_role;
$col["stype"] = "select";
$opn='فعال';
$clsd='غير فعال';
$col["searchoptions"] = array("value"=>"1:$opn ;0:$clsd");  
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["viewable"] = false;
$col["required"] = true;
$col["hidedlg"] = false;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing
$cols2[] = $col;




$col = array();
$col["title"] = "تاريخ الاضافة"; //  
$col["name"] = "adding_date"; 
$col["align"] = "center";
$col["width"] = "50";
$col["editable"] = true; // this column is editable
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["formatoptions"] = array("srcformat"=>'Y-m-d',"newformat"=>'Y-m-d');
$col["formatter"] = "date"; // format as date
$col["show"] = array("list"=>true,"edit"=>false,"add"=>false); // only show in listing
$cols2[] = $col;




$grid2->set_actions(array(
    "add"=>$Add_role, // allow/disallow add
  "edit"=>$Edit_role, // allow/disallow edit
    "delete"=>$Delet_role, // allow/disallow delete
    "rowactions"=>false, // show/hide row wise edit/del/save option
    "search" => "advance", // show single/multi field search condition (e.g. simple or advance)
         "inlineadd" => false,
          "autofilter" => true,
        "showhidecolumns" => $Showhidecolumns 
  
           
)
);    
// params are array(<function-name>,<class-object> or <null-if-global-func>,<continue-default-operation>)
// if you pass last argument as true, functions will act as a data filter, and insert/update will be performed by grid 
$e1["on_insert"] = array("add_data2", null, false);
$e1["on_update"] = array("update_data2", null, false);
$e1["on_delete"] = array("delete_data2", null, false);
$grid2->set_events($e1);

//---------------------Edit funcation start here----------------

function update_data2($data)
{
    global $app_func;
    list($grpid,$city,$zone) = explode("-",$data["pk"]);

  $s = array();
  foreach($data["params"] as $k=>$v)
  {
     if($k=="pk"){
         
     }else{
         
     
    $s[] = "$k = '$v'";
        }
  }
  $s = implode(",",$s);
  
  $w = "grup_id=$grpid and Page_id = $city and Privilege_id=$zone";
     
$result = $app_func->query("UPDATE users_group_privilegs_config set  $s WHERE $w");
if (!$result) {
   $errs=$app_func->error();
   $k1="PRIMARY";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
     phpgrid_error("حدث خطاء اثناء الاضافة لايٌسمح بادخال بيانات متكرره ");

   }
   $errs=$app_func->error();

   $msg="Invalid query: " .$errs;
     phpgrid_error($msg);   
    
} 
}

//---------------------filter_display funcation start here----------------


//---------------------delete_data funcation start here----------------

function delete_data2($data)
{
    global $app_func;
    list($grpid,$city,$zone) = explode("-",$data["pk"]);
  $w = "grup_id=$grpid and Page_id = $city and Privilege_id=$zone";
  $res=$app_func->query("DELETE from users_group_privilegs_config WHERE $w");
    $errnos= $app_func->errno();
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

function add_data2($data)
{
    global $app_func;
    global $app_func;
    $grup_id=intval($_REQUEST["grup_id"] ?? 0);
     $cityids= 1;
  $result=$app_func->query("SELECT MAX(id)+1 AS NB FROM users_group_privilegs_config where grup_id=$grup_id");
  if ($result && $row = $result->fetch_assoc()) {
    if($row["NB"]>0)
    {
       $cityids= $row["NB"];     
    }
  }
   
$Page_id=intval($data["params"]["Page_id"] ?? 0);
$Privilege_id=intval($data["params"]["Privilege_id"] ?? 0);
$is_granted=intval($data["params"]["is_granted"] ?? 1);

  $checresultx=$app_func->query("SELECT count(Privilege_id) AS NB FROM users_group_privilegs_config where grup_id=$grup_id and Page_id='$Page_id' and Privilege_id=5 ");
  $result = false;
  if ($checresultx && $row = $checresultx->fetch_assoc()) {
    if($row["NB"]>0)
    {
$newquerys="insert into users_group_privilegs_config (id,grup_id,Page_id, Privilege_id,is_granted) values 
($cityids,'$grup_id','$Page_id','$Privilege_id','$is_granted')";
$result = $app_func->query($newquerys);
  
    }else{
        $newquerys3="insert into users_group_privilegs_config (id,grup_id,Page_id, Privilege_id,is_granted) values 
($cityids,'$grup_id','$Page_id','5','1')";
$result = $app_func->query($newquerys3);
$cityids+=1;
$newquerys="insert into users_group_privilegs_config (id,grup_id,Page_id, Privilege_id,is_granted) values 
($cityids,'$grup_id','$Page_id','$Privilege_id','$is_granted')";
$result = $app_func->query($newquerys);
    }    

}

if (!$result) {
   
   $errs=$app_func->error();
   $k1="PRIMARY";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
    phpgrid_error("حدث خطاء اثناء الاضافة لايٌسمح بادخال بيانات متكرره ");
   }
   $k1="Privilege_grup_title_en_UK";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
    phpgrid_error("تم اضافةهذا الاسم مسبقاً لايُسمح بالتكرار  تاكد من التسمية -انجليزي ");
   }
    
   $msg="Invalid query: " .$app_func->errno();
     phpgrid_error($msg);   
    
}


}

$id = intval($_GET["rowid"]);
$cid = intval($_GET["grup_id"]);

$grid2->select_command = "SELECT  id,concat(grup_id,'-',Page_id,'-',Privilege_id) as pk,Privilege_id,Page_id,grup_id,is_granted,adding_date,Added_by FROM  users_group_privilegs_config where grup_id=$cid";
$grid2->table = "users_group_privilegs_config";
$grid2->set_columns($cols2);
$out_detail = $grid2->render("list2");




?>
 