
<!-- Start About Section -->
<section class="about-section pb-100 pt-100" id="we-do">
    <div class="container">
        <div class="row">
            <?php
            $getCompanyWhyUs=$app_func->getCompanyWhyUs($lang_id,$company_id);
            echo $getCompanyWhyUs;
            ?>
        </div>
    </div>
</section>
<!-- End About Section -->
