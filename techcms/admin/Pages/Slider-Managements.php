<?php  



  
$grid = new jqgrid($db_conf);
$opt["caption"] = "ادارة سلايدر الصور المتحركة";
$opt["resizable"] = true;
$opt["autowidth"] = true;
$opt["autoresize"] = true;
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
$opt["view_options"]["width"] = "900";  // show form navigation
$opt["add_options"]["width"] = "900";  // show form navigation
$opt["edit_options"]["width"] = "900";  // show form navigation
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
$col["name"] = "Sitem_ID"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["editoptions"] = array("readonly"=>"readonly");  
$col["width"] = "40";
$col["show"]["edit"] = true;
$col["show"] = array("list"=>true,"edit"=>false,"add"=>false); // only show in listing
$cols[] = $col;

 $col = array();
$col["title"] = "اللغة";
$col["name"] = "lang_id";
$col["editable"] = true;
$col["width"] = "60";
$col["stype"] = "select";
$col["align"] = "center";
$str3 = $grid->get_dropdown_values("select distinct  languages.lang_id as k,  languages.lang_title as v from  languages  ");
$col["searchoptions"] =  array( "value"=>":;".$str3);
$col["edittype"] = "select"; // render as select
$str = $grid->get_dropdown_values("select distinct  languages.lang_id as k,  languages.lang_title as v from  languages  ");
$col["editoptions"] = array( "value"=>":;".$str);
$col["editrules"] = array("required"=>true);
$col["formatter"] = "select"; // display label, not value
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"]["edit"] = true;
$col["show"] = array("list"=>true,"edit"=>false,"add"=>false);
$cols[] = $col;



$col = array();
$col["title"] = "العنوان"; // caption of column
$col["name"] = "titles"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "110";
$col["align"] = "center";
$col["editable"] = true;
$col["editrules"] = array("required"=>true);
$col["required"] = true;
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$cols[] = $col;



$col = array();  
$col["name"] ="getimagepaht"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$col["width"] = "50";
$col["editable"] = true;
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true);
$col["editoptions"]["dataInit"] = "function(o){edit_as_custom(o);}";
$cols[] = $col;  

$col = array();
$col["title"] = "صورة السلايدر"; 
$col["name"] = "image";
$col["width"] = "30";
//$col["editrules"] = array("required"=>true); 
$col["editable"] = true;
$col["edittype"] = "text"; // render as file
//$col["upload_dir"] = "../../uploads/sliders_items/Slider"; // upload here
$col["required"] = true;
$col["search"] = false;
$col["export"] = false;
$col["sortable"] = false;
$col["hidedlg"] = true;
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in add/edit dialog
$cols[] = $col;
 


$col = array();
$col["title"] = "صورة الايقونة";
$col["name"] = "type_icon_path2";
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
$col["title"] = "النص رقم 1"; // caption of column
$col["name"] = "text1"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "90";
$col["align"] = "center";
$col["editable"] = true; 
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;

$col["show"] = array("list"=>false,"edit"=>true,"add"=>true); 
$cols[] = $col;

$col = array();
$col["title"] = "النص رقم 2"; // caption of column
$col["name"] = "text2"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "90";
$col["align"] = "center";
$col["editable"] = true; 
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;

$col["show"] = array("list"=>false,"edit"=>true,"add"=>true); 
$cols[] = $col;

$col = array();
$col["title"] = "النص رقم 3"; // caption of column
$col["name"] = "text3"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "90";
$col["align"] = "center";
$col["editable"] = true; 
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;

$col["edittype"] = "textarea"; // render as textarea on edit 
$col["editoptions"] = array("rows"=>5, "cols"=>50); // with these attributes  
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true); 
$cols[] = $col;





$col = array();
$col["title"] = "الرابط"; // caption of column
$col["name"] = "text4"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "90";
$col["align"] = "center";
$col["editable"] = true; 
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;

$col["show"] = array("list"=>false,"edit"=>true,"add"=>true); 
$cols[] = $col;

