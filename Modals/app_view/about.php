
<!-- Start about -->
<section class=" testimoinal-section-four ptb-100" style="background: url('<?php echo $Banners['about_group_background']; ?>');">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-8">
                <?php
                $AboutGroup= $app_func->GetAboutSectionRow($lang_id,'Postion1',1);
                echo $AboutGroup;
                ?>

                <div class="testimoinal-wrapper-four owl-carousel owl-theme">
                    <?php
                    $AboutVision= $app_func->GetsectorVisionRow($lang_id,'Postion2');
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