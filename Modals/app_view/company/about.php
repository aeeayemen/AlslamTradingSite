

<!-- Start about -->
<section class=" testimoinal-section-four ptb-100" style="background: url('<?php echo $Banners['about_group_background'] ?? ''; ?>');" id="about-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-8">
                
                <div class="section-title-left home-page-four-section-title">
                    <h2><?php echo $company_info['activity_name']; ?></h2>
                    <p class="text-justify">
                        <?php echo $company_info['activity_content']; ?>
                            
                    </p>
                    
                    
                </div>
                

                <div class="testimoinal-wrapper-four owl-carousel owl-theme">
                    <div class="single-testimoinal">
                        <h3><?php echo $Dictionary['vision']; ?></h3>
                        <p><?php echo $company_info['visoin']; ?></p>
                    </div>
                    <div class="single-testimoinal">
                        <h3><?php echo $Dictionary['mission']; ?></h3>
                        <p><?php echo $company_info['mission']; ?></p>
                    </div>
                    <div class="single-testimoinal">
                        <h3><?php echo $Dictionary['objective']; ?></h3>
                        <p><?php echo $company_info['objective']; ?></p>
                    </div>
                    
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
