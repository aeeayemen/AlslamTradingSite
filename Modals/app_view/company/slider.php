<?php 
$getComSlideruin=$app_func->getComSlideruin($lang_id,$company_id);
if($getComSlideruin !=''){
?>
<!-- Start Hero Slider -->
<section class="slider-section-four">
    <div class="hero-slider-four hero-slider-five owl-carousel owl-theme">
        <?php
        
        $getComSlideruin=$app_func->getComSlideruin($lang_id,$company_id);
        echo $getComSlideruin;
      
        ?>
    </div>
</section>
<!-- End Hero Slider -->
<?php }else{ ?>
<!-- Start Page Banner Section -->
    <section class="banner-section" style="background: url(<?php echo $company_info['activity_baner']; ?>)">
        <div class="d-table">
            <div class="d-tablecell">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title page-title-two">
                                <h2><span><?php echo $company_info['activity_name']; ?></span></h2>
                                <ul>
                                    <li>
                                        <a href="index.php?lang=<?php echo $langt; ?>"><?php echo $Dictionary['home_nav']; ?>
                                            <i class="flaticon-<?php if ($lang_id == 1) {
                                                echo "left";
                                            } else {
                                                echo "right";
                                            } ?>"></i> </a></li>
                                    <li><?php echo $company_info['activity_name']; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Page Banner Section -->
<?php    } ?>