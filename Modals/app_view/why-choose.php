
        <!-- Start Choose Section -->
        <section class="choose-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="choose-full-wrapper">
                            <?php
                            $GetWhyUsRow = $app_func->GetWhyUsRow($lang_id, 'Postion4');
                            echo $GetWhyUsRow;
                            ?>

                            <div class="row">
                                <?php
                                $GetWhyUs = $app_func->GetWhyUs($lang_id, 'Postion5');
                                echo $GetWhyUs;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-0">
                        <div class="choose-bg" style="background: url('<?php echo $Banners['why_us_background']; ?>');"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Choose Section -->