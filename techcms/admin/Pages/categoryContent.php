<?php 

 
$grid = new jqgrid($db_conf);
 
$opt["caption"] = "ادارة  المنتجات ";
$opt["resizable"] = true;
$opt["autowidth"] = true;
$opt["autoreYoutube"] = true;
$opt["loadtext"] = $langs['GRID_LOADING_TXT'];
$datesxd=date("Y-d");
$reportnamex="Company-Reports-".$datesxd;
$opt["export"] = array("format"=>"pdf", "filename"=>"$reportnamex", "heading"=>"تقرير بفئات البطائق", "orientation"=>"portrait", "paper"=>"a4");
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
$opt["width"] = "500";
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
$col["name"] = "category_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
$col["title"] = " اسم المنتج "; // caption of column
$col["name"] = "category_name"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "180";
$col["align"] = "center";
$col["editable"] = true; 
$col["required"] = true;
$col["search"] = $Search_role;
$col["editrules"] = array("required"=>true);
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true);
$cols[] = $col;



$col = array();
$col["title"] = "نص مختصر "; // caption of column
$col["name"] = "category_short_desc"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["sortable"] = false; // this column is not sortable 
$col["search"] = false; // this column is not searchable 
$col["editable"] = true; 
$col["edittype"] = "textarea"; 
$col["editoptions"] = array("rows"=>5, "cols"=>50); // with these attributes 
//$col["formoptions"] = array("rowpos"=>"3", "colpos"=>"1"); 
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true);
//$col["editoptions"]["dataInit"]="function(el){ setTimeout(function(){ link_tinymce(el); },200); }"; 
$cols[] = $col; 


$col = array();
$col["title"] = "المحتوى"; // caption of column
$col["name"] = "category_content"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["sortable"] = false; // this column is not sortable 
$col["search"] = false; // this column is not searchable 
$col["editable"] = true; 
$col["edittype"] = "textarea"; 
$col["editoptions"] = array("rows"=>15, "cols"=>50); // with these attributes 
//$col["formoptions"] = array("rowpos"=>"3", "colpos"=>"1"); 
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true);
//$col["editoptions"]["dataInit"]="function(el){ setTimeout(function(){ link_tinymce(el); },200); }"; 
$cols[] = $col; 




$col = array();  
$col["name"] ="getimage"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$col["width"] = "50";
$col["editable"] = true;
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true);
$col["editoptions"]["dataInit"] = "function(o){edit_as_custom(o);}";
$cols[] = $col;  
 


$col = array();
$col["title"] = " الصورة  المميزة "; 
$col["name"] = "category_img"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "30";
//$col["editrules"] = array("required"=>true); 
$col["editable"] = true;
$col["edittype"] = "text"; // render as file
//$col["upload_dir"] = "../../uploads/projects"; // upload here
$col["required"] = true;
$col["search"] = false;
$col["export"] = false;
$col["sortable"] = false;
$col["hidedlg"] = true;
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in add/edit dialog
$cols[] = $col;




$col = array();
$col["name"] ="getimages"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$col["width"] = "50";
$col["editable"] = true;
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true);
$col["editoptions"]["dataInit"] = "function(o){edit_as_custom_imgs(o);}";
$cols[] = $col;



$col = array();
$col["title"] = "صور المنتج "; // caption of column
$col["name"] = "category_imgs"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["sortable"] = false; // this column is not sortable
$col["search"] = false; // this column is not searchable
$col["editable"] = true;
$col["edittype"] = "textarea";
$col["editoptions"] = array("rows"=>5, "cols"=>50); // with these attributes
//$col["formoptions"] = array("rowpos"=>"3", "colpos"=>"1");
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true);
//$col["editoptions"]["dataInit"]="function(el){ setTimeout(function(){ link_tinymce(el); },200); }";
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



$col = array();
$col["title"] = "حديثة "; // caption of column
$col["name"] = "is_featured"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["width"] = "60";
$col["edittype"] = "select";
$col["stype"] = "select";
$ty1="نعم";
$ty2="لا";
$col["editoptions"] = array("value"=>"No:لا;Yes:نعم");
$col["searchoptions"]["skipEmpty"]=true ;
$col["editoptions"]["skipEmpty"]=true ;
$col["searchoptions"] = array("value"=>"No:لا;Yes:نعم");
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
$col["title"] = " الصورة المميزة ";
$col["name"] = "type_icon_path";
$col["width"] = "70";
$col["align"] = "center";
$col["isnull"] = true;
$col["editable"] = false;
$col["export"] = false; 
$col["search"] = false;
$col["sortable"] = false;
$col["show"] = array("list"=>true,"edit"=>false,"add"=>false); // only show in listing
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



 


