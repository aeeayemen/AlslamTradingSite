<?php
$heading = "media_center";
require_once("Modals/app_part/header.php");
require_once("Modals/app_part/menu.php");
?>
    <!-- Start Page Banner Section -->
    <section class="banner-section" style="background: url(<?php echo $Banners['videos_banner']; ?>)">
        <div class="d-table">
            <div class="d-tablecell">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title page-title-two">
                                <h2><span><?php echo $Dictionary['videos']; ?></span></h2>
                                <ul>
                                    <li>
                                        <a href="index.php?lang=<?php echo $langt; ?>"><?php echo $Dictionary['home_nav']; ?>
                                            <i class="flaticon-<?php if ($lang_id == 1) {
                                                echo "left";
                                            } else {
                                                echo "right";
                                            } ?>"></i> </a></li>
                                    <li><?php echo $Dictionary['videos']; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About section -->
    <section class="about-section pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-left home-page-four-section-title">
                        <h4><?php echo $Dictionary['videos']; ?></h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $getVedioGallary = $app_func->getVedioGallary($lang_id);
                echo $getVedioGallary;
                ?>
            </div>
        </div>
    </section>
<?php
require_once("Modals/app_part/footer.php");
require_once("Modals/app_part/script.php");
?>