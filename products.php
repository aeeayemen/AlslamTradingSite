<?php
$heading = "products";
if (isset($_GET['act'])) {
    if (is_numeric($_GET['act'])) {
       $company_id = $_GET['act'];
    }
    
}
require_once("Modals/app_part/header.php");
$company_info = $app_func->GetAboutCompanyRow($lang_id, $company_id);
require_once("Modals/app_part/menu.php");
?>


<!-- Start Page Banner Section -->
<section class="banner-section" style="background: url(<?php echo $Banners['products_banner']; ?>)">
    <div class="d-table">
        <div class="d-tablecell">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title page-title-two">
                            <h2><span><?php echo $Dictionary['products_nav']; ?></span></h2>
                            <ul>
                                <li>
                                    <a href="index.php?lang=<?php echo $langt; ?>"><?php echo $Dictionary['home_nav']; ?>
                                        <i class="flaticon-<?php if ($lang_id == 1) {
                                            echo "left";
                                        } else {
                                            echo "right";
                                        } ?>"></i> </a></li>
                                <li><?php echo $Dictionary['products_nav']; ?>
                                    ( <?php echo $company_info['activity_name']; ?> )
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Page Banner Section -->


<!-- ======================================
	        ==   Start Export area  ==
	====================================== -->
<section class="export">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class=" section-title-left my-4">
                    <h4><?php if ($lang_id == 1) {
                            echo " منتجات ";
                        } ?><?php echo $company_info['activity_name']; ?><?php if ($lang_id != 1) {
                            echo " Products ";
                        } ?></h4>

                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $getProducts = $app_func->getProducts($lang_id, $company_id);
            echo $getProducts;
            ?>
        </div>
    </div>
</section>
<!-- ======================================
        ==   End Export area  ==
====================================== -->


<?php
require_once("Modals/app_part/footer.php");
require_once("Modals/app_part/script.php");
?>
 