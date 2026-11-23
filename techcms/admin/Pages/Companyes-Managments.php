<?php 
   
$grid = new jqgrid($db_conf); 
$opt["caption"] =$DetailPage['Page_name_ar'];
$opt["resizable"] = true;
$opt["autowidth"] = true;
$opt["autoresize"] = true;
$opt["loadtext"] = $langs['GRID_LOADING_TXT'];
//$opt["autoresize"] = true;
//$opt["export"]["paged"] = "1";
$opt["toolbar"] = "bottom";
$opt["sortorder"] = "ASC"; // ASC or DESC
$opt["sortname"] = 'company_id,lang_id'; // by default sort grid by this field 
//$opt["datatype"] = "local"; // stop loading detail grid at start 
$opt["rowList"] = array(10,50,100,200,250,'ALL');
$opt["rowNum"] = 10;
$opt["add_options"]["width"] = "800";  // show form navigation
$opt["edit_options"]["width"] = "800";  // show form navigation
$opt["multiselect"] = false; // allow you to multi-select through checkboxes
$opt["reloadedit"] = true;  
$opt["height"] = "280";
$opt["direction"] = "$lngdir";
$datesxd=date("Y-d");
$opt["detail_grid_id"] = "branchcomp";
$opt["subgridparams"] = "lang_id,company_id";
$opt["form"]["position"] = "center";
//$opt["add_options"]["jqModal"] = true;

