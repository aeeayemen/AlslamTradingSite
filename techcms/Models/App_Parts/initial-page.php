<?php  
require_once "../App/App_constant.php";
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
// mysql_connect(PHPGRID_DBHOST, PHPGRID_DBUSER, PHPGRID_DBPASS);
// mysql_select_db(PHPGRID_DBNAME);
// mysql_query("SET NAMES 'utf8'"); 

$db_conf = array(
  "type"    => PHPGRID_DBTYPE,
  "server"  => PHPGRID_DBHOST,
  "user"    => PHPGRID_DBUSER,
  "password"  => PHPGRID_DBPASS,
  "database"  => PHPGRID_DBNAME
);
require_once  "../Models/App_Classes/Logins.php";

require_once "../Models/App_Classes/App_Funcations.php"; 
$app_func=new App_Funcation();
$pagename= basename($_SERVER["SCRIPT_FILENAME"]); 
 $pagenames=str_replace(".php","",$pagename);
$user_group_id=0;
$KeyThisUser="";
 $IdThisUser=0;
if(!$Applogins_cls->logged_in){
	 
 $_SESSION["loginattemps"]=0;
    $_SESSION['lasturl']=$_SESSION['url']=APP_PATH."index.php";
    header("Location:../Logins.php");
      exit;
     die();  
}else{

  $IdThisUser=$Applogins_cls->useridx;  
	//$KeyThisUser=$Applogins_cls->userid;  
	$user_group_id=$Applogins_cls->user_group_id;
}
       
 
  $DetailUser = array();
 $DetailUser=$app_func->GetDetailThisUser($IdThisUser);
   $KeyThisUser=$DetailUser['RelatedKey'];  
    $ThisUserActived=$DetailUser['Is_Actived']; 
    $ThisUserActived=false;
    if ($DetailUser['Is_Actived']=='Yes') {
     $ThisUserActived=true;
    }else{
       $ThisUserActived=false;
    }

require_once '../lib/inc/jqgrid_dist.php';
require_once "../Models/App_Classes/Langauge.php"; 
$lang=$_SESSION["lang"] ="ar" ; 
function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
} 
$pagename=curPageName();

$parts=explode('-',$pagename);

 $partPage="";
if (preg_match('/\b.php\b/', $parts[0])) {
   $parts=explode('.',$pagename);
     $partPage=$parts[0];
}else{
$partPage=$parts[0];
}


$DetailPage=array();
 $DetailPage=$app_func->GetDetailThisPage($pagename);
//substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);//Detecting Default Browser language
 $language = New Language($lang);
 $langs = array();
  $langs =  $language->userLanguage();
  $lngdir= $language->userLangDir();
    $themecolor="blue"; 

if(isset($_SESSION["lang"]))
{
    
}else{
    $_SESSION["lang"]="ar";
}

$Comp_Id=0;
if ($Comp_Id==0) {
     $Comp_Id=$app_func->getidparentcheck(1);
   }
$app_func->setComp_id($Comp_Id);
$DetailCompany = array(); 
$DetailCompany=$app_func->getDetailscampany($Comp_Id,1);



$rolearray=array();
 
$rolearray=$Adatabase->Get_UserPage_Roles($user_group_id,$pagenames);
 
$rolearray = is_array($rolearray) ? $rolearray : array();

$Add_role = !empty($rolearray["can_insert"]);
$Edit_role = !empty($rolearray["can_edit"]);
$Delet_role = !empty($rolearray["can_delete"]);
$Search_role = !empty($rolearray["can_search"]);
$Export_role = !empty($rolearray["can_export"]);
$Sortable_role = !empty($rolearray["can_sort"]);
$Showhidecolumns = !empty($rolearray["can_show_colums"]);
$Access_role = !empty($rolearray["can_access"]);
$Print_role = !empty($rolearray["can_print"]);
$Select_role = !empty($rolearray["can_select"]);

 $user_group_id=$Applogins_cls->user_group_id;
$group_key=$Adatabase->GetGroupUserType($user_group_id);
 $notification_type="";  
 


 
 



?>