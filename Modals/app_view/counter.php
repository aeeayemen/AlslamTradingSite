<!--counter start-->
<section class="sm-pb-8 p-0">
  <div class="container">
    <div class="row">
      <?php
        $Counters = $app_func->getCounters($lang_id);
        echo $Counters;
      ?>
      
    </div>
  </div>
</section>

<!--counter end-->