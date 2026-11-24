<?php

$grid = new jqgrid($db_conf);

$opt["caption"] = "أدارة اللغات";
$opt["resizable"] = true;
$opt["autowidth"] = true;
$opt["autoresize"] = true;
$opt["loadtext"] = $langs['GRID_LOADING_TXT'];
$datesxd=date("Y-d");
$reportnamex="languages-Reports-".$datesxd;
$opt["export"] = array("format"=>"pdf", "filename"=>"$reportnamex", "heading"=>"تقرير بفئات البطائق", "orientation"=>"portrait", "paper"=>"a4");
//$opt["export"] = array("format"=>"pdf", "filename"=>"$reportnamex", "heading"=>"تقرير بقائمة المُدن", "orientation"=>"landscape", "paper"=>"a4");
$opt["export"]["sheetname"] = $reportnamex;
$opt["export"]["range"] = "filtered"; // or "all"
//$opt["export"]["paged"] = "1";
$opt["toolbar"] = "bottom";
$opt["sortorder"] = "ASC"; // ASC or DESC
$opt["rowList"] = array(30,50,100,200,250,'ALL');
$opt["rowNum"] =10;
$opt["view_options"]["width"] = "500";  // show form navigation
$opt["add_options"]["width"] = "500";  // show form navigation
$opt["edit_options"]["width"] = "500";  // show form navigation
$opt["multiselect"] = false; // allow you to multi-select through checkboxes 
$opt["width"] = "900";
$opt["height"] = "150";
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
$col["name"] = "lang_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = false;
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["width"] = "40";
$cols[] = $col;

$col = array();
$col["title"] ="العنوان"; // caption of column
$col["name"] = "lang_title"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
$col["title"] = "اسم الكلاس"; //  
$col["name"] = "class_name"; 
$col["align"] = "center";
$col["width"] = "50";
$col["editable"] = true; // this column is editable
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in add/edit dialog
$cols[] = $col;



$col = array();
$col["title"] = "الاتجاه"; // caption of column
$col["name"] = "dirction"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["width"] = "40";
$col["edittype"] = "select";
$col["stype"] = "select";   
$col["editoptions"] = array("value"=>"rtl:rtl;ltr:ltr");
$col["searchoptions"]["skipEmpty"]=true ;
$col["editoptions"]["skipEmpty"]=true ;  
$col["searchoptions"] =  array("value"=>"rtl:rtl;ltr:ltr");
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["viewable"] = false;
$col["required"] = true;
//$col["hidedlg"] = true;
$col["show"] = array("list"=>true,"true"=>true,"add"=>true); // only show in listing
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
$col["title"] = $langs['PRPSLCAT_PAGE_ENBLSTTUS']; // caption of column
$col["name"] = "Is_Actieved"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
$col["show"] = array("list"=>true,"true"=>true,"add"=>true); // only show in listing
$cols[] = $col;

$col = array();
$col["title"] = "الافتراضي"; // caption of column
$col["name"] = "Is_defults"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["width"] = "40";
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
$col["show"] = array("list"=>false,"true"=>true,"add"=>true); // only show in listing
$cols[] = $col;







$col = array();
$col["title"] = $langs['PRPSLCAT_PAGE_PRPSLCATNOTS']; // caption of column
$col["name"] = "Cat_Notes"; //
$col["editable"] = true;
$col["align"] = "center";
$col["edittype"] = "textarea";
$col["editoptions"] = array("defaultValue" => "لايوجد تفاصيل");
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["width"] = "70";
//$cols[] = $col;




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
$e["on_update"] = array("update_data", null, false);
$e["on_delete"] = array("delete_data", null, false);
$grid->set_events($e);


