<?php 
    $getCompanyParteners = $app_func->getCompanyParteners($lang_id,$company_id);
    if($getCompanyParteners !=''){
?>
<!-- Start Partner Section -->
        <div class="counter-section partner-section-four testimoinal-section section-title-left py-5 bg-white" style="background-image: url(<?php //echo $Banners['parteners_banner']; ?>); " id="parteners">

            <div class="container">
          <div class="row">
                    <div class="col-12">
                        <div class=" section-title-left">
                          <h2 class=""><?php echo $Dictionary['parteners']; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="partner-wrapper owl-carousel owl-theme">
                        <?php
                
                echo $getCompanyParteners;
                ?>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- End Partner Section -->
<?php } ?>

