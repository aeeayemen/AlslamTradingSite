<?php
// $heading = "sector";
// $style = "food";
$company_id = 1;

if (isset($_GET['company'])) {
	if (is_numeric($_GET['company'])) {
	  $company_id = $_GET['company'];
	}
   
}

// $heading ="index";
//$company_info = $app_func->GetAboutCompanyRow($lang_id,$company_id);

// require_once ("Modals/app_part/header.php");
// require_once ("Modals/app_part/menu.php");
// require_once ("Modals/app_view/slider.php");
// require_once("Modals/app_view/company/products.php");
// require_once ("Modals/app_view/companys.php");
// require_once ("Modals/app_view/about.php");

// require_once("Modals/app_view/services.php");

// require_once("Modals/app_view/why-choose.php");
// require_once ("Modals/indexModals/products.php");
// require_once ("Modals/app_view/clients.php");
// require_once ("Modals/app_view/get-quote.php");
// require_once("Modals/app_view/news.php");
// require_once ("Modals/app_view/Partener.php");
// require_once ("Modals/app_view/contact.php");
// require_once ("Modals/app_part/footer.php");
// require_once ("Modals/app_part/script.php");


// require_once("Modals/app_part/company/header.php");
// require_once("Modals/app_part/company/menu.php");
// require_once("Modals/app_view/company/slider.php");
// require_once("Modals/app_view/company/about.php");
// require_once("Modals/app_view/company/about-more.php");
// require_once("Modals/app_view/company/products.php");
// require_once("Modals/app_view/company/counter.php");
// require_once("Modals/app_view/company/clients.php");
// require_once ("Modals/app_view/get-quote.php");
// require_once("Modals/app_view/company/parteners.php");
// require_once("Modals/app_view/company/contact.php");
// require_once("Modals/app_part/company/footer.php");
 // require_once("Modals/app_part/company/script.php");

$heading ="index"; 
require_once ("Modals/app_part/header.php");
$company_info = $app_func->GetAboutCompanyRow($lang_id,$company_id);
require_once ("Modals/app_part/menu.php");
require_once("Modals/app_part/company/menu.php");
require_once("Modals/app_view/company/slider.php");
// require_once ("Modals/app_view/slider.php");
require_once ("Modals/app_view/sector-services.php");
require_once("Modals/app_view/company/about.php");
require_once("Modals/app_view/services.php");

require_once("Modals/app_view/company/counter.php");
require_once("Modals/app_view/company/about-more.php");
//require_once ("Modals/app_view/about.php");

// require_once("Modals/app_view/why-choose.php");
// require_once ("Modals/indexModals/products.php");
require_once("Modals/app_view/company/clients.php");
//require_once ("Modals/app_view/clients.php");
require_once ("Modals/app_view/get-quote.php");
// require_once("Modals/app_view/news.php");
require_once("Modals/app_view/company/parteners.php");
//require_once ("Modals/app_view/Partener.php");
require_once("Modals/app_view/company/contact.php");
//require_once ("Modals/app_view/contact.php");
require_once ("Modals/app_part/footer.php");
require_once ("Modals/app_part/script.php");
?>