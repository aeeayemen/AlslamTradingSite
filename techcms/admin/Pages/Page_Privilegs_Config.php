<?php 

/** 
 *شاشة تهيئة  صلاحية صفحة 
 * تم الاستغناء عنها بعد ادخال كل الصلاحيات المحتمله  
 *   
 */ 
include("Load_grid.php");
// set up DB

// include and create object
$pagename= basename($_SERVER["SCRIPT_FILENAME"]);
 $pagenames=str_replace(".php","",$pagename);
$userid=$Applogins_cls->user_group_id;   
if($Applogins_cls->logged_in){
 ///$newphrase = str_replace($healthy, $yummy, $phrase);

 //$rolearray=$Applogins_cls->Get_UserRoles($pagename);
}else{ 
      $_SESSION["loginattemps"]=0;
       print ("<meta http-equiv='refresh'  content='.001; URL=Logins.php'>");
}

$rolearray=array();
$rolearray=$Adatabase->Get_UserPage_Roles($userid,$pagenames);
$Add_role=$rolearray["can_insert"];
$Edit_role=$rolearray["can_edit"];
$Delet_role=$rolearray["can_delete"];
$Search_role=$rolearray["can_search"];
$Export_role=$rolearray["can_export"];
$Sortable_role=$rolearray["can_sort"];
$Showhidecolumns=$rolearray["can_show_colums"];
$Access_role=$rolearray["can_access"];
$Print_role=$rolearray["can_print"];
$Select_role=$rolearray["can_select"];

if($Add_role==1){$Add_role=true;}else{$Add_role=false;};
if($Edit_role==1){$Edit_role=true;}else{$Edit_role=false;};
if($Delet_role==1){$Delet_role=true;}else{$Delet_role=false;};
if($Search_role==1){$Search_role=true;}else{$Search_role=false;};
if($Export_role==1){$Export_role=true;}else{$Export_role=false;};
if($Sortable_role==1){$Sortable_role=true;}else{$Sortable_role=false;};
if($Showhidecolumns==1){$Showhidecolumns=true;}else{$Showhidecolumns=false;};
if($Access_role==1){$Access_role=true;}else{$Access_role=false;};
if($Print_role==1){$Print_role=true;}else{$Print_role=false;};
if($Select_role==1){$Select_role=true;}else{$Select_role=false;};


$grid = new jqgrid();


if(isset($_SESSION["lang"]))
{
    
}else{
    $_SESSION["lang"]="ar";
}
 $language = New Language($_SESSION["lang"] );
 $langs = array();
  $langs =  $language->userLanguage();
  $lngdir= $language->userLangDir();



$opt["caption"] = "اعداد صلاحيات الصفحات";
$opt["toolbar"] = "bottom";
$opt["direction"] = "rtl";

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
$col["title"] = "اسم الصفحة"; 
$col["name"] = "Page_id";  
$col["editable"] = true; 
$col["width"] = "60";
$client_lookup = $grid->get_dropdown_values("select distinct  app_pages.Page_id as k,  app_pages.Page_name_ar as v from  app_pages");  
$col["stype"] = "select";
$col["align"] = "center";  
$col["searchoptions"] = array("value" => ":;".$client_lookup); 
$col["edittype"] = "select"; // render as select 
$str = $grid->get_dropdown_values("select distinct  app_pages.Page_id as k,  app_pages.Page_name_ar as v from  app_pages");
$col["editoptions"] = array( 
            "value"=>":;".$str,  
            "onchange" =>"fill_form();"); 					
$col["editrules"] = array("required"=>true);
$col["formatter"] = "select"; // display label, not value
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role; 
$col["show"]["edit"] = false;
$cols[] = $col;
   

$col = array(); 
$col["title"] = "اسم الصلاحية"; 
$col["name"] = "Privilege_id"; 
$col["editable"] = true; 
$col["width"] = "60";
$client_lookup = $grid->get_dropdown_values("select distinct   privilegs.Privilege_id as k,   privilegs.Privilege_title_ar as v from  privilegs");  
$col["stype"] = "select";
$col["align"] = "center";  
$col["searchoptions"] = array("value" => ":;".$client_lookup); 
$col["edittype"] = "select"; // render as select 
$str = $grid->get_dropdown_values("select distinct   privilegs.Privilege_id as k,   privilegs.Privilege_title_ar as v from  privilegs");
$col["editoptions"] = array( 
            "value"=>":;".$str); 					
$col["editrules"] = array("required"=>true);
$col["formatter"] = "select"; // display label, not value
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role; 
$col["show"]["edit"] = false;
$cols[] = $col;
   
         

$col = array();
$col["title"] = "حالة التفعيل"; // caption of column
$col["name"] = "is_granted"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["width"] = "40";
$col["edittype"] = "checkbox"; // render as checkbox
$col["editoptions"] = array("value"=>"1:0"); // with these values "checked_value:unchecked_value"
$col["formatter"] = "checkbox";
$col["search"] = $Search_role;
$col["export"] = $Export_role;
$col["sortable"] = $Sortable_role;
$col["align"] = "center";
$col["viewable"] = false;
$col["required"] = true;
$col["hidedlg"] = true;
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
        
)
);

// params are array(<function-name>,<class-object> or <null-if-global-func>,<continue-default-operation>)
// if you pass last argument as true, functions will act as a data filter, and insert/update will be performed by grid 
$e["on_insert"] = array("add_data", null, false);
$e["on_update"] = array("update_data", null, false);
$e["on_delete"] = array("delete_data", null, false);
$grid->set_events($e);