// $col = array();
// $col["title"] = "النص رقم 4"; // caption of column
// $col["name"] = "text4"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
// $col["width"] = "90";
// $col["align"] = "center";
// $col["editable"] = true; 
// $col["search"] = $Search_role;
// $col["export"] = $Export_role;
// $col["sortable"] = $Sortable_role;

// $col["edittype"] = "textarea"; // render as textarea on edit 
// //$col["editoptions"] = array("rows"=>5, "colxs"=>50); // with these attributes  
// $col["show"] = array("list"=>false,"edit"=>false,"add"=>false); 
// $cols[] = $col;



$col = array();  
$col["name"] ="getimage1"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$col["width"] = "50";
$col["editable"] = true;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false);
$col["editoptions"]["dataInit"] = "function(o){edit_as_custom_img1(o);}";
$cols[] = $col;  

$col = array();
$col["title"] = "صورة 1"; 
$col["name"] = "img1";
$col["width"] = "30";
//$col["editrules"] = array("required"=>true); 
$col["editable"] = true;
$col["edittype"] = "text"; // render as file
//$col["upload_dir"] = "../../uploads/sliders_items/Slider"; // upload here
$col["required"] = true;
$col["search"] = false;
$col["export"] = false;
$col["sortable"] = false;
$col["hidedlg"] = true;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in add/edit dialog
$cols[] = $col;


$col = array();  
$col["name"] ="getimage2"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$col["width"] = "50";
$col["editable"] = true;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false);
$col["editoptions"]["dataInit"] = "function(o){edit_as_custom_img2(o);}";
$cols[] = $col;  

$col = array();
$col["title"] = "صورة 2"; 
$col["name"] = "img2";
$col["width"] = "30";
//$col["editrules"] = array("required"=>true); 
$col["editable"] = true;
$col["edittype"] = "text"; // render as file
//$col["upload_dir"] = "../../uploads/sliders_items/Slider"; // upload here
$col["required"] = true;
$col["search"] = false;
$col["export"] = false;
$col["sortable"] = false;
$col["hidedlg"] = true;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in add/edit dialog
$cols[] = $col;


$col = array();  
$col["name"] ="getimage3"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$col["width"] = "50";
$col["editable"] = true;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false);
$col["editoptions"]["dataInit"] = "function(o){edit_as_custom_img3(o);}";
$cols[] = $col;  

$col = array();
$col["title"] = "صورة  3"; 
$col["name"] = "img3";
$col["width"] = "30";
//$col["editrules"] = array("required"=>true); 
$col["editable"] = true;
$col["edittype"] = "text"; // render as file
//$col["upload_dir"] = "../../uploads/sliders_items/Slider"; // upload here
$col["required"] = true;
$col["search"] = false;
$col["export"] = false;
$col["sortable"] = false;
$col["hidedlg"] = true;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in add/edit dialog
$cols[] = $col;



$col = array();  
$col["name"] ="getimage4"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$col["width"] = "50";
$col["editable"] = true;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false);
$col["editoptions"]["dataInit"] = "function(o){edit_as_custom_img4(o);}";
$cols[] = $col;  

$col = array();
$col["title"] = "صورة  4"; 
$col["name"] = "img4";
$col["width"] = "30";
//$col["editrules"] = array("required"=>true); 
$col["editable"] = true;
$col["edittype"] = "text"; // render as file
//$col["upload_dir"] = "../../uploads/sliders_items/Slider"; // upload here
$col["required"] = true;
$col["search"] = false;
$col["export"] = false;
$col["sortable"] = false;
$col["hidedlg"] = true;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in add/edit dialog
$cols[] = $col;




$col = array();
$col["title"] ="نماذج  العرض"; // caption of column
$col["name"] = "Modals"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["width"] = "50";
$col["edittype"] = "select";
$col["stype"] = "select";  
$ty1="فعال";
$ty2="غير فعال";
$col["editoptions"] = array("value"=>"Modal1:النموذج  1;Modal2:النموذج  2;Modal3:النموذج 3");
$col["searchoptions"]["skipEmpty"]=true ;
$col["editoptions"]["skipEmpty"]=true ;  
$col["searchoptions"] =  array("value"=>"Modal1:النموذج  1;Modal2:النموذج  2;Modal3:النموذج 3");
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["viewable"] = true;
$col["required"] = true;
//$col["hidedlg"] = true;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
$cols[] = $col;



