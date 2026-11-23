<?php 
$gridcat = new jqgrid();

$optcat["caption"] = "أعضاء مجلس ادارة  المؤسسة  (الادارات)";
$optcat["resizable"] = true;
$optcat["autowidth"] = true;
$optcat["autoresize"] = true;
$optcat["loadtext"] = $langs['GRID_LOADING_TXT'];
$datesxd=date("Y-d");
$reportnamex="Company-Reports-".$datesxd;
$optcat["export"] = array("format"=>"pdf", "filename"=>"$reportnamex", "heading"=>"تقرير بفئات البطائق", "orientation"=>"portrait", "paper"=>"a4");
//$optcat["export"] = array("format"=>"pdf", "filename"=>"$reportnamex", "heading"=>"تقرير بقائمة المُدن", "orientation"=>"landscape", "paper"=>"a4");
$optcat["export"]["sheetname"] = $reportnamex;
$optcat["export"]["range"] = "filtered"; // or "all"
//$optcat["export"]["paged"] = "1";
$optcat["toolbar"] = "bottom";
$optcat["sortorder"] = "ASC"; // ASC or DESC

$optcat["sortname"] = 'catboard_id,lang_id'; // by default sort grid by this field 
//$optcat["datatype"] = "local"; // stop loading detail grid at start 
$optcat["rowList"] = array(30,50,100,200,250,'ALL');
$optcat["rowNum"] = 20;
$optcat["view_options"]["width"] = "900";  // show form navigation
$optcat["add_options"]["width"] = "900";  // show form navigation
$optcat["edit_options"]["width"] = "900";  // show form navigation
$optcat["multiselect"] = false; // allow you to multi-select through checkboxes 
$optcat["width"] = "900";
$optcat["height"] = "200";
$optcat["direction"] = "$lngdir";
$datesxd=date("Y-d");
$optcat["form"]["position"] = "center";

$optcat["detail_grid_id"] = "boardsmanager";
$optcat["subgridparams"] = "lang_id,catboard_id";
$optcat["form"]["position"] = "center";
//$optcat["add_options"]["jqModal"] = true;
//$optcat["edit_options"]["jqModal"] = true;
$optcat["add_options"]["success_msg"] = "تم اضافة البيانات بنجاح";
$optcat["edit_options"]["success_msg"] = "تم تعديل البيانات بنجاح";
$optcat["delete_options"]["success_msg"] = "تم حذف البيانات بنجاح";    
$gridcat->set_options($optcat);

 

