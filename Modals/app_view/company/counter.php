<?php
    $getCounters=$app_func->getCounters($lang_id,$company_id);
    if($getCounters !=''){
?>
<!-- Start Counter Section -->
<div class="counter-titele">
	<div class="container">
		<div class="row text-center">
            <div class="col-12 mt-5">
                <div class=" text-center">
                    <h4> <?php echo $Dictionary['counter-titele']; ?>  </h4>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="counter-section">
    <div class="container">
        <div class="row">
            <?php

            echo $getCounters;
            ?>
        </div>
    </div>
</div>
<!-- End Counter Section -->
<?php } ?>