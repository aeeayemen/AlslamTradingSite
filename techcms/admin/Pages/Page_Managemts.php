<?php 
$grid = new jqgrid($db_conf); 
$opt["caption"] =$DetailPage['Page_name_ar'];
$opt["resizable"] = true;
$opt["autowidth"] = true;
$opt["autoresize"] = false;
$opt["loadtext"] = $langs['GRID_LOADING_TXT'];
$datesxd=date("Y-d");
$reportnamex="Years-Reports-".$datesxd;
$opt["export"] = array("format"=>"pdf", "filename"=>"$reportnamex", "heading"=>"تقرير بقائمة السنوات", "orientation"=>"portrait", "paper"=>"a4");
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
$col["title"] = "رقم الصفحة ";// caption of column
$col["name"] = "Page_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
$col["title"] = "فئة الصفحة "; 
$col["name"] = "Cat_id";  
$col["editable"] = true; 
$col["width"] = "60";
$client_lookup = $grid->get_dropdown_values("select distinct  app_pages_categories.Cat_id as k,  app_pages_categories.Cat_title_ar as v from  app_pages_categories where Is_Enabled='1' ");  
$col["stype"] = "select";
$col["align"] = "center";  
$col["searchoptions"] = array("value" => ":;".$client_lookup); 
$col["edittype"] = "select"; // render as select 
$str = $grid->get_dropdown_values("select distinct  app_pages_categories.Cat_id as k,  app_pages_categories.Cat_title_ar as v from  app_pages_categories where Is_Enabled='1' ");
$col["editoptions"] = array( "value"=>":;".$str);           
$col["editrules"] = array("required"=>true);
$col["formatter"] = "select"; // display label, not value
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role; 
$col["show"]["edit"] = true;
$cols[] = $col;
   

$col = array();
$col["title"] = "اسم الملف"; // caption of column
$col["name"] = "Page_filename"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "50";
$col["align"] = "center";
$col["required"] = true;
$col["editrules"] = array("required"=>true);
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["editable"] = true;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing 
$cols[] = $col;

$col = array();
$col["title"] = "اسم الصفحة عربي"; // caption of column
$col["name"] = "Page_name_ar"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "50";
$col["align"] = "center";
$col["required"] = true;
$col["editrules"] = array("required"=>true);
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["editable"] = true;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing 
$cols[] = $col;

$col = array();
$col["title"] = "اسم الصفحة - انجليزي"; // caption of column
$col["name"] = "Page_name_en"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "50";
$col["align"] = "center";
$col["required"] = true;
$col["editrules"] = array("required"=>true);
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["editable"] = true;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing 
$cols[] = $col;



