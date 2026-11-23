<!-- Start Header Section -->
<header class="header header-style-one header-style-three">
    <div class="header-wrapper-one header-wrapper-three">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <ul class="contact-info">
                        <li>
                            <i class="flaticon-clock-of-circular-shape-outline"></i><?php echo $Dictionary['time']; ?>
                        </li>


                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="help-and-social-wrapper">


                        <ul class="social-links">
                            <li>
                                <a href="<?php echo $DetailCompany['Twitter']; ?>"><i class="flaticon-twitter-black-shape"></i></a>
                            </li>
                            <li>
                                <a href="<?php echo $DetailCompany['Youtube']; ?>"><i class="flaticon-youtube"></i></a>
                            </li>
                            <li>
                                <a href="<?php echo $DetailCompany['Facebook']; ?>"><i class="flaticon-facebook-logo"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End header-wrapper-one -->

    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <!-- Menu For Mobile Device -->
        <div class="mobile-nav">
            <a href="index.php?lang=<?php echo $langt; ?>" class="logo">
                <img src="<?php echo !empty($DetailCompany['logo']) ? htmlspecialchars($DetailCompany['logo']) : 'uploads/logo.png'; ?>" onerror="this.onerror=null;this.src='uploads/logo.png';" alt="<?php echo htmlspecialchars($DetailCompany['cname']); ?>">
            </a>
        </div>


        <!-- Menu For Desktop Device -->
        <div class="construction-nav-one construction-nav-three">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">

                    <a class="navbar-brand" href="index.php?lang=<?php echo $langt; ?>">
                        <img src="<?php echo !empty($DetailCompany['logo']) ? htmlspecialchars($DetailCompany['logo']) : 'uploads/logo.png'; ?>" onerror="this.onerror=null;this.src='uploads/logo.png';" alt="<?php echo htmlspecialchars($DetailCompany['cname']); ?>">
                    </a>

                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="index.php?lang=<?php echo $langt; ?>" class="nav-link <?php if($heading == "index") {echo "active";} ?>"><?php echo $Dictionary['home_nav']; ?></a>
                            </li>

                            <li class="nav-item">
                                <a href="about-us.php?lang=<?php echo $langt; ?>" class="nav-link <?php if($heading == "about") {echo "active";} ?>"><?php echo $Dictionary['about_nav']; ?></a>

                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle <?php if($heading == "sectors") {echo "active";} ?>"><?php echo $Dictionary['sectors_nav']; ?></a>
                                <ul class="dropdown-menu">
                                    <?php
                                    //echo $app_func->get_sector_menu($lang_id);
                                    echo $app_func->get_sectoronly_menu($lang_id);
                                    ?>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle <?php if($heading == "products") {echo "active";} ?>"><?php echo $Dictionary['products_nav']; ?></a>
                                <ul class="dropdown-menu">
                                    <?php
                                    // echo $app_func->get_products_menu($lang_id);
                                    echo $app_func->get_productsonly_menu($lang_id);
                                    ?>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle <?php if($heading == "media_center") {echo "active";} ?>"><?php echo $Dictionary['media_center']; ?></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a class="dropdown-item" href="news.php?lang=<?php echo $langt; ?>"><?php echo $Dictionary['news_nav']; ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item" href="gallery.php?lang=<?php echo $langt; ?>"><?php echo $Dictionary['photos_library_nav']; ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item" href="video-gellary.php?lang=<?php echo $langt; ?>"><?php echo $Dictionary['videos']; ?></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="contact-us.php?lang=<?php echo $langt; ?>" class="nav-link <?php if($heading == "contact") {echo "active";} ?>"><?php echo $Dictionary['contact_nav']; ?></a>

                            </li>

                            <li>
                                <a href="index.php?lang=<?php if($lang_id == 1) {echo "en"; } else {echo "ar"; } ?>" class="default-btn text-white mt-4"><?php echo $Dictionary['language_nav']; ?></a>

                            </li>


                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div><!-- End Navbar Area -->
</header>
<!-- End Header Section -->