$col = array();
$col["title"] = $langs['ZONE_PAGE_ADDATE']; //  
$col["name"] = "creating_date"; 
$col["align"] = "center";
$col["width"] = "50";
$col["editable"] = true; // this column is editable
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role; 
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
$short_desc_lookup = $grid->get_dropdown_values("select distinct  employees_users.User_id as k,  employees_users.Shown_Name as v from  employees_users  ");  
$col["stype"] = "select";
$col["align"] = "center";  
$col["searchoptions"] = array("value" => ":;".$short_desc_lookup); 
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
    $category_id = $app_func->GetOrderTable('category_id', 'category');

    $activity_id = !empty($data["params"]["activity_id"]) ? intval($data["params"]["activity_id"]) : 1;
    $sector_id = !empty($data["params"]["sector_id"]) ? intval($data["params"]["sector_id"]) : 1;
    $category_name = addslashes($data["params"]["category_name"] ?? '');
    $category_short_desc = addslashes($data["params"]["category_short_desc"] ?? '');
    $category_content = addslashes($data["params"]["category_content"] ?? '');
    $Pathimg = addslashes($data["params"]["category_img"] ?? '');
    $Pathimgs = addslashes($data["params"]["category_imgs"] ?? '');
    $order_id = !empty($data["params"]["order_id"]) ? intval($data["params"]["order_id"]) : 1;
    $is_featured = addslashes($data["params"]["is_featured"] ?? 'No');

    $User_names = addslashes($_SESSION['AppLoginName'] ?? 'admin');
    $mss = date('Y-m-d H:i:s');
    $Is_Actieved = addslashes($data["params"]["Is_Actieved"] ?? 'Yes');

    $result = 0;
    try {
        $getlan = $app_func->query("select * from languages");
        while ($row = $getlan->fetch_assoc()) {
            $lang_id1 = intval($row['lang_id']);
            $newquerys = "INSERT INTO `category`(`category_id`, `activity_id`, `sector_id`, `lang_id`, `category_name`, `category_short_desc`, `category_content`, `category_img`, `category_imgs`, `order_id`, `is_featured`, `creating_date`, `Is_Actieved`, `created_by`, `User_id`) VALUES
('$category_id', '$activity_id', '$sector_id', '$lang_id1', '$category_name', '$category_short_desc', '$category_content', '$Pathimg', '$Pathimgs', '$order_id', '$is_featured', '$mss', '$Is_Actieved', '$User_names', '$userid')";
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
        $empno = intval($data["category_id"] ?? 0);
    }

    $allowed = array('sector_id', 'activity_id', 'category_name', 'category_short_desc', 'category_content', 'category_img', 'category_imgs', 'order_id', 'is_featured', 'Is_Actieved');
    $s = array();
    foreach ($data["params"] as $k => $v) {
        if (in_array($k, $allowed)) {
            $vv = in_array($k, array('sector_id', 'activity_id', 'order_id')) ? (!empty($v) ? intval($v) : 1) : addslashes($v);
            $s[] = "`$k` = '$vv'";
        }
    }
    $s[] = "`Modify_date` = '$mss'";
    $s[] = "`created_by` = '$User_names'";
    $s[] = "`User_id` = '$userid'";
    $s_str = implode(", ", $s);

    $w = "category_id = $empno";
    if ($langid > 0) {
        $w .= " AND lang_id = '$langid'";
    }

    try {
        $result = $app_func->query("UPDATE category SET $s_str WHERE $w");
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
        $category_id= $d["category_id"];
        $isactivs= $d["Is_Actieved"];
        if ($isactivs=="Yes")
        {
            $d["Is_Actieved"] ='فعال';
        }else{
            $d["Is_Actieved"] ='غير فعال';
        }

        $d["type_icon_path"] = techcms_render_grid_image($d["category_img"] ?? "");   
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
        $empno = intval($data["category_id"] ?? 0);
    }

    try {
        $res = $app_func->query("DELETE from category WHERE category_id = $empno");
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

//$grid->select_command = "SELECT  *,concat(lang_id,'-',category_id) as pk FROM  categorys_news " ;
$grid->select_command = "SELECT  *,concat(lang_id,'-',category_id) as pk FROM  category" ;
$grid->table = "category";
$grid->set_columns($cols);
$out = $grid->render("categoryTable");
?>
  