$col = array();
$col["title"] = "صورة  1";
$col["name"] = "type_icon_path11";
$col["width"] = "70";
$col["align"] = "center";
$col["isnull"] = true;
$col["editable"] = false;
$col["export"] = false; 
$col["search"] = false;
$col["sortable"] = false;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
$cols[] = $col;


$col = array();
$col["title"] = "صورة  2";
$col["name"] = "type_icon_path12";
$col["width"] = "70";
$col["align"] = "center";
$col["isnull"] = true;
$col["editable"] = false;
$col["export"] = false; 
$col["search"] = false;
$col["sortable"] = false;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
$cols[] = $col;


 
$col = array();
$col["title"] = "الترتيب" ;// caption of column
$col["name"] = "sorder_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "50";
$col["align"] = "center";
$col["editable"] = true;
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["editrules"] = array("number"=>true,"required"=>false); 
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
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
$col["name"] = "Is_Actived"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["width"] = "50";
$col["edittype"] = "select";
$col["stype"] = "select";  
$ty1="فعال";
$ty2="غير فعال";
$col["editoptions"] = array("value"=>"Yes:مرئي  ;No:مخفي");
$col["searchoptions"]["skipEmpty"]=true ;
$col["editoptions"]["skipEmpty"]=true ;  
$col["searchoptions"] =  array("value"=>"Yes:مرئي;No:مخفي");
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["viewable"] = true;
$col["required"] = true;
//$col["hidedlg"] = true;
$col["show"] = array("list"=>true,"true"=>true,"add"=>true); // only show in listing
$cols[] = $col;

 



$col = array(); 
$col["title"] = "تم التعديل بواسطة "; 
$col["name"] = "Modify_by"; 
$col["dbname"] = "Modify_by";   
$col["editable"] = false; 
$col["width"] = "90";
$client_lookup = $grid->get_dropdown_values("select distinct User_id as k, Shown_Name as v from employees_users ");  
$col["stype"] = "select";
$col["align"] = "center";  
$col["searchoptions"] = array("value" => ":;".$client_lookup); 
$col["edittype"] = "select"; // render as select 
$str = $grid->get_dropdown_values("select distinct User_id as k, Shown_Name as v from employees_users");
$col["editoptions"] = array("value"=>":;".$str);           
$col["formatter"] = "select"; // display label, not value
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role; 
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
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
        global $Applogins_cls,$app_func;

    $userid = intval($Applogins_cls->useridx ?? 1);  
    $Sitem_ID = $app_func->GetOrderTable('Sitem_ID', 'sliders_items');
    $lang_id = intval($data["params"]["lang_id"] ?? 1);
    $titless = addslashes($data["params"]["titles"] ?? '');
    $text1 = str_replace("'", "", $data["params"]["text1"] ?? '');
    $text2 = str_replace("'", "", $data["params"]["text2"] ?? '');   
    $text3 = str_replace("'", "", $data["params"]["text3"] ?? '');
    $text4 = str_replace("'", "", $data["params"]["text4"] ?? '');   
      
    $mss = date('Y-m-d H:i:s');
    $Is_actives = addslashes($data["params"]["Is_Actived"] ?? 'Yes');
    $imagepath = addslashes($data["params"]["image"] ?? '');
    $img1 = addslashes($data["params"]["img1"] ?? '');
    $img2 = addslashes($data["params"]["img2"] ?? '');
    $img3 = addslashes($data["params"]["img3"] ?? '');
    $img4 = addslashes($data["params"]["img4"] ?? '');
    $Modals = addslashes($data["params"]["Modals"] ?? '');
    $sorder_ids = intval($data["params"]["sorder_id"] ?? 1);
    $result=0;
    $getlan=$app_func->query("select * from languages");
     while ($row=$getlan->fetch_assoc()) {
      $lang_id1=$row['lang_id'];
   $newquerys="insert into sliders_items (Sitem_ID,lang_id,titles, image,text1, text2,text3,text4,img1,img2,img3,img4,Modals, Is_Actived,sorder_id,created_by,User_id) values 
('$Sitem_ID','$lang_id1','$titless','$imagepath','$text1','$text2','$text3','$text4','$img1','$img2','$img3','$img4','$Modals','$Is_actives','$sorder_ids','$userid','$userid')";
       $result = $app_func->query($newquerys);
       } 
     
 
