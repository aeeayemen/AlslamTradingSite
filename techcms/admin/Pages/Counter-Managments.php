<?php
$grid = new jqgrid($db_conf); 

$opt["caption"] =$DetailPage['Page_name_ar'];
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
$opt["add_options"]["success_msg"] = "تم اضافة البيانات بنجاح";
$opt["edit_options"]["success_msg"] = "تم تعديل البيانات بنجاح";
$opt["delete_options"]["success_msg"] = "تم حذف البيانات بنجاح";
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
$col["title"] = "اللغة";
$col["name"] = "lang_id";
$col["dbname"] = "category.lang_id";//name of tabel is find in
$col["editable"] = true;
$col["width"] = "60";
$col["stype"] = "select";
$col["align"] = "center";
$str3 = $grid->get_dropdown_values("select distinct  languages.lang_id as k,  languages.lang_title as v from  languages  ");
$col["searchoptions"] =  array( "value"=>$str3);
$col["edittype"] = "select"; // render as select
$str = $grid->get_dropdown_values("select distinct  languages.lang_id as k,  languages.lang_title as v from  languages  ");
//$col["editoptions"] = array( "value"=>$str);
$col["editoptions"] = array(
    "value"=>$str,
    "onchange" => array("sql"=>"select distinct sector_id as k, sector_name as v from sector where    lang_id= '{lang_id}'  ",
        "update_field" => "sector_id" )
);
$col["editrules"] = array("required"=>true,"readonly"=>true);
$col["formatter"] = "select"; // display label, not value
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"]["edit"] = true;

$col["show"] = array("list"=>true,"edit"=>true,"add"=>true);
$cols[] = $col;





$col = array();
$col["title"] = " القطاع  ";// caption of column
$col["name"] = "sector_id";
$col["dbname"] = "category.sector_id";
$col["editable"] = false;
$col["width"] = "130";
$col["edittype"] = "select";
$col["stype"] = "select";
$str = $grid->get_dropdown_values("select distinct sector_id as k, sector_name as v from sector");
$col["formatter"] = "select";
$col["searchoptions"] = array("value" =>$str);
$col["editoptions"] = array(
    "value"=>$str,
    "onchange" => array("sql"=>"select distinct activity_id as k, activity_name as v from activity where    sector_id= '{sector_id}' and lang_id= '{lang_id}'  ",
        "update_field" => "activity_id" )
);
$col["editoptions"]["onload"]["sql"] = "select distinct sector_id as k, sector_name as v from sector where lang_id= '{lang_id}'";
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["viewable"] = false;
$col["required"] = false;
//$col["hidedlg"] = true;
$col["show"] = array("list" => false, "edit" => false, "add" => false); // only show in listing
$cols[] = $col;



$col = array();
$col["title"] = " القطاع  ";// caption of column
$col["name"] = "activity_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["width"] = "50";
$col["edittype"] = "select";
$col["stype"] = "select";
$col["formatter"] = "select";
$str = $grid->get_dropdown_values("select distinct activity_id as k, activity_name as v from activity");
$col["editoptions"] = array("value" =>" :;".$str);
$col["searchoptions"] = array("value" =>" :;".$str);
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["viewable"] = true;
$col["required"] = true;
//$col["hidedlg"] = true;
$col["show"] = array("list" => true, "edit" => true, "add" => true); // only show in listing
$cols[] = $col;





$col = array();
$col["title"] = "الرقم"; // caption of column
$col["name"] = "count_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
$col["title"] = "العنوان"; // caption of column
$col["name"] = "titleCount"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
$col["title"] = "العدد"; // caption of column
$col["name"] = "number"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["sortable"] = false; // this column is not sortable 
$col["search"] = false; // this column is not searchable 
$col["editable"] = true; 
$col["edittype"] = "text"; // render as textarea on edit 
//$col["editoptions"] = array("rows"=>30, "cols"=>50); // with these attributes  
// connect tinymce  
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true); 
$cols[] = $col;





