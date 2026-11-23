<?php
$heading = "media_center";
if (isset($_GET['post_id'])) {
    if (is_numeric($_GET['post_id'])) {
        $post_id = $_GET['post_id'];
    }
    
}
require_once("Modals/app_part/header.php");
require_once("Modals/app_part/menu.php");
?>


<!-- Start Page Banner Section -->
<section class="banner-section" style="background: url(<?php echo $Banners['news_det_banner']; ?>)">
    <div class="d-table">
        <div class="d-tablecell">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title page-title-two">
                            <h2><span><?php echo $Dictionary['news_details']; ?></span></h2>
                            <ul>
                                <li>
                                    <a href="index.php?lang=<?php echo $langt; ?>"><?php echo $Dictionary['home_nav']; ?>
                                        <i class="flaticon-<?php if ($lang_id == 1) {
                                            echo "left";
                                        } else {
                                            echo "right";
                                        } ?>"></i> </a></li>
                                <li><?php echo $Dictionary['news_details']; ?>
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


<!-- Start Blogs Section -->
<div class="blogs-section blog-details-section  pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <?php
                $get_news_details = $app_func->get_news_details($lang_id,$post_id);
                echo $get_news_details;
                ?>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="sidebar-area">
                    <div class="widget widget_recent_posts">
                        <h3 class="widget-title"><?php echo $Dictionary['news_nav']; ?></h3>
                        <ul>
                            <?php
                            $getLatest_news = $app_func->getLatest_news($lang_id);
                            echo $getLatest_news;
                            ?>
                        </ul>
                    </div>

                    <div class="widget widget_call">
                        <i class="flaticon-telephone-handle-silhouette"></i>
                        <p><?php echo $Dictionary['any_questions']; ?></p>
                        <span><?php echo $DetailCompany['Phone']; ?></span>
                        <a href="mailto:<?php echo $DetailCompany['Email']; ?>"><?php echo $DetailCompany['Email']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blogs Section -->


<?php
require_once("Modals/app_part/footer.php");
require_once("Modals/app_part/script.php");
?>
