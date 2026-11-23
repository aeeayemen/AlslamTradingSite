
<!-- start mition -->
<section class="pb-0 pt-3">
  <div class="container">
    <div class="row">
    <?php 
      $mitions=$app_func->get_mitions($lang_id); 
      echo $mitions;
    ?>
    </div>
  </div>
</section>
<!-- end mition -->