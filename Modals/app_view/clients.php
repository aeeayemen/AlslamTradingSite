
<!-- Start clients Section -->
<div class="partner-section partner-section-four testimoinal-section section-title-left py-5" id="clients">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class=" section-title-left">
                    <h4><?php echo $Dictionary['clients']; ?></h4>

                </div>
            </div>
        </div>
        <div class="row sectors py-3">
             <?php
                $getClients = $app_func->getClients($lang_id);
                echo $getClients;
                ?>
           
        </div>
    </div>
</div>
<!-- end clients Section -->