$col = array();
$col["title"] = " ايقونة الملف"; 
$col["name"] = "menu_icon"; // grid column name, must be exactly same as returned column-name from sql ( 
$col["width"] = "10";
//$col["editrules"] = array("required"=>true); 
$col["editable"] = true;
$col["edittype"] = "text"; // render as file 
$col["required"] = true;
$col["search"] = false;
$col["export"] = false;
$col["sortable"] = false;
$col["hidedlg"] = true;
$col["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in add/edit dialog
$cols[] = $col;
 

 







$col = array();
$col["title"] = "ترتيب الصفحة" ;// caption of column
$col["name"] = "Menu_order"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "30";
$col["align"] = "center";
$col["editable"] = true;
$col["editrules"] = array("number"=>true);
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;  
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing
$cols[] = $col;







$col = array();
$col["title"] = "نوع الصفحة"; // caption of column
$col["name"] = "page_type"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["width"] = "60";
$col["edittype"] = "select";
$col["stype"] = "select";   
$col["editoptions"] = array("value"=>"Admin:Admin;Clients:Clients;Provider:Provider;Marketer:Marketer;Developer:Developer");
$col["searchoptions"]["skipEmpty"]=true ;
$col["editoptions"]["skipEmpty"]=true ;  
$col["searchoptions"] =  array("value"=>"Admin:Admin;Clients:Clients;Provider:Provider;Marketer:Marketer;Developer:Developer");
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["viewable"] = false;
$col["required"] = true;
//$col["hidedlg"] = true;
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
        "showhidecolumns" => true,  
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
    
        global $Applogins_cls,$app_func;
 $Page_id=$app_func->GetOrderTable('Page_id','app_pages');
   
    
$Cat_id=$data["params"]["Cat_id"];
// $Menu_order=0;
// $result=$app_func->query("SELECT MAX(Menu_order)+1 AS NB FROM  app_pages where Cat_id=$Cat_idx");
//  while ($row = mysql_fetch_assoc($result)) {
//     if($row["NB"]>0)
//     {
//    $Menu_order= $row["NB"];     
//     }else{
//         $Menu_order= 0;
//     }
//  }
  $Page_filenamex=$data["params"]["Page_filename"];
$Page_name_arx=$data["params"]["Page_name_ar"];
$Page_name_en=$data["params"]["Page_name_en"];
 $menu_icon = $data["params"]["menu_icon"]; 
 $Menu_order=$data["params"]["Menu_order"];
 $page_type=$data["params"]["page_type"]; 

  

$newquerys="insert into app_pages (`Page_id`,`Cat_id`, `Page_filename`, `Page_name_ar`,`Page_name_en`,`Menu_order`,`menu_icon`,`page_type`) values 
('$Page_id','$Cat_id','$Page_filenamex','$Page_name_arx','$Page_name_en','$Menu_order','$menu_icon','$page_type')";
 
$result = $app_func->query($newquerys);
 
if (!$result) {
   
   $errs=$app_func->error();
   $k1="Page_name_ar_UK";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
    phpgrid_error("تم اضافةهذا الاسم مسبقاً لايُسمح بالتكرار  تاكد من التسمية عربي ");
   }
   $k1="Page_name_en_UK";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
    phpgrid_error("تم اضافةهذا الاسم مسبقاً لايُسمح بالتكرار  تاكد من التسمية -انجليزي ");
   }
     $k1="Page_filename";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
    phpgrid_error("تم اضافة هذه الصفحة مسبقاً لايمسح بالتكرار ");
   }
   $msg="Invalid query: " .$app_func->error;
     phpgrid_error($msg);   
    
}
else{
  $path="";
  $section="";
  $innerContent="";
  if ($page_type=="Provider") {
    $innerContent="Content";
     $path='../Provider/';
      $section="../Provider/sections/";
  }elseif ($page_type=="Marketer") {
     $innerContent="Content";
   $path='../Marketer/';
    $section="../Marketer/sections/";
  }elseif ($page_type=="Admin") {
      //$path='../admin/';
    $innerContent="Content";
    $path="";
     $section="Pages/";
  }elseif ($page_type=="Clients") {
      $path='../Customer/';
    $innerContent="Content"; 
     $section="../Customer/sections/";
  }else{
    $path="";
    $section="";
    $innerContent="";
  }
  $fileLocationInner=$section.$Page_filenamex.$innerContent.".php";
   $fileInner= fopen($fileLocationInner,"w");
 $fileLocation =$path.$Page_filenamex.".php";
  $file = fopen($fileLocation,"w");

  $content ='

<div class="page-bar"> 
  <ul class="page-breadcrumb">
    <li>
      <i class="fa fa-home"></i>
      <a class="" href="index.php">لوحة التحكم   :الرئيسية </a>
      <i class="fa fa-angle-left"></i>
<strong>'.$Page_name_arx.'  </strong>
    </li>
    <li>
      <a href="#"></a>
    </li>
  </ul> 
</div> 

  ';
  fwrite($file,$content);
  fclose($file);

fwrite($fileInner,"");
   
  fclose($fileInner);



}
 

}

//---------------------Edit funcation start here----------------

function update_data($data)
{
    
}

//---------------------filter_display funcation start here----------------
function filter_display($data) 
{ 
    
    foreach($data["params"] as &$d) 
    { 
        
        
         
    } 
} 


//---------------------delete_data funcation start here----------------

function delete_data($data)
{

   global $Applogins_cls,$app_func;
  $city=$data["Page_id"];
  $w = "Page_id = $city";
  $res=$app_func->query("DELETE from app_pages WHERE $w");
      
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


$grid->table = "app_pages";
$grid->set_columns($cols);
$out = $grid->render("app_pages");
?>
 