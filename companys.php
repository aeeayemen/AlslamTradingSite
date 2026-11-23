<?php
$heading = "sector";
$style = "food";
$company_id = 1;
if (isset($_GET['company'])) {
    // switch ($_GET['company']) {
    //     case 1 :
    //         $style = "food";
    //         break;
    //     case 2:
    //         $style = "pharmaceuticals";
    //         break;
    //     case 3:
    //         $style = "european";
    //         break;
    //     case 4:
    //         $style = "medical";
    //         break;
    //     case 5:
    //         $style = "hareth";
    //         break;
    //     case 6:
    //         $style = "rasheed";
    //         break;
    //     case 7:
    //         $style = "motors";
    //         break;
    //     case 8:
    //         $style = "energy";
    //         break;
    // }
     $style = "food";
}
if (isset($_GET['company'])) {
    
    if (is_numeric($_GET['company'])) {
      $company_id = $_GET['company'];
    }
}


require_once("Modals/app_part/company/header.php");
$company_info = $app_func->GetAboutCompanyRow($lang_id,$company_id);

require_once("Modals/app_part/company/menu.php");
require_once("Modals/app_view/company/slider.php");
require_once ("Modals/app_view/sector-services.php");
require_once("Modals/app_view/company/about.php");
require_once("Modals/app_view/company/about-more.php");
require_once("Modals/app_view/company/products.php");
require_once("Modals/app_view/company/counter.php");
require_once("Modals/app_view/company/clients.php");
require_once ("Modals/app_view/get-quote.php");
require_once("Modals/app_view/company/parteners.php");
require_once("Modals/app_view/company/contact.php");
require_once("Modals/app_part/company/footer.php");
require_once("Modals/app_part/company/script.php");