function add_data($data)
{
    global $Applogins_cls, $app_func;
    $userid = $Applogins_cls->useridx;  
 
    $lang_id = $app_func->GetOrderTable('lang_id', 'languages');
    $lang_title = addslashes($data["params"]["lang_title"] ?? ''); 
    $lang_name = addslashes($data["params"]["lang_name"] ?? $lang_title);
    $mss = date('Y-m-d H:i:s');
    $Is_actives = addslashes($data["params"]["Is_Actieved"] ?? 'Yes');
    $dirction = addslashes($data["params"]["dirction"] ?? 'rtl');
    $is_def = addslashes($data["params"]["Is_defults"] ?? 'No');
    $notes = addslashes($data["params"]["Cat_Notes"] ?? '');
    
    $newquerys = "INSERT INTO languages (lang_id, lang_title, lang_name, dirction, Is_Actieved, Is_defults, Cat_Notes, Modify_date, User_id) VALUES 
($lang_id, '$lang_title', '$lang_name', '$dirction', '$Is_actives', '$is_def', '$notes', '$mss', '$userid')";
 
    $result = $app_func->query($newquerys);
    if (!$result) {
        $errs = $app_func->error();
        phpgrid_error("خطأ أثناء إضافة اللغة: " . $errs);   
    }
}

//---------------------Edit funcation start here----------------

