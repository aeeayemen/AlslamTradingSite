<?php
$heading = "media_center";
require_once("Modals/app_part/header.php");
require_once("Modals/app_part/menu.php");

$cat = 0;
if (isset($_GET['cat'])) {
    if (is_numeric( $_GET['cat'])) {
       $cat = $_GET['cat'];
    }
    
}
$getDetailimage = array();
$getDetailimage = $app_func->getDetailimage($cat, $lang_id);
if ($lang_id == 1) {
    $album_name = "البوم " . $getDetailimage['titles'];
} else {
    $album_name = $getDetailimage['titles'] . " Album";
}

?>

    <!-- Start Page Banner Section -->
    <section class="banner-section" style="background: url(<?php echo $Banners['view_gallery_banner']; ?>)">
        <div class="d-table">
            <div class="d-tablecell">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title page-title-two">
                                <h2><span><?php echo $album_name; ?></span></h2>
                                <ul>
                                    <li>
                                        <a href="index.php?lang=<?php echo $langt; ?>"><?php echo $Dictionary['home_nav']; ?>
                                            <i class="flaticon-<?php if ($lang_id == 1) {
                                                echo "left";
                                            } else {
                                                echo "right";
                                            } ?>"></i> </a></li>
                                    <li><?php echo $album_name; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About section -->
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-left home-page-four-section-title">
                        <h4><?php echo $Dictionary['view_album']; ?></h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                $getView_ImageGallary = $app_func->getView_ImageGallary($cat, $lang_id);
                echo $getView_ImageGallary;
                ?>
            </div>
        </div>
    </section>
<?php
require_once("Modals/app_part/footer.php");
require_once("Modals/app_part/script.php");
?>