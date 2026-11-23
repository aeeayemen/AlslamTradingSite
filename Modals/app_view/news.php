        <!-- Start Blog Section -->
        <section class="blog-section ptb-100  bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title-left">
                           <!--  <h4><?php echo $Dictionary['news_nav']; ?></h4> -->
                            <h2><?php echo $Dictionary['news_nav']; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $GetIndexNews = $app_func->GetIndexNews($lang_id);
                    echo $GetIndexNews;
                    ?>
                    
                </div>
            </div>
        </section>
        <!-- End Blog Section -->