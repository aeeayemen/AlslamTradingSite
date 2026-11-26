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
$col["title"] = "GroupKey"; // caption of column
$col["name"] = "GroupKey"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
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
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false);
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
    $cityids = 1;
    $result = $app_func->query("SELECT MAX(grup_id)+1 AS NB FROM privilege_groups");
    if ($result && ($row = $result->fetch_assoc())) {
        if (intval($row["NB"]) > 0) {
            $cityids = intval($row["NB"]);
        }
    }

    $CityName_ars = addslashes($data["params"]["grup_title_ar"] ?? '');
    $CityName_ens = addslashes($data["params"]["grup_title_en"] ?? '');
    $Is_actives = addslashes($data["params"]["Is_Actieved"] ?? 'Yes');
    $GroupKey = !empty($data["params"]["GroupKey"]) ? addslashes($data["params"]["GroupKey"]) : substr(md5(uniqid('', true)), 0, 10);
    $can_login_anytime = addslashes($data["params"]["can_login_anytime"] ?? 'Yes');
    $activetodate_raw = trim($data["params"]["Actived_To_Date"] ?? '');
    $activetodate_sql = ($activetodate_raw !== '' && strtoupper($activetodate_raw) !== 'NULL') ? "'" . addslashes($activetodate_raw) . "'" : "NULL";
    $Descriptions = addslashes($data["params"]["Group_Notes"] ?? '');
    $add_dates = date('Y-m-d H:i:s');

    $newquerys = "insert into privilege_groups (grup_id, grup_title_ar, grup_title_en, GroupKey, Group_Notes, Actived_To_Date, Is_Actieved, can_login_anytime, add_date) values 
($cityids, '$CityName_ars', '$CityName_ens', '$GroupKey', '$Descriptions', $activetodate_sql, '$Is_actives', '$can_login_anytime', '$add_dates')";

    try {
        $result = $app_func->query($newquerys);
        if (!$result) {
            phpgrid_error("Invalid query: " . $app_func->error());
        }
    } catch (\Throwable $e) {
        $errs = $e->getMessage();
        if (check_error($errs, "Privilege_grup_title_ar_UK")) {
            phpgrid_error("تم اضافةهذا الاسم مسبقاً لايُسمح بالتكرار  تاكد من التسمية عربي ");
        }
        if (check_error($errs, "Privilege_grup_title_en_UK")) {
            phpgrid_error("تم اضافةهذا الاسم مسبقاً لايُسمح بالتكرار  تاكد من التسمية -انجليزي ");
        }
        phpgrid_error("Invalid query: " . $errs);
    }
}

//---------------------Edit funcation start here----------------

function update_data($data)
{
    global $app_func;
    $mss = date('Y-m-d H:i:s');
    $empno = intval($data["grup_id"] ?? ($data["id"] ?? 0));

    $allowed = array('grup_title_ar', 'grup_title_en', 'GroupKey', 'Group_Notes', 'Actived_To_Date', 'Is_Actieved', 'can_login_anytime', 'Is_configrated');
    $s = array();
    foreach ($data["params"] as $k => $v) {
        if (in_array($k, $allowed)) {
            if ($k === 'Actived_To_Date') {
                $val_trim = trim($v);
                $s[] = ($val_trim !== '' && strtoupper($val_trim) !== 'NULL') ? "`$k` = '" . addslashes($val_trim) . "'" : "`$k` = NULL";
            } else {
                $s[] = "`$k` = '" . addslashes($v) . "'";
            }
        }
    }
    $s[] = "`Last_Modify` = '$mss'";
    $s_str = implode(", ", $s);
    $w = "grup_id = $empno";

    try {
        $result = $app_func->query("UPDATE privilege_groups SET $s_str WHERE $w");
        if (!$result) {
            phpgrid_error("Invalid query: " . $app_func->error());
        }
    } catch (\Throwable $e) {
        $errs = $e->getMessage();
        if (check_error($errs, "Privilege_grup_title_ar_UK")) {
            phpgrid_error("تم اضافةهذا الاسم مسبقاً لايُسمح بالتكرار  تاكد من التسمية عربي ");
        }
        if (check_error($errs, "Privilege_grup_title_en_UK")) {
            phpgrid_error("تم اضافةهذا الاسم مسبقاً لايُسمح بالتكرار  تاكد من التسمية -انجليزي ");
        }
        phpgrid_error("Invalid query: " . $errs);
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
    $city = intval($data["grup_id"] ?? ($data["id"] ?? 0));
    $w = "grup_id = $city";
    try {
        $res = $app_func->query("DELETE from privilege_groups WHERE $w");
        if (!$res) {
            phpgrid_error("حدث خطاء غير متوقع: " . $app_func->error());
        }
    } catch (\Throwable $e) {
        if ($app_func->errno() == 1451) {
            phpgrid_error("لايمكن حذف هذا السجل نظراً لوجود بيانات مرتبه به في جداول اخرى");
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
$grid->table = "privilege_groups";
$grid->set_columns($cols);
$out = $grid->render("privilege_groups");

 
?>