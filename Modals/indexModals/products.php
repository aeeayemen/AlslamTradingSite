<!-- Start products Section -->
<section class="project-section project-one testimoinal-section bg-light pb-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class=" section-title-left text-center">
                    <h4><?php echo $Dictionary['photos_library_nav']; ?></h4>
                </div>
            </div>
        </div>
        <div class="sorting-menu">
            <ul>
                <li class="filter active" data-filter="all"><?php if ($lang_id == 1) {
                        echo "الكل";
                    } else {
                        echo "All";
                    } ?></li>
                <?php
                $get_gallery_filter = $app_func->get_gallery_filter($lang_id);
                echo $get_gallery_filter;
                ?>
            </ul>
        </div>
        <!-- /.sorting-menu -->
        <div id="Container" class="row">
            <?php
            $get_gallery_items = $app_func->get_gallery_items($lang_id);
            echo $get_gallery_items;
            ?>
        </div>
    </div>

</section>
<!-- End Project Section -->
<div class="text-center mx-auto pb-100">
    <a href="gallery.php?lang=<?php echo $langt; ?>" class="default-btn"><?php if ($lang_id == 1) {
            echo "المزيد";
        } else {
            echo "More";
        } ?></a>
</div>