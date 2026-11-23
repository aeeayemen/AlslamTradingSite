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
$col["name"] = "sector_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
$col["title"] = "اسم  القطاع  "; // caption of column
$col["name"] = "sector_name"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "110";
$col["align"] = "center";
$col["editable"] = true;
$col["editrules"] = array("required"=>true);
$col["required"] = true;
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true);
$cols[] = $col;


$col = array();
$col["title"] = "كلمات مفتاحية "; // caption of column
$col["name"] = "keyword"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["sortable"] = false; // this column is not sortable
$col["search"] = false; // this column is not searchable
$col["editable"] = true;
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>10, "cols"=>50);  
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true); 
$cols[] = $col;


$col = array();
$col["title"] = "نص مختصر  "; // caption of column
$col["name"] = "seo_description"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["sortable"] = false; // this column is not sortable
$col["search"] = false; // this column is not searchable
$col["editable"] = true;
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>10, "cols"=>50);  
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true); 
$cols[] = $col;




$col = array();
$col["title"] = "ظهور في الرئيسية"; // caption of column
$col["name"] = "Is_visible"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
    global $Applogins_cls,$app_func;
    $userid=$Applogins_cls->useridx;
    
  $sector_id=$app_func->GetOrderTable('sector_id','sector');
    $lang_id=$data["params"]["lang_id"];
    $order_id=$data["params"]["order_id"];
    $Is_Actieved=$data["params"]["Is_Actieved"];
    $Is_visible = $data["params"]["Is_visible"];
    $User_names=$_SESSION['AppLoginName'];
    $mss=date('Y-m-d');
    $creating_date=$mss;
    $sector_name=str_replace("'","",$data["params"]["sector_name"]);


$keyword=$data["params"]["keyword"];
$seo_description=$data["params"]["seo_description"];
      
    $result=0;
    $getlan=$app_func->query("select * from languages");
     while ($row=$getlan->fetch_assoc()) {
      $lang_id1=$row['lang_id'];
    
$newquerys="insert into sector (`sector_id`, `lang_id`, `sector_name`,`order_id`,`seo_description`,`keyword`,`Is_Actieved`,`Is_visible`,`created_by`, `creating_date`, `User_id`) values 
('$sector_id','$lang_id1','$sector_name','$order_id','$seo_description','$keyword','$Is_Actieved','$Is_visible','$User_names','$creating_date','$userid')";
         $result = $app_func->query($newquerys);
}

    if (!$result) {
        $errs=$app_func->error();
       
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

    list($lang_id,$sector_id) = explode("-",$data["pk"]);

    $langid=$lang_id;
    $empno=$sector_id;


    $s = array();
    foreach($data["params"] as $k=>$v)
    {


        if ($k!="getimage" && $k!="getimagesector") {
            $vv=str_replace("'","",$v);
            $s[] = "$k = '$vv'";
        }

    }
    $s = implode(",",$s);
    $set=",Modify_date='$mss',created_by='$User_names',User_id='$userid' ";
    $s=$s." ".$set;

    $w = "sector_id=$empno and lang_id='$langid' ";
    $result = $app_func->query("UPDATE sector set  $s WHERE $w");
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
        $sector_id= $d["sector_id"];
        $isactivs= $d["Is_Actieved"];
        if ($isactivs=="Yes")
        {
            $d["Is_Actieved"] ='فعال';

        }else{
            $d["Is_Actieved"] ='غير فعال';
        }



        $d["type_icon_path2"] = techcms_render_grid_image(!empty($d["sector_img"]) ? $d["sector_img"] : ($d["sector_baner"] ?? ""));




    }
}


//---------------------delete_data funcation start here----------------

function delete_data($data)
{
   global $Applogins_cls,$app_func;
    list($lang_id,$sector_id) = explode("-",$data["pk"]);

    $langid=$lang_id;
    $empno=$sector_id;

    $res=0;
    $getlan=$app_func->query("select * from languages");
     while ($row=$getlan->fetch_assoc()) {
        $lang_id1=$row['lang_id'];
        $w = "sector_id = $empno and lang_id='$lang_id1' ";
        $res=$app_func->query("DELETE from sector WHERE $w");
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
$grid->select_command = "SELECT  *,concat(lang_id,'-',sector_id) as pk FROM  sector" ;
$grid->table = "sector";
$grid->set_columns($cols);
$out = $grid->render("sector");
?>
 