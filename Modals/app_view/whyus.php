<!-- whyus start-->
<?php
   $advantage= $app_func->GetAboutSectionRow($lang_id,'Postion3');  
   $advantages=$app_func->get_advantages($lang_id);

?>
<?php if($advantage['Is_Actieved'] === 'Yes'){ ?>
<section class="dark-bg pos-r">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-12 pl-lg-5">
        <div class="row">
          <div class="col-md-12">
            <div class="section-title mb-4">
              <h2 class="title text-right">
                <?php echo $advantage['Title'] ?>
              </h2>
            </div>
            <p class="line-h-3 text-white">
              <?php echo $advantage['content'] ?> 
            </p>
            <div class="row text-white mt-5">
          <?php 
             
            echo $advantages;
          ?>
      <!-- <div class="col-md-6 col-sm-6">
        <div class="featured-item text-center p-0">
          <div class="featured-icon"> <i class="flaticon-innovation text-theme"></i>
          </div>
          <div class="featured-title text-uppercase">
            <h5>
              أحدث التقنيات
            </h5>
          </div>
          <div class="featured-desc">
            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 xs-mt-5">
        <div class="featured-item text-center p-0">
          <div class="featured-icon"> <i class="flaticon-innovation-1 text-theme"></i>
          </div>
          <div class="featured-title text-uppercase">
            <h5> السهولة والسرعة </h5>
          </div>
          <div class="featured-desc">
            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 mt-5">
        <div class="featured-item text-center p-0">
          <div class="featured-icon"> <i class="flaticon-employee text-theme"></i>
          </div>
          <div class="featured-title text-uppercase">
            <h5>فريق خبراء </h5>
          </div>
          <div class="featured-desc">
            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 mt-5">
        <div class="featured-item text-center p-0">
          <div class="featured-icon"> <i class="flaticon-chat-bubble text-theme"></i>
          </div>
          <div class="featured-title text-uppercase">
            <h5>دائما على اتصال  </h5>
          </div>
          <div class="featured-desc">
            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.</p>
          </div>
        </div>
      </div> -->
    </div>
          </div>
        </div>
      </div>
    </div>
  </div><div class="side-background side-image">
    <div class="row">
      <div class="col-lg-6 img-side img-left" style="background: url(<?php echo  $advantage['Image']; ?>) no-repeat left center; background-size: cover;"></div>
    </div>
  </div>
</section>
<?php }else{} ?>
<!-- whyus end-->

<!--project start-->
<!-- 
<section class="o-hidden" >
  <div class="container">
    <div class="row text-center">
      <div class="col-lg-8 col-md-10 ml-auto mr-auto">
        <div class="section-title">
          <h2 class="title">من   <span> اعمالنا </span></h2>
          <p class="mb-0">
            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid p-0">
    <div class="row">
      <div class="col-md-12">
        <div class="owl-carousel owl-theme popup-gallery no-pb" data-items="4" data-md-items="3" data-sm-items="2" data-dots="false" data-nav="true" data-autoplay="true">
          <div class="item">
            <div class="portfolio-item">
              <img src="uploads/project/01.jpg" alt="">
              <div class="portfolio-hover">
                <div class="portfolio-title"> <span>اسم القطاع</span>
                  <h4>اسم المشروع</h4>
                </div>
                <div class="portfolio-icon">
                  <a class="popup popup-img" href="uploads/project/01.jpg"> <i class="fas fa-search"></i>
                  </a>
                  <a class="popup portfolio-link" target="_blank" href="#portfolio-details.html"> <i class="fas fa-link"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="portfolio-item">
              <img src="uploads/project/02.jpg" alt="">
              <div class="portfolio-hover">
                <div class="portfolio-title"> <span>اسم القطاع</span>
                  <h4>اسم المشروع</h4>
                </div>
                <div class="portfolio-icon">
                  <a class="popup popup-img" href="uploads/project/02.jpg"> <i class="fas fa-search"></i>
                  </a>
                  <a class="popup portfolio-link" target="_blank" href="project-details.php?lang=ar&cat=1&pro=1"> <i class="fas fa-link"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="portfolio-item">
              <img src="uploads/project/01.jpg" alt="">
              <div class="portfolio-hover">
                <div class="portfolio-title"> <span>اسم القطاع</span>
                  <h4>اسم المشروع</h4>
                </div>
                <div class="portfolio-icon">
                  <a class="popup popup-img" href="uploads/project/01.jpg"> <i class="fas fa-search"></i>
                  </a>
                  <a class="popup portfolio-link" target="_blank" href="project-details.php?lang=ar&cat=1&pro=1"> <i class="fas fa-link"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="portfolio-item">
              <img src="uploads/project/02.jpg" alt="">
              <div class="portfolio-hover">
                <div class="portfolio-title"> <span>اسم القطاع</span>
                  <h4>اسم المشروع</h4>
                </div>
                <div class="portfolio-icon">
                  <a class="popup popup-img" href="uploads/project/02.jpg"> <i class="fas fa-search"></i>
                  </a>
                  <a class="popup portfolio-link" target="_blank" href="project-details.php?lang=ar&cat=1&pro=1"> <i class="fas fa-link"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="portfolio-item">
              <img src="uploads/project/01.jpg" alt="">
              <div class="portfolio-hover">
                <div class="portfolio-title"> <span>اسم القطاع</span>
                  <h4>اسم المشروع</h4>
                </div>
                <div class="portfolio-icon">
                  <a class="popup popup-img" href="uploads/project/01.jpg"> <i class="fas fa-search"></i>
                  </a>
                  <a class="popup portfolio-link" target="_blank" href="project-details.php?lang=ar&cat=1&pro=1"> <i class="fas fa-link"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="portfolio-item">
              <img src="uploads/project/02.jpg" alt="">
              <div class="portfolio-hover">
                <div class="portfolio-title"> <span>اسم القطاع</span>
                  <h4>اسم المشروع</h4>
                </div>
                <div class="portfolio-icon">
                  <a class="popup popup-img" href="uploads/project/02.jpg"> <i class="fas fa-search"></i>
                  </a>
                  <a class="popup portfolio-link" target="_blank" href="project-details.php?lang=ar&cat=1&pro=1"> <i class="fas fa-link"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->

<!--project end-->
