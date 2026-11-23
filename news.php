<?php
$heading = "media_center";
require_once("Modals/app_part/header.php");
require_once("Modals/app_part/menu.php");
?>

    <!-- Start Page Banner Section -->
    <section class="banner-section" style="background: url(<?php echo $Banners['news_banner']; ?>)">
        <div class="d-table">
            <div class="d-tablecell">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title page-title-two">
                                <h2><span><?php echo $Dictionary['news_nav']; ?></span></h2>
                                <ul>
                                    <li>
                                        <a href="index.php?lang=<?php echo $langt; ?>"><?php echo $Dictionary['home_nav']; ?>
                                            <i class="flaticon-<?php if ($lang_id == 1) {
                                                echo "left";
                                            } else {
                                                echo "right";
                                            } ?>"></i> </a></li>
                                    <li><?php echo $Dictionary['news_nav']; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Page Banner Section -->
    <!-- Start Blog Section -->
    <section class="blog-section ptb-100  bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-left">
                        <!-- <h4><?php echo $Dictionary['news_nav']; ?></h4> -->
                        <h2><?php echo $Dictionary['news_nav']; ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $GetNews = $app_func->GetNews($lang_id);
                echo $GetNews;
                ?>
            </div>
        </div>
    </section>
    <!-- End Blog Section -->
<?php
require_once("Modals/app_part/footer.php");
require_once("Modals/app_part/script.php");
?>