function update_data($data)
{
    global $Applogins_cls, $app_func;
    $userid = $Applogins_cls->useridx;  
    $empno = intval($data["lang_id"] ?? ($data["id"] ?? 0));
    $mss = date('Y-m-d H:i:s');
    $allowed = array('lang_title', 'lang_name', 'class_name', 'dirction', 'Is_Actieved', 'Is_defults', 'Cat_Notes');
    $s = array();
    foreach ($data["params"] as $k => $v)
    {
        if (in_array($k, $allowed)) {
            $v_esc = addslashes($v);
            $s[] = "`$k` = '$v_esc'";
        }
    }
    $s[] = "`Modify_date` = '$mss'";
    $s[] = "`User_id` = '$userid'";
    $s_str = implode(", ", $s);
    $w = "lang_id = $empno";
     
    $result = $app_func->query("UPDATE languages SET $s_str WHERE $w");
    if (!$result) {
        $errs = $app_func->error();
        phpgrid_error("خطأ أثناء تعديل اللغة: " . $errs);   
    }
}
//---------------------filter_display funcation start here----------------
//---------------------filter_display funcation start here----------------
function filter_display($data) 
{ 
    
    foreach($data["params"] as &$d) 
    { 
        
        
        
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
  $city=$data["lang_id"];
  $w = "lang_id = $city";
  $res=$app_func->query("DELETE from languages WHERE $w");
    $errnos= $app_func->error();
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


$grid->table = "languages";
$grid->set_columns($cols);
$out = $grid->render("languages");




$cid = isset($_REQUEST["lang_id"]) ? intval($_REQUEST["lang_id"]) : (isset($_REQUEST["rowid"]) ? intval($_REQUEST["rowid"]) : 0);
if ($cid > 0) {
    $whr = " where lang_id = $cid ";    
} else {
    $whr = " ";
}

$grid = new jqgrid($db_conf);

$optz["caption"] = "Dictinary";
$optz["resizable"] = true;
$optz["autowidth"] = true;
$optz["autoresize"] = true;
$optz["loadtext"] = $langs['GRID_LOADING_TXT'];
//$opt["autoresize"] = true;
//$opt["export"]["paged"] = "1";
$optz["toolbar"] = "bottom";
$optz["sortorder"] = "ASC"; // ASC or DESC
$optz["sortname"] = 'dict_id,lang_id'; // by default sort grid by this field 
//$optz["datatype"] = "local"; // stop loading detail grid at start 
$optz["rowList"] = array(10,50,100,200,250,'ALL');
$optz["rowNum"] = 10;
$optz["add_options"]["width"] = "800";  // show form navigation
$optz["edit_options"]["width"] = "800";  // show form navigation
$optz["multiselect"] = false; // allow you to multi-select through checkboxes
$optz["reloadedit"] = true;  
//$optz["height"] = "280";
$optz["direction"] = "$lngdir";
$datesxd=date("Y-d");
 $optz["charset"]= "UTF-8";
$optz["form"]["position"] = "center";
//$opt["add_options"]["jqModal"] = true;

//$opt["edit_options"]["jqModal"] = true;
$optz["add_options"]["success_msg"] = "تم اضافة البيانات بنجاح";
$optz["edit_options"]["success_msg"] = "تم تعديل البيانات بنجاح";
$optz["delete_options"]["success_msg"] = "تم حذف البيانات بنجاح"; 
$grid->set_options($optz);

 
//xxxx
$colb = array(); 
$colb["title"] = "PK"; 
$colb["name"] = "pk"; 
$colb["search"] = false;
$colb["export"] = false; 
$colb["hidden"] = true;
$colb["isnull"] = true;
$colb["hidedlg"] = true;
$colb["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing  
$colsb[] = $colb;
    
 

$colb = array();
$colb["title"] = "رقم"; // caption of column
$colb["name"] = "dict_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$colb["editable"] = false;
$colb["search"] = $Search_role;
$colb["export"] = $Export_role;
$colb["sortable"] = $Sortable_role;
$colb["align"] = "center";
$colb["editoptions"] = array("readonly"=>"readonly");  
$colb["width"] = "40";
$colb["show"]["edit"] = false;
$colb["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing
$colsb[] = $colb;
 




$colb = array(); 
$colb["title"] = "اللغة"; 
$colb["name"] = "lang_id";  
$colb["editable"] = true; 
$colb["width"] = "60";  
$colb["stype"] = "select";
$colb["align"] = "center";
$str3 = $grid->get_dropdown_values("select distinct  languages.lang_id as k,  languages.lang_title as v from  languages  ");  
$colb["searchoptions"] =  array( "value"=>":;".$str3);   
$colb["edittype"] = "select"; // render as select 
$str = $grid->get_dropdown_values("select distinct  languages.lang_id as k,  languages.lang_title as v from  languages  ");
$colb["editoptions"] = array( "value"=>":;".$str);           
$colb["editrules"] = array("readonly"=>true);
$colb["formatter"] = "select"; // display label, not value
$colb["search"] = $Search_role;
$colb["export"] = $Export_role;
$colb["sortable"] = $Sortable_role; 
$colb["show"]["edit"] = true;
$colb["show"] = array("list"=>true,"edit"=>true,"add"=>false);
$colsb[] = $colb;


 




  



$colb = array();
$colb["title"] = "shortcode"; // caption of colbumn
$colb["name"] = "shortcode"; // grid colbumn name, must be exactly same as returned colbumn-name from sql (tablefield or field-alias)
$colb["width"] = "110";
$colb["align"] = "center";
$colb["editable"] = true;
$colb["editrules"] = array("required"=>true);
$colb["required"] = true;
$colb["search"] = $Search_role;
$colb["export"] = $Export_role;
$colb["sortable"] = $Sortable_role;
$colb["required"] = true;
$colsb[] = $colb;



$colb = array();
$colb["title"] = "Value"; // caption of colbumn
$colb["name"] = "content"; // grid colbumn name, must be exactly same as returned colbumn-name from sql (tablefield or field-alias)
$colb["width"] = "110";
$colb["align"] = "center";
$colb["editable"] = true; 
$colb["required"] = true;
$colb["search"] = $Search_role;
$colb["export"] = $Export_role;
$colb["sortable"] = $Sortable_role;
$colb["required"] = true;
$colsb[] = $colb;

 
 
 
 

$grid->set_actions(array(
    "add"=>$Add_role, // allow/disallow add
  "edit"=>$Edit_role, // allow/disallow edit
    "delete"=>$Delet_role, // allow/disallow delete
    "rowactions"=>false, // show/hide row wise edit/del/save option
    "search" => "advance", // show single/multi field search condition (e.g. simple or advance)
         "inlineadd" => false,
          "autofilter" => true,
        "showhidecolumns" => $Showhidecolumns ,
          "export_pdf"=>true,
  
           
)
);    
// params are array(<function-name>,<class-object> or <null-if-global-func>,<continue-default-operation>)
// if you pass last argument as true, functions will act as a data filter, and insert/update will be performed by grid 
$e2["on_data_display"] = array("filter_display2", null, true);
$e2["on_insert"] = array("add_data2", null, false);
$e2["on_update"] = array("update_data2", null, false);
$e2["on_delete"] = array("delete_data2", null, false);
$grid->set_events($e2);


//---------------------filter_display funcation start here----------------
function filter_display2($data) 
{ 
    global $app_func;
    
    foreach($data["params"] as &$d) 
    { 
        
        
         
              
   } 

}


function add_data2($data)
{
    global $Applogins_cls, $Add_role, $cid, $app_func;
    $userid = $Applogins_cls->useridx;
  
    if ($Add_role) {
        $shortcode = trim($data["params"]["shortcode"] ?? '');
        $content = trim($data["params"]["content"] ?? '');
        $cat_id = intval($data["params"]["cat_id"] ?? 0);
        $is_act = addslashes($data["params"]["Is_Actieved"] ?? 'Yes');
        $posted_lang_id = intval($data["params"]["lang_id"] ?? 0);
        
        if (empty($shortcode)) {
            phpgrid_error("حقل shortcode مطلوب");
        }
        
        $shortcode_esc = addslashes($shortcode);
        $content_esc = addslashes($content);

        // Check if shortcode already exists
        $chk = $app_func->query("SELECT dict_id FROM languagedictionary WHERE shortcode = '$shortcode_esc'");
        if ($chk && $chk->num_rows > 0) {
            phpgrid_error("رمز الكود (shortcode) مضاف مسبقاً، يرجى اختيار رمز آخر");
        }
        
        $getlan = $app_func->query("SELECT * FROM languages");
        $success = true;
        while ($row = $getlan->fetch_assoc()) {
            $lang_id1 = intval($row['lang_id']);
            $curr_dict_id = $app_func->GetOrderTable('dict_id', 'languagedictionary');
            $lang_content = ($posted_lang_id > 0 && $posted_lang_id != $lang_id1) ? $shortcode_esc : $content_esc;
            $newquerys = "INSERT INTO languagedictionary (dict_id, lang_id, shortcode, content, cat_id, Is_Actieved) VALUES 
('$curr_dict_id', '$lang_id1', '$shortcode_esc', '$lang_content', '$cat_id', '$is_act')";
            $res = $app_func->query($newquerys);
            if (!$res) {
                $success = false;
            }
        }
        if (!$success) {
            $errs = $app_func->error();
            phpgrid_error("حدث خطأ أثناء الإضافة: " . $errs);
        }
    } else {
        phpgrid_error("ليس لديك صلاحية الإضافة");
    }
}

function update_data2($data)
{ 
    global $Applogins_cls, $Edit_role, $cid, $app_func;
    $userid = $Applogins_cls->useridx;

    $pk = $data["pk"] ?? ($data["id"] ?? '');
    $parts = explode("-", $pk);
    $branid = intval($parts[0] ?? 0);
    $langid = intval($parts[1] ?? 0);
    
    if ($Edit_role)
    {
        $allowed = array('shortcode', 'content', 'cat_id', 'Is_Actieved');
        $s = array();
        foreach ($data["params"] as $k => $v)
        {
            if (in_array($k, $allowed)) {
                $v_esc = addslashes($v);
                $s[] = "`$k` = '$v_esc'";
            }
        }
        if (!empty($s) && $branid > 0) {
            $s_str = implode(", ", $s);
            $w = "dict_id = $branid";
            if ($langid > 0) {
                $w .= " AND lang_id = $langid";
            }
            $result = $app_func->query("UPDATE languagedictionary SET $s_str WHERE $w");
            if (!$result) {
                $errs = $app_func->error();
                phpgrid_error("خطأ أثناء التعديل: " . $errs);
            }
        }
    } else {
        phpgrid_error("ليس لديك صلاحية التعديل");
    }
}

//--------------------delete_data2 funcation-----------------------
function delete_data2($data)
{
    global $Applogins_cls, $Delet_role, $app_func;
    if ($Delet_role) {
        $pk = $data["pk"] ?? ($data["id"] ?? '');
        $parts = explode("-", $pk);
        $branid = intval($parts[0] ?? 0);
        if ($branid > 0) {
            $q = $app_func->query("SELECT shortcode FROM languagedictionary WHERE dict_id = $branid");
            if ($q && $row = $q->fetch_assoc()) {
                $shortcode = addslashes($row['shortcode']);
                $app_func->query("DELETE FROM languagedictionary WHERE shortcode = '$shortcode'");
            } else {
                $app_func->query("DELETE FROM languagedictionary WHERE dict_id = $branid");
            }
        }
    } else {
        phpgrid_error("عفواً ليس لديك صلاحية الحذف من هذا الجدول");
    }
}

$grid->select_command = "SELECT  *,concat(dict_id,'-',lang_id) as pk FROM  languagedictionary $whr " ;
$grid->table = "languagedictionary";
$grid->set_columns($colsb);
 
$out_detail = $grid->render("languagedictionary");
















?>
