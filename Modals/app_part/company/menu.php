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
                                <a href="<?php echo $company_info['twitter']; ?>"><i class="flaticon-twitter-black-shape"></i></a>
                            </li>
                            <li>
                                <a href="<?php echo $company_info['youtube']; ?>"><i class="flaticon-youtube"></i></a>
                            </li>
                            <li>
                                <a href="<?php echo $company_info['facebook']; ?>"><i class="flaticon-facebook-logo"></i></a>
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
            <a href="#" class="logo">
                <img src="<?php echo $company_info['activity_img']; ?>" alt="">
            </a>
        </div>

        <!-- Menu For Desktop Device -->
        <div class="construction-nav-one construction-nav-three">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">

                    <a class="navbar-brand" href="#">
                        <img src="<?php echo $company_info['activity_img']; ?>" alt="">
                    </a>

                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link  active"><?php echo $Dictionary['home_nav']; ?></a>
                            </li>

                            <li class="nav-item">
                                <a href="#about-us" class="nav-link"><?php echo $Dictionary['about_nav']; ?></a>
                            </li>

                            <li class="nav-item">
                                <a href="#we-do" class="nav-link "><?php echo $Dictionary['we_do']; ?></a>
                            </li>

                            <li class="nav-item">
                                <a href="#our-products" class="nav-link "><?php echo $Dictionary['products_nav']; ?></a>
                            </li>

                            <li class="nav-item">
                                <a href="#parteners" class="nav-link "><?php echo $Dictionary['parteners']; ?></a>
                            </li>

                            <li class="nav-item">
                                <a href="#contact-us" class="nav-link "><?php echo $Dictionary['contact_nav']; ?></a>
                            </li>

                            <li class="nav-item get-free-quote get-free-quote2">
                                <a class="nav-link free-quote" href="index.php?lang=<?php echo $langt; ?>"><?php echo $Dictionary['group']; ?></a>
                            </li>
                            <li class="nav-item get-free-quote">
                                <a class="nav-link free-quote" href="company.php?lang=<?php if($lang_id == 1) {echo "en"; } else {echo "ar"; } ?>&company=<?php echo $company_info['activity_id']; ?>"><?php echo $Dictionary['language_nav']; ?></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div><!-- End Navbar Area -->
</header>
<!-- End Header Section -->