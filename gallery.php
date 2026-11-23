<?php
$heading = "media_center";
require_once("Modals/app_part/header.php");
require_once("Modals/app_part/menu.php");
?>

    <!-- Start Page Banner Section -->
    <section class="banner-section" style="background: url(<?php echo $Banners['gallery_banner']; ?>)">
        <div class="d-table">
            <div class="d-tablecell">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title page-title-two">
                                <h2><span><?php echo $Dictionary['photos_library_nav']; ?></span></h2>
                                <ul>
                                    <li>
                                        <a href="index.php?lang=<?php echo $langt; ?>"><?php echo $Dictionary['home_nav']; ?>
                                            <i class="flaticon-<?php if ($lang_id == 1) {
                                                echo "left";
                                            } else {
                                                echo "right";
                                            } ?>"></i> </a></li>
                                    <li><?php echo $Dictionary['photos_library_nav']; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About section -->
    <section class="ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-left">
                        <h4><?php echo $Dictionary['photos_library_nav']; ?></h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $getImageGallarycata = $app_func->getImageGallarycata($lang_id);
                echo $getImageGallarycata;
                ?>
            </div>
        </div>
    </section>
<?php
require_once("Modals/app_part/footer.php");
require_once("Modals/app_part/script.php");
?>