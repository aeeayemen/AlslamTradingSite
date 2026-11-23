
<?php  


require_once 'Modals/app_part/language.php';
require_once("techcms/App/App_constant.php");
require_once("techcms/Models/App_Classes/App_Funcations.php"); 


   
   $base_url="";

 if ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on")) {
     $base_url= "https://". @$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

 }else{
  $base_url= "http://". @$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  
 }
         
function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
} 
$pagename=curPageName();
$app_func=new App_Funcation();
 $DetailLanguge= array(); 
$Comp_Id=0;
$lang_cld="en";
$langDir="ltr";
$language="";
if (isset($_GET['nc'])) {
  $Comp_Id=$_GET['nc'];
}
if(isset($_GET['lang']))
{

$lang_cl=$_GET['lang'];
if ($lang_cl=="ar" || $lang_cl=="en") {
  


   if ($lang_cl=="ar") {
    $langDir="rtl"; 
   }
  elseif ($lang_cl=="en") {
    $langDir="ltr";
  }
   $DetailLanguge=$app_func->getidlanguage($lang_cl);
   $app_func->setLanguge($lang_cl,$pagename);
   $language=new Language($lang_cl);

}
else{
    
  $DetailLanguge=$app_func->getidlanguage($lang_cld);
  $app_func->setLanguge($lang_cld,$pagename);
  $language=new Language($lang_cld);
}

}
else{
    $DetailLanguge=$app_func->getidlanguage($lang_cld);
    $app_func->setLanguge($lang_cld,$pagename);
    $language=new Language($lang_cld);
}
 $lang_id= $DetailLanguge['lang_id']; 
 $langt= $DetailLanguge['class_name']; 
 $app_func->seturl($_SERVER['REQUEST_URI']);

  $getlanguage=$app_func->changeurl($lang_id); 
   
 $langs = array();
  $langs =  $language->userLanguage();  
   if ($Comp_Id==0) {
     
      $Comp_Id=$app_func->getidparentcheck($lang_id);
   }
     $app_func->setLang_Id($lang_id);
      $app_func->setComp_id($Comp_Id);
$DetailCompany = array(); 
$DetailCompany=$app_func->getDetailscampany($Comp_Id,$lang_id); 

if ($DetailCompany['Is_Actieved']=='No' && $pagename!="maintenance.php") {
      header('Location:maintenance.php');
// echo '<script type="text/javascript">
//            window.location = "maintenance.php"
//       </script>';
    
}

 $Dictionary= array();
 $Dictionary=$app_func->getidlanguageDictionary($lang_id);


 $Banners= array();
 $Banners=$app_func->getBannerspages($lang_id); 



$pagenamess= basename($_SERVER["SCRIPT_FILENAME"]);
$ThisPageFileName=str_replace(".php","",$pagenamess); 
 $ThisSeoDescribtion="";
  $ThisSeoImage="";
  $ThisKeywordDescribtion="";
   $ThisTitlePage="";
  $SeoDescribe=$app_func->GetSeoDescribe($lang_id,$ThisPageFileName); 
  if ($SeoDescribe['SeoTitle']!="") {
      $ThisTitlePage=$DetailCompany['cname']."&nbsp;|&nbsp;".$SeoDescribe['SeoTitle'];

  }else{
     $ThisTitlePage=$DetailCompany['cname'];
  }

  if ($SeoDescribe['seo_description']!="") {
      $ThisSeoDescribtion=$SeoDescribe["seo_description"];
   
   }else{
      $ThisSeoDescribtion=$DetailCompany["seo_description"];
   }

    if ($SeoDescribe['Seo_keyword']!="") {
      $ThisKeywordDescribtion=$SeoDescribe["Seo_keyword"];
   
   }else{
      $ThisKeywordDescribtion=$DetailCompany["seo_description"];
   }

 if ($SeoDescribe['SeoImage']!="") {
      $ThisSeoImage=$SeoDescribe["SeoImage"];
   
   }else{
      $ThisSeoImage=$DetailCompany["logo"];
   }
 
   
  

 require_once 'Modals/app_part/vistorTracking.php';
?>
 
 