$colcat = array(); 
$colcat["title"] = "PK"; 
$colcat["name"] = "pk"; 
$colcat["search"] = false;
$colcat["export"] = false; 
$colcat["hidden"] = true;
$colcat["isnull"] = true;
$colcat["hidedlg"] = true;
$colcat["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing  
$colxcat[] = $colcat;

   
$colcat = array();
$colcat["title"] = "الرقم"; // caption of colxumn
$colcat["name"] = "catboard_id"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colcat["editable"] = false;
$colcat["search"] = $Search_role;
$colcat["export"] = $Export_role;
$colcat["sortable"] = $Sortable_role;
$colcat["align"] = "center";
$colcat["editoptions"] = array("readonly"=>"readonly");  
$colcat["width"] = "40";
$colcat["show"]["edit"] = false;
//$colcat["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing
$colxcat[] = $colcat;
 



$colcat = array(); 
$colcat["title"] = "اللغة"; 
$colcat["name"] = "lang_id";  
$colcat["editable"] = true; 
$colcat["width"] = "60";  
$colcat["stype"] = "select";
$colcat["align"] = "center";
$str3 = $gridcat->get_dropdown_values("select distinct  languages.lang_id as k,  languages.lang_title as v from  languages  ");  
$colcat["searchoptions"] =  array( "value"=>":;".$str3);   
$colcat["edittype"] = "select"; // render as select 
$str = $gridcat->get_dropdown_values("select distinct  languages.lang_id as k,  languages.lang_title as v from  languages  ");
$colcat["editoptions"] = array( "value"=>":;".$str);           
$colcat["editrules"] = array("required"=>true);
$colcat["formatter"] = "select"; // display label, not value
$colcat["search"] = $Search_role;
$colcat["export"] = $Export_role;
$colcat["sortable"] = $Sortable_role; 
$colcat["show"]["edit"] = true;
$colcat["show"] = array("list"=>true,"edit"=>false,"add"=>false);
$colxcat[] = $colcat;


 

 


$colcat = array();
$colcat["title"] = "اسم الصنف"; // caption of colxumn
$colcat["name"] = "Namecatteam"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colcat["width"] = "110";
$colcat["align"] = "center";
$colcat["editable"] = true; 
$colcat["required"] = true;
$colcat["search"] = $Search_role;
$colcat["export"] = $Export_role;
$colcat["sortable"] = $Sortable_role;
$colcat["show"] = array("list"=>true,"edit"=>true,"add"=>true);
$colxcat[] = $colcat;

 
 
  




$colcat = array();
$colcat["title"] = "الترتيب" ;// caption of colxumn
$colcat["name"] = "order_id"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colcat["width"] = "100";
$colcat["align"] = "center";
$colcat["editable"] = true;
$colcat["editrules"] = array("number"=>true);
$colcat["search"] = $Search_role;
$colcat["export"] = $Export_role;
$colcat["sortable"] = $Sortable_role;
////$colcat["editrules"] = array("email"=>true,"required"=>true); 
$colcat["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing
$colxcat[] = $colcat;


$colcat = array();
$colcat["title"] = "حالة التفعيل"; // caption of colxumn
$colcat["name"] = "Is_Actieved"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colcat["editable"] = true;
$colcat["width"] = "60";
$colcat["edittype"] = "select";
$colcat["stype"] = "select";  
$ty1="نعم";
$ty2="لا";
$colcat["editoptions"] = array("value"=>"Yes:نعم;No:لا");
$colcat["searchoptions"]["skipEmpty"]=true ;
$colcat["editoptions"]["skipEmpty"]=true ;  
$colcat["searchoptions"] =  array("value"=>"Yes:نعم;No:لا");
$colcat["search"] = $Search_role;
$colcat["export"] = $Export_role;
$colcat["sortable"] = $Sortable_role;
$colcat["align"] = "center";
$colcat["viewable"] = false;
$colcat["required"] = true;
//$colcat["hidedlg"] = true;
$colcat["show"] = array("list"=>true,"true"=>true,"add"=>true); // only show in listing
$colxcat[] = $colcat;


// enable inline editing buttons
      

$gridcat->set_actions(array(
    "add"=>$Add_role, // allow/disallow add
  "edit"=>$Edit_role, // allow/disallow edit
    "delete"=>$Delet_role, // allow/disallow delete
    "rowactions"=>false, // show/hide row wise edit/del/save option
    "search" => "advance", // show single/multi field search condition (e.g. simple or advance)
         "inlineadd" => false,
          "autofilter" => true,
         "showhidecolxumns" => $Showhidecolxumns,  
          "view"=>false,
           //"export_excel"=>$Export_role, // export excel button 
                        "export_pdf"=>$Export_role, // export pdf button 
                        //"export_csv"=>$Export_role, // export csv button 
          // "export"=>$Export_role        
)
);

// params are array(<function-name>,<class-object> or <null-if-global-func>,<continue-default-operation>)
// if you pass last argument as true, functions will act as a data filter, and insert/update will be performed by grid


$ecat["on_data_display"] = array("filter_displaycat", null, true); 
$ecat["on_insert"] = array("add_datacat", null, false);
$ecat["on_update"] = array("update_datacat", null, false);
$ecat["on_delete"] = array("delete_datacat", null, false);
$gridcat->set_events($ecat);

 
 

function add_datacat($data)
{ 
  global $Applogins_cls,$app_func;
    $userid=$Applogins_cls->useridx;
  $catboard_id=$app_func->GetOrderTable('catboard_id','cat_boards');
 
$lang_id=$data["params"]["lang_id"];   
$Namecatteam=$data["params"]["Namecatteam"];  
$Is_Actieved=$data["params"]["Is_Actieved"];
$order_id=$data["params"]["order_id"]; 
  
        
        $result =0;
    
     $getlan=$app_func->query("select * from languages");
     while ($row=$getlan->fetch_assoc()) {
      $lang_id1=$row['lang_id'];
$newquerys="insert into  cat_boards (catboard_id,lang_id,Namecatteam,order_id,Is_Actieved) values 
('$catboard_id','$lang_id1','$Namecatteam','$order_id','$Is_Actieved')";
$result = $app_func->query($newquerys);
     }
if (!$result) {
    $errs=$app_func->error(); 
   $k1="Name_UK";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
phpgrid_error(" عفواً يوجد عميل مضاف بنفس الاسم مسبقاً قم بتغيير الاسم");
   }
   
       $errs=$app_func->error();
   $k1="Email_UK";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
phpgrid_error("هذا الايميل مقترن بعميل اخر لايًسمح بالتكرار ادخل ايميل جديد");
   }
   $errs=$app_func->error();
   $k1="Mobile_UK";
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

function update_datacat($data)
{

    global $Applogins_cls,$app_func;
    $userid=$Applogins_cls->useridx;
    $User_names=$_SESSION['AppLoginName'];
   $mss=date('Y-m-d H:i:s');

   list($catboard_id,$lang_id) = explode("-",$data["pk"]);
        $cataid=$catboard_id;
        $langid=$lang_id;
   
  $s = array();
    //$Is_Actievedx='Yes';
  foreach($data["params"] as $k=>$v)
  {
       
        $s[] = "$k = '$v'";
    
       
      
  }
  $s = implode(",",$s); 
  $w = "catboard_id=$cataid and lang_id=$langid   ";  
$result = $app_func->query("UPDATE cat_boards set  $s WHERE $w");  
   if (!$result) {
   
   $errs=$app_func->error();
   phpgrid_error($errs);
   $k1="branchcomp_ibfk_1";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
    phpgrid_error("عفواً التصنيف المختار لم يعد موجوداً");
   }
    
   $msg="خطاء غير متوقع: " .$errs;
     phpgrid_error($msg);   
    
}

     
    
}

//---------------------filter_display1 funcation start here----------------
function filter_displaycat($data) 
{ 
    
    foreach($data["params"] as &$d) 
    { 
         $catboard_id= $d["catboard_id"];
         $isactivs= $d["Is_Actieved"];
        if ($isactivs=="Yes")
        {
           $d["Is_Actieved"] ='فعال';
           
        }else{
            $d["Is_Actieved"] ='غير فعال';
        }
            
 
          
        
        
    } 
} 

//---------------------delete_data1 funcation start here----------------

function delete_datacat($data)
{
   global $Applogins_cls,$app_func;
    list($catboard_id,$lang_id) = explode("-",$data["pk"]);

    $langid=$lang_id;
    $empno=$catboard_id;
    $res=0;
    $getlan=$app_func->query("select * from languages");
    while ($row=$getlan->fetch_assoc()) {
        $lang_id1=$row['lang_id'];
        $w = "catboard_id = $empno and lang_id='$lang_id1' ";
        $res=$app_func->query("DELETE from cat_boards WHERE $w");

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
 

$gridcat->select_command = "SELECT  *,concat(catboard_id,'-',lang_id) as pk FROM  cat_boards  " ;
 
$gridcat->table = "cat_boards";
$gridcat->set_columns($colxcat);
$outcata= $gridcat->render("cat_boardsTABEL");








$idbra= intval($_GET["rowid"]);
$cidbra= intval($_GET["catboard_id"]);
if($cidbra!=""||$cidbra!="n")
{
$whr=" where catboard_id=$cidbra ";    
}else{
    $whr=" ";
}




$grid = new jqgrid();

$opt["caption"] = "اعضاء مجلس ادارة  المؤسسة";

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
$opt["width"] = "900";
//$opt["datatype"] = "local";
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
$col["name"] = "boardm_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
$col["title"] = "القسم "; 
$col["name"] = "catboard_id";  
$col["editable"] = true; 
$col["width"] = "60";  
$col["stype"] = "select";
$col["align"] = "center";
$str3 = $gridcat->get_dropdown_values("select    cat_boards.catboard_id  as k,  cat_boards.Namecatteam as v from  cat_boards    ");  
$col["searchoptions"] =  array( "value"=>":;".$str3);   
$col["edittype"] = "select"; // render as select 
$str = $gridcat->get_dropdown_values("select   cat_boards.catboard_id as k,  cat_boards.Namecatteam as v from  cat_boards     ");

$col["editoptions"] = array( "value"=>":;".$str);           
$col["editrules"] = array("required"=>true);
$col["formatter"] = "select"; // display label, not value
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role; 
$col["show"]["edit"] = true;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true);
$cols[] = $col;
 


$col = array();
$col["title"] = "الاسم"; // caption of column
$col["name"] = "Name_manager"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
$col["title"] = "المنصب "; // caption of column
$col["name"] = "short_desc"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
$col["title"] = "الصفة "; // caption of column
$col["name"] = "Speciality"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
$col["title"] = "الدرجة العلمية"; // caption of column
$col["name"] = "Degrees"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
$col["title"] = "الخبرات"; // caption of column
$col["name"] = "Experience"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "110";
$col["align"] = "center";
$col["editable"] = true; 
$col["required"] = true;
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false);
$cols[] = $col;



$col = array();  
$col["name"] ="getimage"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$col["width"] = "50";
$col["editable"] = true;
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true);
$col["editoptions"]["dataInit"] = "function(o){edit_as_custom(o);}";
$cols[] = $col;  
 
 

