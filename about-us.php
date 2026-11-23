<?php
$heading = "about";
require_once("Modals/app_part/header.php");
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
                                <h2><span><?php echo $Dictionary['about_nav']; ?></span></h2>
                                <ul>
                                    <li>
                                        <a href="index.php?lang=<?php echo $langt; ?>"><?php echo $Dictionary['home_nav']; ?>
                                            <i class="flaticon-<?php if ($lang_id == 1) {
                                                echo "left";
                                            } else {
                                                echo "right";
                                            } ?>"></i> </a></li>
                                    <li><?php echo $Dictionary['about_nav']; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Page Banner Section -->
    <!-- Start About Section -->
    <section class="about-section-four ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="experience-video">
                        <img src="uploads/about.jpg" alt="" style="width: 100%;">
                        <div class="experience-year">
                            <span>20</span>
                            <h2><?php if ($lang_id == 1) {
                                    echo "عام";
                                } else {
                                    echo "Years";
                                } ?></h2>
                            <p><?php if ($lang_id == 1) {
                                    echo "من الخبرة";
                                } else {
                                    echo "Of Experience";
                                } ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text-wrapper">
                        <div class="section-title-left ">
                            <?php
                            $GetAboutGroupRow = $app_func->GetAboutGroupRow($lang_id, 'Postion6');
                            echo $GetAboutGroupRow;
                            ?>
                        </div>
                    </div>
                </div>
    </section>
    <!-- End About Section -->
    <!-- Start about -->
    <section class=" testimoinal-section-four ptb-100 mb-5"
             style="background: url('<?php echo $Banners['about_group_background']; ?>');">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-8">
                    <?php
                    $AboutGroup = $app_func->GetAboutSectionRow($lang_id, 'Postion1', 0);
                    echo $AboutGroup;
                    ?>

                    <div class="testimoinal-wrapper-four owl-carousel owl-theme">
                        <?php
                        $AboutVision = $app_func->GetsectorVisionRow($lang_id, 'Postion2');
                        echo $AboutVision;
                        ?>
                    </div>
                </div>
                <div class="col-lg-5 col-md-4">
                    <div class="experience-videoss">
                        <div class="play-video-icon">
                            <a class="popup-youtube" href="<?php echo $DetailCompany['URL']; ?>">
                                <i class="flaticon-play-button"></i>
                                <div class="sonar-wrapper">
                                    <div class="sonar-emitter">
                                        <div class="sonar-wave"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End about -->
    <!-- Start Company Section -->
    <!-- <section class="company-section company-section-four ptb-100 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-left home-page-four-section-title">
                        <h4><?php // echo $Dictionary['more_info']; ?></h4>
                        <h2><?php //echo $DetailCompany['cname']; ?></h2>
                        <p class="text-dark"><?php // echo $Dictionary['more_info_desc']; ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 wow fadeInUp" data-wow-delay=".3s">
                    <?php
                    // $get_more_about_group = $app_func->get_more_about_group($lang_id, 'Postion7');
                    //echo $get_more_about_group;
                    ?>
                </div>
            </div>
    </section> -->
    <!-- End Company Section -->

<?php
require_once ("Modals/app_view/clients.php");
require_once ("Modals/app_view/Partener.php");
require_once("Modals/app_part/footer.php");
require_once("Modals/app_part/script.php");
?>