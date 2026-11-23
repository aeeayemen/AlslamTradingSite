
<!--testimonial style3 start-->
<?php  

  $testimonial=$app_func->select("SELECT * FROM `testimonial` WHERE  lang_id='$lang_id' " );
 

?>
<section class="py-5 sm-pb-8">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="text-center">
            <h4 class="title"><span><?php echo $Dictionary['UniversityWall'] ?> </span></h4>
            
          </div>
      </div>
      <div class="col-sm-12">
        <div class="owl-carousel owl-theme" data-items="3" data-sm-items="1" data-margin="30" data-autoplay="true">
  <?php  
        foreach ($testimonial as $key => $row) {
               $TestimonialImage = function_exists('techcms_clean_image_path') ? techcms_clean_image_path($row['TestimonialImage'], 'frontend', 'uploads/no-image.png') : preg_replace('#^.*?(?:^|[/\\\\])uploads[/\\\\]#i', 'uploads/', $row['TestimonialImage']);
               $safeImg = !empty($TestimonialImage) ? htmlspecialchars($TestimonialImage, ENT_QUOTES) : 'uploads/no-image.png';
               $safeName = htmlspecialchars($row['TestimonialName'] ?? '', ENT_QUOTES);
                
              echo '

                <div class="item">
            <div class="testimonial style-3 mx-3">
              <div class="testimonial-avatar">
                <div class="testimonial-img">
                  <img class="img-center" src="'.$safeImg.'" onerror="this.onerror=null;this.src=\'uploads/no-image.png\';" alt="'.$safeName.'">
                </div>
              </div>
              <div class="testimonial-content"> <span><i class="fas fa-quote-left"></i></span>
                <p>
                  
                   '.$row['TestimonialContnet'].'
                </p>
                <div class="testimonial-caption">
                  <h6> '.$row['TestimonialName'].'</h6>
                  
                </div>
              </div>
            </div>
          </div>
                   
              '; 
        }

?>
        
 
        </div>
      </div>
    </div>
  </div>
</section>

 