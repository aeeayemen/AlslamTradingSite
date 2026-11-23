<?php
$heading = "products";
if (isset($_GET['product_id'])) {
     if (is_numeric($_GET['product_id'])) {
          $product_id = $_GET['product_id'];
     }
   
}
if (isset($_GET['company'])) {
    if (is_numeric($_GET['company'])) {
        $company_id = $_GET['company'];
    }
   
}
require_once("Modals/app_part/header.php");
$product_info = $app_func->GetProductRow($lang_id, $product_id);
require_once("Modals/app_part/menu.php");
?>


<!-- Start Page Banner Section -->
<section class="banner-section" style="background: url(<?php echo $Banners['about_banner']; ?>)">
    <div class="d-table">
        <div class="d-tablecell">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title page-title-two">
                            <h2><span><?php echo $Dictionary['product_details']; ?></span></h2>
                            <ul>
                                <li>
                                    <a href="index.php?lang=<?php echo $langt; ?>"><?php echo $Dictionary['home_nav']; ?>
                                        <i class="flaticon-<?php if ($lang_id == 1) {
                                            echo "left";
                                        } else {
                                            echo "right";
                                        } ?>"></i> </a></li>
                                <li><?php echo $Dictionary['product_details']; ?>
                                    ( <?php echo $product_info['category_name']; ?> )
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

<!-- Start Project info Section -->
<section class="project-info-section pb-100">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3 mt-5 weey">
                <div class=" section-title-left">
                    <h4><?php echo $product_info['category_name']; ?></h4>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <!-- <img src="<?php // echo $product_info['category_img']; ?>" alt="<?php // echo $product_info['category_name']; ?>"> -->
                <div class="project-info-wrapper">
                    <h3><?php echo $product_info['category_name']; ?></h3>
                    <div class="row">
                        <div class="col-12">
                            <div class="project-info-list">
                                <!-- <h4><?php //echo $product_info['category_name']; ?> </h4> -->
                                <p><?php echo $product_info['category_short_desc']; ?> </p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="project-info-list">
                                <p><?php echo $product_info['category_content']; ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="project-slider-wrapper owl-carousel owl-theme">
                    <?php
                    $gellary1 = str_replace('["', " ", $product_info['category_imgs']);
                    $gellary2 = str_replace('"]', " ", $gellary1);
                    $gellary3 = str_replace('"', " ", $gellary2);
                    if ($gellary3 != "") {
                        $sgallary = explode(",", $gellary3);
                        if (count($sgallary) > 1) {
                            foreach ($sgallary as $key => $value) {

                                if (trim($value) != "") {
                                    $ccsG1 = function_exists('techcms_clean_image_path') ? techcms_clean_image_path(trim($value), 'frontend', 'uploads/no-image.png') : preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', "uploads/", trim($value));
?>
                    <div class="project-single-slider">
                        <img src="<?php echo htmlspecialchars($ccsG1); ?>" onerror="this.onerror=null; this.src='uploads/no-image.png';" alt="image">
                    </div>
                    <?php
                                }
                            }
                        }
                    }?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Project info Section -->
<?php
    $get_sectors=$app_func->get_sectorsServesview($lang_id,$company_id);
    if($get_sectors!=''){
?>
<section class="sector text-center grey-bg whiet-bg mb-5" id="our-products">
  <div class="container">
    <div class="row">
        <div class="col-12 py-4">
            <div class=" section-title-left text-center">
                <h2><?php echo $Dictionary['our_products']; ?></h2>
            </div>
        </div>
    </div>
    <div class="row">
       <?php 
            
            echo $get_sectors;
        ?>      

                            
    </div>
    <div class="row">
            <div class="col-md-12">
                <div class="position-btn">
            <a class="default-btn margin-0" href="products.php?lang=<?php echo $langt; ?>&act=<?php echo "$company_id"; ?>">
                 <?php echo $Dictionary['more_products']; ?>
            </a>
        </div>
            </div>
        </div>
   </div>
</section>
<?php } ?>


<?php
require_once("Modals/app_part/footer.php");
require_once("Modals/app_part/script.php");
?>
