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
$col["title"] = "الرقم"; // caption of column
$col["name"] = "why_us_Id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
$col["dbname"] = "why_us.sector_id";
$col["editable"] = true;
$col["width"] = "130";
$col["edittype"] = "select";
$col["stype"] = "select";
$col["formatter"] = "select";
$str = $grid->get_dropdown_values("select distinct sector_id as k, sector_name as v from sector");
$col["editoptions"] = array(
    "value"=>$str,
    "onchange" => array("sql"=>"select distinct activity_id as k, activity_name as v from activity where sector_id='{sector_id}'",
        "update_field" => "activity_id" )
);
$col["searchoptions"] = array("value" =>$str);

$col["editoptions"]["onload"]["sql"] = "select distinct sector_id as k, sector_name as v from sector where lang_id= '{lang_id}'";
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["viewable"] = true;
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
$col["title"] = "وصف قصير"; // caption of column
$col["name"] = "Name_Partenr"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["sortable"] = false; // this column is not sortable
$col["search"] = false; // this column is not searchable
$col["editable"] = true;
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>6, "cols"=>50); // with these attributes
// connect tinymce
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true);
//$col["editoptions"]["dataInit"] = "function(el){ setTimeout(function(){ link_tinymce(el); },200); }";
$cols[] = $col;



$col = array();
$col["title"] = "لماذا نحن 1"; // caption of column
$col["name"] = "point1"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "110";
$col["align"] = "center";
$col["editable"] = true;
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true);
$cols[] = $col;



$col = array();
$col["title"] = "لماذا نحن 2"; // caption of column
$col["name"] = "point2"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "110";
$col["align"] = "center";
$col["editable"] = true;
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true);
$cols[] = $col;



$col = array();
$col["title"] = "لماذا نحن 3"; // caption of column
$col["name"] = "point3"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "110";
$col["align"] = "center";
$col["editable"] = true;
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true);
$cols[] = $col;



$col = array();
$col["title"] = "لماذا نحن 4"; // caption of column
$col["name"] = "point4"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "110";
$col["align"] = "center";
$col["editable"] = true;
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true);
$cols[] = $col;



$col = array();
$col["title"] = "لماذا نحن 5"; // caption of column
$col["name"] = "point5"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "110";
$col["align"] = "center";
$col["editable"] = true;
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true);
$cols[] = $col;




$col = array();
$col["name"] ="getimage"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$col["width"] = "50";
$col["editable"] = true;
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true);
$col["editoptions"]["dataInit"] = "function(o){edit_as_custom(o);}";
$cols[] = $col;



$col = array();
$col["title"] = " صورة";
$col["name"] = "logo"; // grid column name, must be exactly same as returned column-name from sql (
$col["width"] = "30";
//$col["editrules"] = array("required"=>true);
$col["editable"] = true;
$col["edittype"] = "text"; // render as file
//$col["upload_dir"] = "../../uploads/company_info"; // upload here
$col["required"] = true;
$col["search"] = false;
$col["export"] = false;
$col["sortable"] = false;
$col["hidedlg"] = true;
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in add/edit dialog
$cols[] = $col;

//$col["editrules"] = array("number"=>true,"required"=>true,"maxlength"=>4,"minlength"=>4);






$col = array();
$col["name"] ="getimage2"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$col["width"] = "50";
$col["editable"] = true;
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true);
$col["editoptions"]["dataInit"] = "function(o){edit_as_custom_manger(o);}";
$cols[] = $col;



$col = array();
$col["title"] = " صورة 2";
$col["name"] = "url"; // grid column name, must be exactly same as returned column-name from sql (
$col["width"] = "30";
//$col["editrules"] = array("required"=>true);
$col["editable"] = true;
$col["edittype"] = "text"; // render as file
//$col["upload_dir"] = "../../uploads/company_info"; // upload here
$col["required"] = true;
$col["search"] = false;
$col["export"] = false;
$col["sortable"] = false;
$col["hidedlg"] = true;
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in add/edit dialog
$cols[] = $col;

//$col["editrules"] = array("number"=>true,"required"=>true,"maxlength"=>4,"minlength"=>4);







$col = array();
$col["title"] = " الترتيب  "; // caption of column
$col["name"] = "order_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
$col["title"] = "حالة التفعيل"; // caption of column
$col["name"] = "Is_Actieved"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["width"] = "60";
$col["edittype"] = "select";
$col["stype"] = "select";
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
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing
$cols[] = $col;



$col = array();
$col["title"] = $langs['ZONE_PAGE_ADDATE']; //
$col["name"] = "creating_date";
$col["align"] = "center";
$col["width"] = "50";
$col["editable"] = true; // this column is editable
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>true,"edit"=>false,"add"=>false); // only show in add/edit dialog
$col["formatoptions"] = array("srcformat"=>'Y-m-d',"newformat"=>'Y-m-d');
$col["formatter"] = "date"; // format as date
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
$cols[] = $col;