$col = array();
$col["title"] = " الصورة المميزة"; 
$col["name"] = "logo"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "30";
//$col["editrules"] = array("required"=>true); 
$col["editable"] = true;
$col["edittype"] = "text"; // render as file
//$col["upload_dir"] = "../../uploads/Partenr"; // upload here
$col["required"] = true;
$col["search"] = false;
$col["export"] = false;
$col["sortable"] = false;
$col["hidedlg"] = true;
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in add/edit dialog
$cols[] = $col;


 

$col = array();
$col["title"] = "فيسبوك" ;// caption of column
$col["name"] = "Facebook"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "100";
$col["align"] = "center";
$col["editable"] = true;
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
////$col["editrules"] = array("email"=>true,"required"=>true); 
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
$cols[] = $col;

//$col["editrules"] = array("number"=>true,"required"=>true,"maxlength"=>4,"minlength"=>4);

 



$col = array();
$col["title"] = "تويتر" ;// caption of column
$col["name"] = "Twitter"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "100";
$col["align"] = "center";
$col["editable"] = true; 
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
////$col["editrules"] = array("email"=>true,"required"=>true); 
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
$cols[] = $col;



$col = array();
$col["title"] = "رابط يوتيوب" ;// caption of column
$col["name"] = "Youtube"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "100";
$col["align"] = "center";
$col["editable"] = true; 
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
////$col["editrules"] = array("email"=>true,"required"=>true); 
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
$cols[] = $col;