//$opt["edit_options"]["jqModal"] = true;
$opt["add_options"]["success_msg"] = "تم اضافة البيانات بنجاح";
$opt["edit_options"]["success_msg"] = "تم تعديل البيانات بنجاح";
$opt["delete_options"]["success_msg"] = "تم حذف البيانات بنجاح";
 
  
$grid->set_options($opt);

 
//xxxx
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
$colx["name"] = "company_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$colx["editable"] = false;
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
$colx["align"] = "center";
$colx["editoptions"] = array("readonly"=>"readonly");  
$colx["width"] = "40";
$colx["show"]["edit"] = false;
$colx["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing
$cols2[] = $colx;
 




$colx = array(); 
$colx["title"] = "اللغة"; 
$colx["name"] = "lang_id";  
$colx["editable"] = true; 
$colx["width"] = "60";  
$colx["stype"] = "select";
$colx["align"] = "center";
$str3 = $grid->get_dropdown_values("select distinct  languages.lang_id as k,  languages.lang_title as v from  languages  ");  
$colx["searchoptions"] =  array( "value"=>":;".$str3);   
$colx["edittype"] = "select"; // render as select 
$str = $grid->get_dropdown_values("select distinct  languages.lang_id as k,  languages.lang_title as v from  languages  ");
$colx["editoptions"] = array( "value"=>":;".$str);           
$colx["editrules"] = array("required"=>true);
$colx["formatter"] = "select"; // display label, not value
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role; 
$colx["show"]["edit"] = true;
$colx["show"] = array("list"=>true,"edit"=>false,"add"=>false);
$cols2[] = $colx;


  


$colx = array();
$colx["title"] = "الأسم"; // caption of colxumn
$colx["name"] = "Name"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "110";
$colx["align"] = "center";
$colx["editable"] = true;
$colx["editrules"] = array("required"=>true);
$colx["required"] = true;
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
$cols2[] = $colx;




 

$colx = array();
$colx["title"] = "العنوان"; // caption of colxumn
$colx["name"] = "Address"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["editable"] = true;
$colx["align"] = "center";
$colx["edittype"] = "textarea";
$colx["editoptions"] = array("rows"=>3, "cols2"=>20);
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
$colx["align"] = "center";
$colx["width"] = "150";
$colx["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing
$cols2[] = $colx;


 

$colx = array();
$colx["title"] = " رقم الهاتف" ;// caption of colxumn
$colx["name"] = "Phone"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "100";
$colx["align"] = "center";
$colx["editable"] = true;
$colx["edittype"] = "text";
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
//$colx["editrules"] = array("number"=>true,"required"=>false); 
$colx["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing
$cols2[] = $colx;
  

$colx = array();
$colx["title"] = "هاتف   2" ;// caption of colxumn
$colx["name"] = "Phone1"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "100";
$colx["align"] = "center";
$colx["editable"] = true;
$colx["edittype"] = "text";
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
//$colx["editrules"] = array("number"=>true,"required"=>false); 
$colx["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
$cols2[] = $colx;
  
  $colx = array();
$colx["title"] = "هاتف 3" ;// caption of colxumn
$colx["name"] = "Phone2"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "100";
$colx["align"] = "center";
$colx["editable"] = true;
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
//$colx["editrules"] = array("number"=>true,"required"=>true,"maxlength"=>12,"minlength"=>9); 
$colx["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
$cols2[] = $colx;
  
  $colx = array();
$colx["title"] = "رقم الجوال" ;// caption of colxumn
$colx["name"] = "Mobile"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "100";
$colx["align"] = "center";
$colx["editable"] = true;
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
//$colx["editrules"] = array("number"=>true,"required"=>true,"maxlength"=>12,"minlength"=>9); 
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$cols2[] = $colx;



$colx = array();
$colx["title"] = "فاكس" ;// caption of colxumn
$colx["name"] = "Fax"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "100";
$colx["align"] = "center";
$colx["editable"] = true;
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
//$colx["editrules"] = array("number"=>true,"required"=>false); 
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$cols2[] = $colx;



$colx = array();
$colx["title"] = "1- البريد الاكتروني" ;// caption of colxumn
$colx["name"] = "Email"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "100";
$colx["align"] = "center";
$colx["editable"] = true;
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
////$colx["editrules"] = array("email"=>true,"required"=>true); 
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$cols2[] = $colx;


$colx = array();
$colx["title"] = "2-بريد الكتروني " ;// caption of colxumn
$colx["name"] = "Email2"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "100";
$colx["align"] = "center";
$colx["editable"] = true;
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
////$colx["editrules"] = array("email"=>true,"required"=>true); 
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$cols2[] = $colx;

$colx = array();
$colx["title"] = "تظمين الموقع الجغرافي" ;// caption of colxumn
$colx["name"] = "geoglocation"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "100";
$colx["align"] = "center";
$colx["editable"] = true;
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;

$colx["edittype"] = "textarea";
$colx["editoptions"] = array("rows"=>5, "cols2"=>20);
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$cols2[] = $colx;


$colx = array();
$colx["title"] = "صندوق البريد" ;// caption of colxumn
$colx["name"] = "box"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "100";
$colx["align"] = "center";
$colx["editable"] = true;
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role; 
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$cols2[] = $colx;


 
 


$colx = array();
$colx["title"] = "فيسبوك" ;// caption of colxumn
$colx["name"] = "Facebook"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "100";
$colx["align"] = "center";
$colx["editable"] = true;
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
////$colx["editrules"] = array("email"=>true,"required"=>true); 
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$cols2[] = $colx;

//$colx["editrules"] = array("number"=>true,"required"=>true,"maxlength"=>4,"minlength"=>4);

 



$colx = array();
$colx["title"] = "تويتر" ;// caption of colxumn
$colx["name"] = "Twitter"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "100";
$colx["align"] = "center";
$colx["editable"] = true; 
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
////$colx["editrules"] = array("email"=>true,"required"=>true); 
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$cols2[] = $colx;



$colx = array();
$colx["title"] = "يوتيوب" ;// caption of colxumn
$colx["name"] = "Youtube"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "100";
$colx["align"] = "center";
$colx["editable"] = true; 
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
////$colx["editrules"] = array("email"=>true,"required"=>true); 
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$cols2[] = $colx;


$colx = array();
$colx["title"] = "قوقل بلص" ;// caption of colxumn
$colx["name"] = "googleplus"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "100";
$colx["align"] = "center";
$colx["editable"] = true; 
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
////$colx["editrules"] = array("email"=>true,"required"=>true); 
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$cols2[] = $colx;



$colx = array();
$colx["title"] = "انسقرام" ;// caption of colxumn
$colx["name"] = "instagram"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "100";
$colx["align"] = "center";
$colx["editable"] = true; 
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
////$colx["editrules"] = array("email"=>true,"required"=>true); 
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$cols2[] = $colx;

$colx = array();
$colx["title"] = "نبذة مختصرة"; // caption of colxumn
$colx["name"] = "short_desc"; //
$colx["editable"] = true;
$colx["align"] = "center";
$colx["edittype"] = "textarea";
$colx["editoptions"] = array("rows"=>3, "cols2"=>20);
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
$colx["align"] = "center";
$colx["width"] = "70";
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$cols2[] = $colx;


$colx = array();
$colx["title"] = "محتوي"; // caption of colxumn
$colx["name"] = "content"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "80";
$colx["align"] = "center"; 
//$colx["editrules"] = array("required"=>true); 
//$colx["formatter"] = "wysiwyg";

$colx["sortable"] = false; // this column is not sortable 
$colx["search"] = false; // this column is not searchable 
$colx["editable"] = true; 
$colx["edittype"] = "textarea"; // render as textarea on edit 
$colx["editoptions"] = array("rows"=>10, "cols"=>50); // with these attributes 
// connect tinymce 
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true);
//$colx["editoptions"]["dataInit"]="function(el){ setTimeout(function(){ link_tinymce(el); },200); }";  
$cols2[] = $colx;

 
 


 
 

$colx = array();
$colx["width"] = "50";
$colx["name"] = "smalllogo";
$colx["editable"] = true;
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true);
$colx["editoptions"]["dataInit"] = "function(o){edit_as_customlogo(o);}";
$cols2[] = $colx;  


$colx = array();
$colx["title"] = "الشعار"; 
$colx["name"] = "logo"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "30";
//$colx["editrules"] = array("required"=>true); 
$colx["editable"] = true;
$colx["edittype"] = "text"; // render as file
//$colx["upload_dir"] = "../../uploads/companyes"; // upload here
$colx["required"] = true;
$colx["search"] = false;
$colx["export"] = false;
$colx["sortable"] = false;
$colx["hidedlg"] = true; 
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in add/edit dialog
$cols2[] = $colx;



$colx = array();
$colx["width"] = "50";
$colx["name"] = "imgbanner";
$colx["editable"] = true;
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true);
$colx["editoptions"]["dataInit"] = "function(o){edit_as_customimbanner(o);}";
$cols2[] = $colx;  


$colx = array();
$colx["title"] = "صورة غلاف"; 
$colx["name"] = "Image_banner"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "30";
//$colx["editrules"] = array("required"=>true); 
$colx["editable"] = true;
$colx["edittype"] = "text"; // render as file
//$colx["upload_dir"] = "../../uploads/companyes"; // upload here
$colx["required"] = true;
$colx["search"] = false;
$colx["export"] = false;
$colx["sortable"] = false;
$colx["hidedlg"] = true;
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in add/edit dialog
$cols2[] = $colx;


 
 


$colx = array();
$colx["title"] = "الشعار";
$colx["name"] = "type_icon_path2";
$colx["width"] = "70";
$colx["align"] = "center";
$colx["isnull"] = true;
$colx["editable"] = false;
$colx["export"] = false; 
$colx["search"] = false;
$colx["sortable"] = false;
$colx["show"] = array("list"=>true,"edit"=>false,"add"=>false); // only show in listing
$cols2[] = $colx;


 


$colx = array();
$colx["title"] = "صورة الغلاف";
$colx["name"] = "type_icon_path3";
$colx["width"] = "70";
$colx["align"] = "center";
$colx["isnull"] = true;
$colx["editable"] = false;
$colx["export"] = false; 
$colx["search"] = false;
$colx["sortable"] = false;
$colx["show"] = array("list"=>true,"edit"=>false,"add"=>false); // only show in listing
$cols2[] = $colx;


 
 


$colx = array();
$colx["title"] = "الترتيب"; // caption of colxumn
$colx["name"] = "order_id"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "110";
$colx["align"] = "center";
$colx["editable"] = true;
 $colx["required"] = true;
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
$colx["show"] = array("list"=>false,"edit"=>false,"add"=>false);
$cols2[] = $colx;

 
 
$colx = array();
 $colx["title"] = "كلمات   مفتاحية لمحركات البحث"; 
$colx["name"] = "keyword"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "30";
//$colx["editrules"] = array("required"=>true); 
$colx["editable"] = true;
$colx["edittype"] = "textarea"; // render as file
$colx["required"] = true;
$colx["search"] = false;
$colx["editoptions"] = array("rows"=>5, "cols"=>50);
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in add/edit dialog
$cols2[] = $colx;


$colx = array();
 $colx["title"] = "وصف لمحركات البحث"; // caption of colxumn
$colx["name"] = "seo_description"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
 
$colx["width"] = "30";
//$colx["editrules"] = array("required"=>true); 
$colx["editable"] = true;
$colx["edittype"] = "textarea"; // render as file
$colx["required"] = true;
$colx["search"] = false;
$colx["editoptions"] = array("rows"=>5, "cols"=>50);
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in add/edit dialog
$cols2[] = $colx;
 



 
 


$colx = array();
$colx["title"] = "اسم  المدير العام" ;// caption of colxumn
$colx["name"] = "dirctorName"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "100";
$colx["align"] = "center";
$colx["editable"] = true;
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
////$colx["editrules"] = array("email"=>true,"required"=>true); 
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$cols2[] = $colx;

//$colx["editrules"] = array("number"=>true,"required"=>true,"maxlength"=>4,"minlength"=>4);

 



$colx = array();
$colx["title"] = "سالة المدير  العام" ;// caption of colxumn
$colx["name"] = "MessageDirctor"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "100";
$colx["align"] = "center";
$colx["editable"] = true; 
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
 
$colx["edittype"] = "textarea"; // render as textarea on edit 
$colx["editoptions"] = array("rows"=>10, "cols"=>50);   
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$cols2[] = $colx;

$colx = array();
$colx["width"] = "50";
$colx["name"] = "imgDirctor";
$colx["editable"] = true;
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true);
$colx["editoptions"]["dataInit"] = "function(o){edit_as_customIMageDirctor(o);}";
$cols2[] = $colx;  


$colx = array();
$colx["title"] = "صورة المدير العام" ;// caption of colxumn
$colx["name"] = "ImageDirctor"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["width"] = "100";
$colx["align"] = "center";
$colx["editable"] = true; 
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
////$colx["editrules"] = array("email"=>true,"required"=>true); 
$colx["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in listing
$cols2[] = $colx;


$colx = array();
$colx["title"] = "صورة المدير العام";
$colx["name"] = "type_icon_path3";
$colx["width"] = "70";
$colx["align"] = "center";
$colx["isnull"] = true;
$colx["editable"] = false;
$colx["export"] = false; 
$colx["search"] = false;
$colx["sortable"] = false;
$colx["show"] = array("list"=>true,"edit"=>false,"add"=>false); // only show in listing
$cols2[] = $colx;

 


$colx = array();
$colx["title"] = "التفعيل"; // caption of colxumn
$colx["name"] = "Is_Actieved"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["editable"] = true;
$colx["width"] = "60";
$colx["edittype"] = "select";
$colx["stype"] = "select"; 
$colx["editoptions"] = array("value"=>"Yes:نعم;No:لا");
$colx["searchoptions"]["skipEmpty"]=true ;
$colx["editoptions"]["skipEmpty"]=true ;  
$colx["searchoptions"] =  array("value"=>"Yes:نعم;No:لا");
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
$colx["align"] = "center";
$colx["viewable"] = false;
$colx["required"] = true;
//$colx["hidedlg"] = true;
$colx["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
$cols2[] = $colx;


$colx = array();
$colx["title"] = "تفعيل التوظيف"; // caption of colxumn
$colx["name"] = "job_active"; // grid colxumn name, must be exactly same as returned colxumn-name from sql (tablefield or field-alias)
$colx["editable"] = true;
$colx["width"] = "60";
$colx["edittype"] = "select";
$colx["stype"] = "select"; 
$colx["editoptions"] = array("value"=>"Yes:نعم;No:لا");
$colx["searchoptions"]["skipEmpty"]=true ;
$colx["editoptions"]["skipEmpty"]=true ;  
$colx["searchoptions"] =  array("value"=>"Yes:نعم;No:لا");
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
$colx["align"] = "center";
$colx["viewable"] = false;
$colx["required"] = true;
//$colx["hidedlg"] = true;
$colx["show"] = array("list"=>true,"true"=>true,"add"=>true); // only show in listing
$cols2[] = $colx;




$colx = array();
$colx["title"] = $langs['ZONE_PAGE_ADDATE']; //  
$colx["name"] = "creating_date"; 
$colx["align"] = "center";
$colx["width"] = "50";
$colx["editable"] = true; // this colxumn is editable
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
$colx["show"] = array("list"=>true,"edit"=>false,"add"=>false); // only show in add/edit dialog
$colx["formatoptions"] = array("srcformat"=>'Y-m-d',"newformat"=>'Y-m-d');
$colx["formatter"] = "date"; // format as date
$colx["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing
$cols2[] = $colx;


$colx = array();
$colx["title"] = $langs['City_PAGE_EDTDATE']; //  
$colx["name"] = "Modify_date"; 
$colx["align"] = "center";
$colx["width"] = "50";
$colx["editable"] = true; // this colxumn is editable
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
$colx["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in add/edit dialog
$colx["formatoptions"] = array("srcformat"=>'Y-m-d',"newformat"=>'Y-m-d');
$colx["formatter"] = "date"; // format as date
$cols2[] = $colx;






$colx = array();
$colx["title"] = " اسم المستخدم  ";
$colx["name"] = "User_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$colx["width"] = "60";
$client_lookup = $grid->get_dropdown_values("select distinct  employees_users.User_id as k,  employees_users.Shown_Name as v from  employees_users  ");  
$colx["stype"] = "select";
$colx["align"] = "center";  
$colx["searchoptions"] = array("value" => ":;".$client_lookup); 
$colx["search"] = $Search_role;
$colx["export"] = $Export_role;
$colx["sortable"] = $Sortable_role;
$colx["editable"] = false;
$colx["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in listing 
$cols2[] = $colx;



 


$grid->set_actions(array(
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
$e1["on_data_display"] = array("filter_display", null, true);
$e1["on_insert"] = array("add_data", null, false);
$e1["on_update"] = array("update_data", null, false);
$e1["on_delete"] = array("delete_data", null, false);
$grid->set_events($e1);

//---------------------filter_display funcation start here----------------
function filter_display($data) 
{ 
    global $app_func;
    
    foreach($data["params"] as &$d) 
    { 
        
         
     $company_id= $d["company_id"];

         $isactivs= $d["Is_Actieved"];

        if ($isactivs=="Yes")
        {
           $d["Is_Actieved"] ='فعال';
           
        }else{
            $d["Is_Actieved"] ='غير فعال';
        }
           
     

 $d["type_icon_path2"] = techcms_render_grid_image($d["logo"] ?? "");
                $d["type_icon_path3"] = techcms_render_grid_image($d["Image_banner"] ?? "");
 
 
              
} 

}
 
//-------------------------Add funcation --------------------------

function add_data($data)
{
     global $Applogins_cls,$Add_role,$cid;
    $userid=$Applogins_cls->useridx;
  

   
}
//---------------------Edit funcation start here----------------



function update_data($data)
{ 
    global $Applogins_cls,$Edit_role,$cid;
        global $app_func;
    $userid=$Applogins_cls->useridx;
      $User_names=$_SESSION['AppLoginName'];
   $mss=date('Y-m-d H:i:s');
 $lang_id=$data['params']['lang_id'];
  $company_id=$data['params']['company_id'];
 
   //phpgrid_error($company_id);   
 $s = array();
 
 foreach($data["params"] as $k=>$v)
 {

 	 if ($k!="smalllogo" && $k!="imgbanner" &&  $k!="imgDirctor") {
 	 	 
   		$vv=str_replace("'","",$v);
       $s[] = "$k = '$vv'";  	
 	 }
        
       
     
 }
 
    
    $mss=date('Y-m-d H:i:s');
    $set=",Modify_by='$userid',Modify_date='$mss' ";
     
  
 $s = implode(",",$s);
 $s=$s." ".$set;

 
 $w = "company_id=$company_id and lang_id=$lang_id   ";
      
$result = $app_func->query("UPDATE companyes set  $s WHERE $w");
 
 
   if (!$result) {
   
   $errs=$app_func->error();
   phpgrid_error($errs);
   $k1="companyes_ibfk_1";
   $chkrslt=$app_func->check_error($errs,$k1);
   if($chkrslt)
   {
      phpgrid_error("عفواً التصنيف المختار لم يعد موجوداً");
   }
    
   $msg="خطاء غير متوقع: " .$errs;
     phpgrid_error($msg);   
    
}
 

}

//--------------------delete_data2 funcation-----------------------
function delete_data($data)
{
       global $Applogins_cls,$Delet_role;
      global $app_func;
    $userid=$Applogins_cls->useridx;
   list($company_id,$lang_id) = explode("-",$data["pk"]);
        $companyid=$company_id;
        $langid=$lang_id;
    if($Delet_role)
    {  
    $User_names=$_SESSION['AppLoginName'];
   $mss=date('Y-m-d H:i:s');
 $city=$data["company_id"];
 $lang_id= $data["lang_id"];

  $res=0;
     $getlan=$app_func->query("select * from languages");
     while ($row=$getlan->fetch_assoc()) {
      $lang_id1=$row['lang_id'];
 $w = "company_id =$companyid and lang_id=$lang_id1 ";
 $res=$app_func->query("DELETE from companyes WHERE $w");
}
    
    if (!$res) {
  $errs=$app_func->error();
    if ($errnos==1451){
    $msg="لايمكن حذف هذا السجل نظراً لوجود بيانات مرتبه به في جداول اخرى";
     phpgrid_error($msg); 
   }else{
    $msg="حدث خطاء غير متوقع رقم الخطاء:".$errnos."  msg".$errs;
   }
   
        }else{
            
        }
  }else{
     $msg="غفواً ليس لديك الصلاحية للحذف من هذا الجدول ";
    }

}

$grid->select_command = "SELECT  *,concat(company_id,'-',lang_id) as pk FROM  companyes  " ;
$grid->table = "companyes";
$grid->set_columns($cols2);
$out= $grid->render("companyes");

 
 

?>
 