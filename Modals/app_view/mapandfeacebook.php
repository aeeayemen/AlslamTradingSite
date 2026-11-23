<section class="py-0">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-6 md-mt-5 widget py-4">
          <div class=" text-center">
          <h4 class="title"> <span>
            <?php echo $Dictionary['stay_us']; ?>            
          </span></h4>
          
        </div>
          <ul class="contact-info list-unstyled mt-4">
          <li class="mb-4">
            <i class="fa fa-user"></i>
            <span><?php echo $Dictionary['note']; ?> :</span><p>
              <?php echo $Dictionary['stay_us_nots']; ?>
            </p>
          </li>
        <li class="mb-4"><i class="flaticon-paper-plane"></i><span><?php echo $Dictionary['adress']; ?> :</span><p> 
        <?php echo $DetailCompany['Address'] ?>
        </p></li>
        <li class="mb-4"><i class="flaticon-phone-call"></i><span> <?php echo $Dictionary['telephone']; ?> :</span>

            <?php if ($DetailCompany['Phone']!="") {
                      echo '<a href="tel:'.$DetailCompany['Phone'].'">
          <bdo dir="ltr">'.$DetailCompany['Phone'].' </bdo></a>' ;}
            ?>
            
      <?php if ($DetailCompany['Mobile']!="") {
                      echo '<br><a href="tel:'.$DetailCompany['Mobile'].'">
          <bdo dir="ltr">'.$DetailCompany['Mobile'].' </bdo></a>' ;}
            ?>
      
          </li>
          <li><i class="flaticon-message"></i><span><?php echo $Dictionary['email']; ?> :</span>
            <?php if ($DetailCompany['Email']!="") {
                      echo '<a href="mailto:'.$DetailCompany['Email'].'"> '.$DetailCompany['Email'].'</a>';}
            ?>
        </li>
        
      </ul>
        </div>
      <div class="col-lg-8 col-md-12 md-mt-5 dark-bg py-4">
        <div class=" text-center">
          <h4 class="title"> <span class=" text-white ">
          <?php echo $Dictionary['location_map']; ?>
            
          </span></h4>
          
        </div>
        <?php echo $DetailCompany['geoglocation'] ?>
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15391.846824660499!2d44.1803116!3d15.3243161!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x87d020f542e5f83e!2z2KzYp9mF2LnYqSDYp9mE2YbYrtio2Kkg2KfZhNiv2YjZhNmK2Kk!5e0!3m2!1sar!2s!4v1568107421142!5m2!1sar!2s" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe> -->
      </div>
      <!-- feacebook -->
        <!-- <div class="col-lg-4 col-md-6 sm-mt-5 footer-list">
          <div class=" text-center">
          <h4 class="title"> <span>
          <?php  // echo $Dictionary['Facebook_page']; ?></span></h4>
          
        </div>
          
          <iframe src="https://www.facebook.com/plugins/page.php?href=<?php //echo $DetailCompany['Facebook'] ?>&tabs=timeline&width=340&height=385&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="350" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
        </div> -->
    </div>
  </div>
</section>