$col = array();
$col["title"] = "الترتيب" ;// caption of column
$col["name"] = "order_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "100";
$col["align"] = "center";
$col["editable"] = true;
$col["editrules"] = array("number"=>true);
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
////$col["editrules"] = array("email"=>true,"required"=>true); 
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
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
    global $Applogins_cls, $app_func;
    $userid = intval($Applogins_cls->useridx ?? 1);
    $count_id = $app_func->GetOrderTable('count_id', 'counter');

    $order_id = !empty($data["params"]["order_id"]) ? intval($data["params"]["order_id"]) : 1;
    $titleCount = addslashes($data["params"]["titleCount"] ?? '');
    $number = intval($data["params"]["number"] ?? 0);
    $activity_id = intval($data["params"]["activity_id"] ?? 0);
    $sector_id = intval($data["params"]["sector_id"] ?? 0);
    $User_names = addslashes($_SESSION['AppLoginName'] ?? 'admin');

    $result = 0;
    try {
        $getlan = $app_func->query("select * from languages");
        while ($row = $getlan->fetch_assoc()) {
            $lang_id1 = intval($row['lang_id']);
            $newquerys = "insert into counter (`count_id`, `lang_id`, `sector_id`, `activity_id`, `titleCount`, `number`, `order_id`, `created_by`) values 
('$count_id', '$lang_id1', '$sector_id', '$activity_id', '$titleCount', '$number', '$order_id', '$User_names')";
            $result = $app_func->query($newquerys);
        }
    } catch (\Throwable $e) {
        phpgrid_error("خطاء غير متوقع: " . $e->getMessage());
    }

    if (!$result) {
        $errs = $app_func->error();
        $msg = "خطاء غير متوقع: " . $errs;
        phpgrid_error($msg);
    }
}

//---------------------Edit funcation start here----------------

function update_data($data)
{
    global $Applogins_cls, $app_func;
    $userid = intval($Applogins_cls->useridx ?? 1);
    $User_names = addslashes($_SESSION['AppLoginName'] ?? 'admin');
    $mss = date('Y-m-d H:i:s');

    $pk = $data["pk"] ?? ($data["id"] ?? '');
    $parts = explode("-", $pk);
    $langid = intval($parts[0] ?? 0);
    $empno = intval($parts[1] ?? 0);
    if ($empno <= 0) {
        $empno = intval($data["count_id"] ?? 0);
    }

    $allowed = array('titleCount', 'number', 'activity_id', 'sector_id', 'order_id', 'font_icon_id');
    $s = array();
    foreach ($data["params"] as $k => $v) {
        if (in_array($k, $allowed)) {
            $vv = in_array($k, array('number', 'activity_id', 'sector_id', 'order_id')) ? intval($v) : addslashes($v);
            $s[] = "`$k` = '$vv'";
        }
    }
    $s[] = "`created_by` = '$User_names'";
    $s[] = "`Modify_date` = '$mss'";
    $s_str = implode(", ", $s);

    $w = "count_id = $empno";
    if ($langid > 0) {
        $w .= " AND lang_id = '$langid'";
    }

    try {
        $result = $app_func->query("UPDATE counter SET $s_str WHERE $w");
        if (!$result) {
            phpgrid_error("خطاء غير متوقع: " . $app_func->error());
        }
    } catch (\Throwable $e) {
        phpgrid_error("خطاء غير متوقع: " . $e->getMessage());
    }
}

//---------------------filter_display funcation start here----------------
function filter_display($data) 
{ 
    foreach($data["params"] as &$d) 
    { 
         $count_id=$d["count_id"];
    } 
} 

//---------------------delete_data funcation start here----------------

function delete_data($data)
{ 
    global $Applogins_cls, $app_func;
    $pk = $data["pk"] ?? ($data["id"] ?? '');
    $parts = explode("-", $pk);
    $empno = intval($parts[1] ?? 0);
    if ($empno <= 0) {
        $empno = intval($data["count_id"] ?? 0);
    }

    try {
        $res = $app_func->query("DELETE from counter WHERE count_id = $empno");
        if (!$res) {
            phpgrid_error("خطاء غير متوقع: " . $app_func->error());
        }
    } catch (\Throwable $e) {
        if ($app_func->errno() == 1451) {
            phpgrid_error("لايمكن حذف هذا السجل نظراً لوجود بيانات مرتبطة به في جداول أخرى");
        } else {
            phpgrid_error("حدث خطاء غير متوقع: " . $e->getMessage());
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
 $grid->select_command = "SELECT  *,concat(lang_id,'-',count_id) as pk FROM  counter" ;
$grid->table = "counter";
$grid->set_columns($cols);
$out = $grid->render("counter");

?>
 