<?php 
 

$grid = new jqgrid($db_conf);
 
$opt["caption"] =$DetailPage['Page_name_ar'];
$opt["resizable"] = true;
$opt["autowidth"] = true;
$opt["autoresize"] = true;
$opt["loadtext"] = $langs['GRID_LOADING_TXT'];
$datesxd=date("Y-d");
 
$opt["toolbar"] = "bottom";
$opt["sortorder"] = "DESC"; // ASC or DESC
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
//$opt["add_options"]["jqModal"] = true;
//$opt["edit_options"]["jqModal"] = true;
$opt["add_options"]["success_msg"] = "تم اضافة البيانات بنجاح";
$opt["edit_options"]["success_msg"] = "تم تعديل البيانات بنجاح";
$opt["delete_options"]["success_msg"] = "تم حذف البيانات بنجاح"; 
$grid->set_options($opt);


 

   
$col = array();
$col["title"] = "الرقم"; // caption of column
$col["name"] = "id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
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
$col["title"] = "IP Address"; // caption of column
$col["name"] = "ip"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "50";
$col["align"] = "center";
$col["editable"] = true; 
$col["required"] = true;
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true);
$cols[] = $col;




 

$col = array();
$col["title"] = "تاريخ  الزيارة  "; // caption of column
$col["name"] = "date_visited"; 
$col["width"] = "40"; 
$col["sortable"] = false; // this column is not sortable 
$col["search"] = false; // this column is not searchable 
$col["editable"] = true; 
$col["edittype"] = "text"; 
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true); 
$cols[] = $col; 






 

$col = array();
$col["title"] = "الصفحة  "; 
$col["name"] = "page";  
$col["width"] = "30"; 
$col["editable"] = true;
$col["edittype"] = "text"; 
$col["required"] = true;
$col["search"] = false;
$col["export"] = false;
$col["sortable"] = false;
$col["hidedlg"] = true;
$col["show"] = array("list"=>false,"edit"=>false,"add"=>false); // only show in add/edit dialog
$cols[] = $col;
 








$col = array();
$col["title"] = "مصدر  الدخول " ;// caption of column
$col["name"] = "from_page"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "100";
$col["align"] = "center";
$col["editable"] = true; 
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;  
$col["show"] = array("list"=>true,"edit"=>true,"add"=>true); // only show in listing
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
    $userid = $Applogins_cls->useridx;
    $id = $app_func->GetOrderTable('id', 'stattracker');
    $ip = isset($data["params"]["ip"]) ? $data["params"]["ip"] : ($_SERVER['REMOTE_ADDR'] ?? '127.0.0.1');
    $date_visited = !empty($data["params"]["date_visited"]) ? $data["params"]["date_visited"] : date('Y-m-d H:i:s');
    $page = !empty($data["params"]["page"]) ? $data["params"]["page"] : 'home';
    $from_page = !empty($data["params"]["from_page"]) ? $data["params"]["from_page"] : 'direct';
    $browser = $_SERVER['HTTP_USER_AGENT'] ?? 'admin';
    $app_func->query("INSERT INTO stattracker (`id`, `browser`, `ip`, `date_visited`, `page`, `from_page`) VALUES ('$id', '$browser', '$ip', '$date_visited', '$page', '$from_page')");
}

//---------------------Edit funcation start here----------------

function update_data($data)
{
    global $Applogins_cls, $app_func;
    $userid = $Applogins_cls->useridx;
    $empno = intval($data["id"]);
    $ip = isset($data["params"]["ip"]) ? $data["params"]["ip"] : '';
    $date_visited = !empty($data["params"]["date_visited"]) ? $data["params"]["date_visited"] : date('Y-m-d H:i:s');
    $from_page = isset($data["params"]["from_page"]) ? $data["params"]["from_page"] : '';
    $app_func->query("UPDATE stattracker SET `ip`='$ip', `date_visited`='$date_visited', `from_page`='$from_page' WHERE id='$empno'");
}

//---------------------filter_display funcation start here----------------
function filter_display($data) 
{ 
    
    foreach($data["params"] as &$d) 
    { 
         $id=$d["id"];
        
           
         
        

            
        
        
        
    } 
} 


//---------------------delete_data funcation start here----------------

function delete_data($data)
{ 

      global $Applogins_cls,$app_func;
    $empno=$data["id"];

  $res=0;
  
 
  $w = "id=$empno ";
  $res=$app_func->query("DELETE from stattracker WHERE $w");
 
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

 
 
 $grid->table = "stattracker";
$grid->set_columns($cols);
$out = $grid->render("stattracker");
?>
 