function add_data($data)
{
    global $app_func;
    
//$idx=$data["params"]["id"];   
$citid=$data["params"]["Page_id"];
 $zoneid=$data["params"]["Privilege_id"];
  $cityids= 1;
  $result=$app_func->query("SELECT MAX(id)+1 AS NB FROM  page_privilegs_config where Page_id=$citid");
 while ($row = $result->fetch_assoc()) {
    if($row["NB"]>0)
    {
   $cityids= $row["NB"];     
    }else{
        $cityids= 1;
    }
    }
$is_granteds=$data["params"]["is_granted"];
$newquerys="insert into  page_privilegs_config (id,Page_id,Privilege_id,is_granted) values ('$cityids','$citid','$zoneid','$is_granteds')";

$result = $app_func->query($newquerys);
if (!$result) {
    $errs=$app_func->error();
   $k1="Page_privilegs_config_Privilegs_fk";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
phpgrid_error("تم ربط الصلاحية المحدده مسبقاً لايمسح بالتكرار");
   }
    $errs=$app_func->error();
   $k1="Page_privilegs_config_App_Pages_fk";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
phpgrid_error("تم ربط الصلاحية المحدده مسبقاً لايمسح بالتكرار");
   }   
   $errs=$app_func->error();

   $msg="Invalid query: " .$errs;
     phpgrid_error($msg);   
    
}



}
//---------------------Edit funcation start here----------------

function update_data($data)
{
    global $app_func;
   	list($city,$zone) = explode("-",$data["pk"]);

	$s = array();
	foreach($data["params"] as $k=>$v)
	{
	   if($k=="pk"){
	       
	   }else{
	       
	   
		$s[] = "$k = '$v'";
        }
	}
	$s = implode(",",$s);
	
	$w = "Page_id = $city and Privilege_id=$zone";
	   
$result = $app_func->query("UPDATE page_privilegs_config set  $s WHERE $w");
if (!$result) {
   $errs=$app_func->error();
   $k1="Page_privilegs_config_Privilegs_fk";
   $chkrslt=check_error($errs,$k1);
   if($chkrslt)
   {
phpgrid_error("تم ربط الصلاحية المحدده مسبقاً لايمسح بالتكرار");
   }
   $errs=$app_func->error();

   $msg="Invalid query: " .$errs;
     phpgrid_error($msg);   
    
} 
}

//---------------------filter_display funcation start here----------------


//---------------------delete_data funcation start here----------------

function delete_data($data)
{
    global $app_func;
		list($city,$zone) = explode("-",$data["pk"]);
	$w = "Page_id = $city and Privilege_id=$zone";
	$res=$app_func->query("DELETE from page_privilegs_config WHERE $w");
    $errnos= $app_func->errno();
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

$grid->select_command = "SELECT id,concat(Page_id,'-',Privilege_id) as pk,Page_id,Privilege_id,is_granted FROM  page_privilegs_config ";
$grid->table = "page_privilegs_config";
$grid->set_columns($cols);
$out = $grid->render("pageprivilegs");
?>

<html>
<head>
<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<?php
	if($lngdir=="ltr")
    {
	   
	}else{
	   ?>
              
       <style> 
    /* RTL CSS customizations, change 'cityadd' in css selector with your grid-id */ 
.modal{
    z-index: 1025551314 !important;
    overflow: visible !important;
}
.ui-jqdialog{
    
       z-index:  33330 !important;
    
}
     
    .ui-jqgrid .ui-jqgrid-title { 
        margin: 0.1em 0.2em; 
    } 
    .ui-jqgrid .ui-jqgrid-htable th div { 
        text-align: center; 
        padding-right: 2px; 
    } 
      
    #pageprivilegs_pager_left { 
        float: right; 
        width: 33%; 
    } 
    #pageprivilegs_pager_center { 
        float: right; 
        white-space: pre; 
        width: 33%; 
    } 
    #pageprivilegs_pager_right { 
        float: left; 
        padding-left: 7px; 
    }     
    .ui-jqgrid .ui-pg-table { 
        float: right; 
    } 
    .ui-custom-icon { 
        float: right; 
    }

    </style> 
    
    <?php
       
	}
    
?>

  
</head>
 <body>



      <div class="row">
      

<div style="margin:10px">
<?php
if($Access_role)
{
echo $out;
 }else{
    $erromsg=$langs['NOT_PAUTHRIZED_MSG'];
    $btntxt=$langs['NOT_PAUTHRIZED_BTNTXT'];
    echo '<br><br><br><br><br><br><br><br><div class="alert alert-danger display-show" style="text-align: center; color:#F71616;font-size:16px;" id="erroxsmsg"><strong> '.$erromsg.'<br></strong><br/><a class="ajaxify" href="Home.php"><strong>'.$btntxt.'</strong></a></strong> </div>';
 }
   
 ?>

</div>
<script>
    var opts = {
        'loadComplete': function () {
            $('body').on('keydown', 'input, select, textarea', function(e) {
                var self = $(this)
                  , form = self.parents('form:eq(0)')
                  , focusable
                  , next
                  ;
                if (e.keyCode == 13) {
                    focusable = form.find('input,a,select,button,textarea').filter(':visible');
                    next = focusable.eq(focusable.index(this)+1);
                    if (next.length) {
                        next.focus();
                    } else {
                        form.submit();
                    }
                    return false;
                }
            });
        }
    };
 function fill_form()
 {
    var selectedRow = jQuery('#pageprivilegs').jqGrid('getGridParam','selrow');  
     var rd = jQuery('#pageprivilegs').jqGrid('getCell', selectedRow, 'grup_id'); // where invdate is column name 
   var cityid = $('#Page_id option:selected').val();
   // alert("changed"+cityid);
      if (cityid==""){
       
      }else{
$("#Privilege_id").load("Pages/Check-Funcations.php?checkidx=pageprivlages&pageidx="+cityid);       
      }
    
 }           
   
</script>

 
 
      </div><!--/row-->
 
 
  </body>
</html>