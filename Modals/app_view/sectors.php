<!--sector start-->

<section class=" text-center grey-bg mb-5" data-bg-img="uploads/bg.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 ml-auto mr-auto">
        <div class="section-title text-center">
          <h2><?php echo $Dictionary['sectors']; ?> </h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="owl-carousel owl-theme" data-items="3" data-md-items="2" data-sm-items="1" data-xs-items="1" data-margin="30">
            <?php 
              $frature_sector=$app_func->get_featured_sectors($lang_id); 
              echo $frature_sector;
            ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- sector end -->
