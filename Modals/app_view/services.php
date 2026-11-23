<!-- Start Service Section -->
<section class="service-section service-section-four pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-left home-page-four-section-title">
                    <h2><?php echo $Dictionary['facts']; ?></h2>
                    <h4><?php echo $Dictionary['firts']; ?></h4>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $GetFactsRow = $app_func->GetFactsRow($lang_id, 'Postion3');
            echo $GetFactsRow;
            ?>
        </div>
    </div>
</section>
<!-- End Service Section -->