$col = array();
$col["title"] = "قوقل بلص" ;// caption of column
$col["name"] = "googleplus"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "100";
$col["align"] = "center";
$col["editable"] = true; 
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
////$col["editrules"] = array("email"=>true,"required"=>true); 
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
$cols[] = $col;


$col = array();
$col["title"] = "الترتيب" ;// caption of colxumn
$col["name"] = "order_id"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$col["width"] = "100";
$col["align"] = "center";
$col["editable"] = true;
$col["editrules"] = array("number"=>true);
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
////$col["editrules"] = array("email"=>true,"required"=>true); 
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing
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
   
   
$boardm_id=$app_func->GetOrderTable('boardm_id','boardsmanager');

$lang_id=$data["params"]["lang_id"]; 
$Name_manager=str_replace("'","",$data["params"]["Name_manager"]); 
$logo=$data["params"]["logo"]; 

 
$Speciality=str_replace("'","",$data["params"]["Speciality"]); 
$Degrees=str_replace("'","",$data["params"]["Degrees"]); 
$Experience=str_replace("'","",$data["params"]["Experience"]); 
$Twitter=$data["params"]["Twitter"];
$Facebook=$data["params"]["Facebook"];
$Youtube=$data["params"]["Youtube"];   
$Is_Actieved=$data["params"]["Is_Actieved"];
$catboard_id=$data["params"]["catboard_id"];
$order_id=$data["params"]["order_id"];
$googleplus=$data["params"]["googleplus"];
$short_desc=str_replace("'","",$data["params"]["short_desc"]);
 

