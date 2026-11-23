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
$opt["view_options"]["width"] = "500";  // show form navigation
$opt["add_options"]["width"] = "500";  // show form navigation
$opt["edit_options"]["width"] = "500";  // show form navigation
$opt["multiselect"] = false; // allow you to multi-select through checkboxes
$opt["width"] = "500";
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
$col["name"] = "Seo_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
$col["searchoptions"] =  array( "value"=>$str3);
$col["edittype"] = "select"; // render as select
$str = $grid->get_dropdown_values("select distinct  languages.lang_id as k,  languages.lang_title as v from  languages  ");
$col["editoptions"] = array( "value"=>$str);
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
$col["name"] = "SeoTitle"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
$col["title"] = "أسم  الصفحة"; // caption of column
$col["name"] = "SeoPage"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
$col["title"] = "كلمات  مفتاحية  "; // caption of column
$col["name"] = "Seo_keyword"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["sortable"] = false; // this column is not sortable
$col["search"] = false; // this column is not searchable
$col["editable"] = true;
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>10, "cols"=>50); // with these attributes
// connect tinymce
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true);
//$col["editoptions"]["dataInit"] = "function(el){ setTimeout(function(){ link_tinymce(el); },200); }";
$cols[] = $col;




$col = array();
$col["title"] = "نص مختصر   لمحركات البحث  "; // caption of column
$col["name"] = "seo_description"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["sortable"] = false; // this column is not sortable
$col["search"] = false; // this column is not searchable
$col["editable"] = true;
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>10, "cols"=>50); // with these attributes
// connect tinymce
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true);
//$col["editoptions"]["dataInit"] = "function(el){ setTimeout(function(){ link_tinymce(el); },200); }";
$cols[] = $col;





$col = array();
$col["name"] ="getSeoImage"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$col["width"] = "50";
$col["editable"] = true;
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true);
$col["editoptions"]["dataInit"] = "function(o){edit_as_custom(o);}";
$cols[] = $col;



$col = array();
$col["title"] = " صورة";
$col["name"] = "SeoImage"; // grid column name, must be exactly same as returned column-name from sql (
$col["width"] = "30";
//$col["editrules"] = array("required"=>true);
$col["editable"] = true;
$col["edittype"] = "text"; // render as file
//$col["upload_dir"] = "../../uploads/seowebsite"; // upload here
$col["required"] = true;
$col["search"] = false;
$col["export"] = false;
$col["sortable"] = false;
$col["hidedlg"] = true;
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in add/edit dialog
$cols[] = $col;

//$col["editrules"] = array("number"=>true,"required"=>true,"maxlength"=>4,"minlength"=>4);




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
$col["title"] = "حالة التفعيل";
$col["name"] = "Is_Actieved";
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
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing
$cols[] = $col;




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

    $Seo_id=$app_func->GetOrderTable('Seo_id','seowebsite');
    $lang_id=$data["params"]["lang_id"];

    $seo_description=$data["params"]["seo_description"];
    $SeoTitle=str_replace("'","",$data["params"]["SeoTitle"]);
    $Seo_keyword=str_replace("'","",$data["params"]["Seo_keyword"]);
    $Is_Actieved=$data["params"]["Is_Actieved"];
    $SeoPage=str_replace(".php","",$data["params"]["SeoPage"]);
    $Is_visible = $data["params"]["Is_visible"];

    $User_names=$_SESSION['AppLoginName'];
    $mss=date('Y-m-d');
    $creating_date=$mss;
    $SeoImage = $data["params"]["SeoImage"];


    $result=0;
    $getlan=$app_func->query("select * from languages");
    while ($row=$getlan->fetch_assoc()) {
        $lang_id1=$row['lang_id'];


        $result = $app_func->query("insert into seowebsite (`Seo_id`, `lang_id`, `SeoTitle`,`SeoPage`,`seo_description`,`Seo_keyword`, `SeoImage`,`Is_Actieved`) values 
('$Seo_id','$lang_id1','$SeoTitle','$SeoPage','$seo_description','$Seo_keyword','$SeoImage','$Is_Actieved')");

    }

    if (!$result) {
        $errs=$app_func->error();
        $k1="Title_UK";
        $chkrslt=check_error($errs,$k1);
        if($chkrslt)
        {
            phpgrid_error(" عفواً يوجد عميل مضاف بنفس الاسم مسبقاً قم بتغيير الاسم");
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

        $msg="خطاء غير متوقع: " .$errs;
        phpgrid_error($msg);

    }


}

//---------------------Edit funcation start here----------------

function update_data($data)
{
    global $Applogins_cls,$app_func;
    $userid=$Applogins_cls->useridx;

    $mss=date('Y-m-d');

    list($lang_id,$Seo_id) = explode("-",$data["pk"]);

    $langid=$lang_id;
    $empno=$Seo_id;


    $s = array();
    foreach($data["params"] as $k=>$v)
    {


        if ($k!="getSeoImage") {
            $vv=str_replace("'","",$v);
            $s[] = "$k = '$vv'";
        }

    }
    $s = implode(",",$s);
    // $set=",Modify_date='$mss',created_by='$User_names',User_id='$userid' ";
    //$s=$s." ".$set;

    $w = "Seo_id=$empno and lang_id='$langid' ";
    $result = $app_func->query("UPDATE seowebsite set  $s WHERE $w");
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
        $Seo_id= $d["Seo_id"];
        $isactivs= $d["Is_Actieved"];
        if ($isactivs=="Yes")
        {
            $d["Is_Actieved"] ='فعال';

        }else{
            $d["Is_Actieved"] ='غير فعال';
        }



        $d["type_icon_path2"] = techcms_render_grid_image($d["SeoImage"] ?? "");




    }
}


//---------------------delete_data funcation start here----------------

function delete_data($data)
{
    global $Applogins_cls,$app_func;
    list($lang_id,$Seo_id) = explode("-",$data["pk"]);

    $langid=$lang_id; $empno=$Seo_id;

    $res=0;
    $getlan=$app_func->query("select * from languages");
    while ($row=$getlan->fetch_assoc()) {
        $lang_id1=$row['lang_id'];
        $w = "Seo_id = $empno and lang_id='$lang_id1' ";
        $res=$app_func->query("DELETE from seowebsite WHERE $w");
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


$grid->select_command = "SELECT  *,concat(lang_id,'-',Seo_id) as pk FROM  seowebsite  " ;
$grid->table = "seowebsite";
$grid->set_columns($cols);
$out = $grid->render("seowebsite");
?>