$col = array();
$col["title"] = $langs['City_PAGE_EDTDATE']; //
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
$client_lookup = $grid->get_dropdown_values("select distinct  employees_users.User_id as k,  employees_users.Shown_Name as v from  employees_users  ");
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

    $why_us_Id = $app_func->GetOrderTable('why_us_Id', 'why_us');
    $lang_id = intval($data["params"]["lang_id"] ?? 1);
    $sector_id = intval($data["params"]["sector_id"] ?? 1);
    $url = addslashes($data["params"]["url"] ?? '');
    $order_id = intval($data["params"]["order_id"] ?? 1);
    $Is_Actieved = addslashes($data["params"]["Is_Actieved"] ?? 'Yes');

    $User_names = addslashes($_SESSION['AppLoginName'] ?? 'admin');
    $mss = date('Y-m-d H:i:s');
    $creating_date = $mss;
    $Name_Partenr = addslashes($data["params"]["Name_Partenr"] ?? '');
    $Pathwhy_us = addslashes($data["params"]["logo"] ?? '');
    $activity_id = intval($data["params"]["activity_id"] ?? 1);
    $point1 = addslashes($data["params"]["point1"] ?? '');
    $point2 = addslashes($data["params"]["point2"] ?? '');
    $point3 = addslashes($data["params"]["point3"] ?? '');
    $point4 = addslashes($data["params"]["point4"] ?? '');
    $point5 = addslashes($data["params"]["point5"] ?? '');

    $result = 0;
    try {
        $getlan = $app_func->query("select * from languages");
        while ($row = $getlan->fetch_assoc()) {
            $lang_id1 = $row['lang_id'];
            $newquerys = "insert into why_us (`why_us_Id`,`sector_id`,`activity_id`, `lang_id`, `Name_Partenr`,`point1`,`point2`,`point3`,`point4`,`point5`,`url`, `logo`,  `order_id`,`Is_Actieved`,`created_by`, `creating_date`, `User_id`) values 
('$why_us_Id','$sector_id','$activity_id','$lang_id1','$Name_Partenr','$point1','$point2','$point3','$point4','$point5','$url','$Pathwhy_us','$order_id','$Is_Actieved','$User_names','$creating_date','$userid')";
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

    $allowed = array('sector_id', 'activity_id', 'Name_Partenr', 'point1', 'point2', 'point3', 'point4', 'point5', 'logo', 'url', 'order_id', 'Is_Actieved');
    $s = array();
    foreach ($data["params"] as $k => $v)
    {
        if (in_array($k, $allowed)) {
            $vv = in_array($k, array('sector_id', 'activity_id', 'order_id')) ? intval($v) : addslashes($v);
            $s[] = "`$k` = '$vv'";
        }
    }
    $s[] = "`Modify_date` = '$mss'";
    $s[] = "`created_by` = '$User_names'";
    $s[] = "`User_id` = '$userid'";
    $s_str = implode(", ", $s);

    $w = "why_us_Id = $empno AND lang_id = '$langid'";
    try {
        $result = $app_func->query("UPDATE why_us SET $s_str WHERE $w");
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
        $why_us_Id= $d["why_us_Id"];
        $isactivs= $d["Is_Actieved"];
        if ($isactivs=="Yes")
        {
            $d["Is_Actieved"] ='فعال';

        }else{
            $d["Is_Actieved"] ='غير فعال';
        }



        $d["type_icon_path"] = techcms_render_grid_image($d["logo"] ?? "");




    }
}


//---------------------delete_data funcation start here----------------

function delete_data($data)
{
    global $Applogins_cls,$app_func;
    list($lang_id,$why_us_Id) = explode("-",$data["pk"]);

    $langid=$lang_id;
    $empno=$why_us_Id;

    $res=0;
    $getlan=$app_func->query("select * from languages");
    while ($row=$getlan->fetch_assoc()) {
        $lang_id1=$row['lang_id'];
        $w = "why_us_Id = $empno and lang_id='$lang_id1' ";
        $res=$app_func->query("DELETE from why_us WHERE $w");
    }

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

//$grid->select_command = "SELECT concat(font_icon_id,'-',ZoneID) as pk,font_icon_id,ZoneID,ZoneName_ar,Zone_start_font_icon,Zone_start_password,quility,zonecode,ZoneName_en, Description,creating_date,Modify_date,Is_Actieved,Show_on_Map,User_name FROM  zones ";
$grid->select_command = "SELECT  *,concat(lang_id,'-',why_us_Id) as pk FROM  why_us" ;
$grid->table = "why_us";
$grid->set_columns($cols);
$out = $grid->render("why_us");
?>
 