$User_names=$_SESSION['AppLoginName'];
$mss=date('Y-m-d');
$creating_date=$mss;
 $Path = $data["params"]["logo"];     
$result=0;
 
   

  $getlan=$app_func->query("select * from languages");
     while ($row=$getlan->fetch_assoc()) {
      $lang_id1=$row['lang_id'];
$newquerys="insert into boardsmanager (`boardm_id`,`lang_id`, `Name_manager`,`short_desc`,`Experience`,`Degrees`,`Speciality`,`googleplus`,`logo`,`Twitter`, `Youtube`, `Facebook`,`Is_Actieved`,`catboard_id`,`order_id`,`created_by`, `creating_date`, `User_id`) values 
('$boardm_id','$lang_id1','$Name_manager','$short_desc','$Experience','$Degrees','$Speciality','$googleplus','$Path','$Twitter', '$Youtube','$Facebook','$Is_Actieved','$catboard_id','$order_id','$User_names','$creating_date','$userid')";
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
        

    }


}

//---------------------Edit funcation start here----------------

function update_data($data)
{
    global $Applogins_cls,$app_func;
    $userid=$Applogins_cls->useridx;  
    $User_names=$_SESSION['AppLoginName'];
   $mss=date('Y-m-d'); 
     list($lang_id,$boardm_id) = explode("-",$data["pk"]);
  $langid=$lang_id;$empno=$boardm_id;

  
       
  $s = array();
  foreach($data["params"] as $k=>$v)
  {
    
     
    if ($k!="getimage") {
      $vv=str_replace("'","",$v);
       $s[] = "$k = '$vv'";   
    }
        
  }
  $s = implode(",",$s);
    $set=",Modify_date='$mss',created_by='$User_names',User_id='$userid' ";
  $s=$s." ".$set;

  
  $w = "boardm_id = $empno and lang_id='$langid' ";
  
$result = $app_func->query("UPDATE boardsmanager set  $s WHERE $w");
 
if (!$result) {
    $errs=$app_func->error();
   $k1="Name_manager_UK";
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

   $msg="خطاء غير متوقع: " .$errs;
     phpgrid_error($msg);   
    
}
}

//---------------------filter_display funcation start here----------------
function filter_display($data) 
{ 
    
    foreach($data["params"] as &$d) 
    { 
         $boardm_id= $d["boardm_id"];
         $isactivs= $d["Is_Actieved"];

        if ($isactivs=="Yes")
        {
           $d["Is_Actieved"] ='فعال';
           
        }else{
            $d["Is_Actieved"] ='غير فعال';
        }
           
         
         $d["type_icon_path2"] = techcms_render_grid_image($d["logo"] ?? "");

 
      
        
        
    } 
} 


//---------------------delete_data funcation start here----------------

function delete_data($data)
{

  global $Applogins_cls,$app_func;
  list($lang_id,$boardm_id) = explode("-",$data["pk"]);
  $langid=$lang_id;$empno=$boardm_id;
    
  $res=0;
     $getlan=$app_func->query("select * from languages");
     while ($row=$getlan->fetch_assoc()) {
      $lang_id1=$row['lang_id'];
  $w = "boardm_id = $empno and lang_id='$lang_id1' ";
  $res=$app_func->query("DELETE from boardsmanager WHERE $w");

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

$grid->select_command = "SELECT  *,concat(lang_id,'-',boardm_id) as pk FROM  boardsmanager $whr " ;
$grid->table = "boardsmanager";
$grid->set_columns($cols);
$out = $grid->render("boardsmanagerTABLE");
?>