if (!$result) {
   
   $errs=$app_func->error();

   $k1="sliders_items_FK";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
    phpgrid_error("السلايدر الرئيسي لم يعد موجوداً او انك لم تقم بتحديده ");
   }
   $k1="sliders_items_Users";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
    phpgrid_error("اسم المستخدم غير موجود في قائمة المستخدمين ");
   }
    
   $msg="خطاء غير متوقع: " .$errs;
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
     
    $allowed = array('titles', 'image', 'text1', 'text2', 'text3', 'text4', 'img1', 'img2', 'img3', 'img4', 'Modals', 'sorder_id', 'Is_Actived');
    $s = array();
    foreach ($data["params"] as $k => $v)
    {
        if (in_array($k, $allowed)) {
            $vv = ($k === 'sorder_id') ? intval($v) : str_replace("'", "", $v);
            $s[] = "`$k` = '$vv'";   
        }
    }

    $s[] = "`Modify_date` = '$mss'";
    $s[] = "`created_by` = '$User_names'";
    $s[] = "`User_id` = '$userid'";
    $s_str = implode(", ", $s); 
   
    $w = "Sitem_ID = $empno AND lang_id = '$langid'";  
    $result = $app_func->query("UPDATE sliders_items SET $s_str WHERE $w");
if (!$result) {
    $errs=$app_func->error();
   $k1="Title_UK";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
phpgrid_error(" يوجد عميل مضاف مسبقاً بهذا الاسم لايُسمح بالتكرار  تاكد من الاسم العربي");
   }
     $errs=$app_func->error();
   $k1="cmpny_name_en_UK";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
phpgrid_error(" يوجد عميل مضاف مسبقاً بهذا الاسم لايُسمح بالتكرار  تاكد من الاسم الانجليزي");
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
   $k1="Is_visible";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
phpgrid_error("رقم الفاكس موجود مسبقاً لايمسح بالتكرار ادخل رقم جديد");
   }
  
   $errs=$app_func->error();

   $msg="خطاء غير متوقع: " .$w;
     phpgrid_error($msg);   
    
}
}

//---------------------filter_display funcation start here----------------
function filter_display($data) 
{ 
    
    foreach($data["params"] as &$d) 
    { 
         $Sitem_ID= $d["Sitem_ID"];
         $isactivs= $d["Is_Actieved"];
        if ($isactivs=="Yes")
        {
           $d["Is_Actieved"] ='فعال';
           
        }else{
            $d["Is_Actieved"] ='غير فعال';
        }
           
 $d["type_icon_path2"] = techcms_render_grid_image($d["image"] ?? "");
                $d["type_icon_path11"] = techcms_render_grid_image($d["img1"] ?? "");
                $d["type_icon_path12"] = techcms_render_grid_image($d["img2"] ?? "");
            
        
    } 
} 


//---------------------delete_data funcation start here----------------

function delete_data($data)
{
 global $Applogins_cls,$app_func;
  list($lang_id,$Sitem_ID) = explode("-",$data["pk"]);

    $langid=$lang_id;
    $empno=$Sitem_ID;
  $res=0;
  $getlan=$app_func->query("select * from languages");
     while ($row=$getlan->fetch_assoc()) {
        $lang_id1=$row['lang_id'];
        $w ="Sitem_ID = $empno and lang_id='$lang_id1' ";
        $res=$app_func->query("DELETE from sliders_items WHERE $w");
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

$grid->select_command = "SELECT  *,concat(lang_id,'-',Sitem_ID) as pk FROM  sliders_items  " ;
$grid->table = "sliders_items";
$grid->set_columns($cols);
$out = $grid->render("sliders_items");










?>