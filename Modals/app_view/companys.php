<section class="sector text-center grey-bg whiet-bg mb-5">
  <div class="container">
    <div class="row">
        <div class="col-12 py-4">
            <div class=" section-title-left text-center">
                <h2><?php echo $Dictionary['sectors_nav']; ?></h2>
            </div>
        </div>
    </div>
    <div class="row">
       <?php 
            $get_sectors=$app_func->get_sectorsview($lang_id);
            echo $get_sectors;
        ?>      

                            
    </div>
   </div>
</section>
<!-- Start company Section -->
        <!-- <div class="partner-section-four testimoinal-section section-title-left ptb-45">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class=" section-title-left text-center">
                            <h4><?php echo $Dictionary['group_companies']; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="partner-wrapper owl-carousel owl-theme">
                        <?php
                        $get_activity_logos=$app_func->get_activity_logos($lang_id);
                        echo $get_activity_logos;
                        ?>

                    </div>
                </div>
            </div>
        </div> -->
        <!-- End company Section -->
		