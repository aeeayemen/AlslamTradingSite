<!-- Start Contact Section -->
        <section class="contact-section bg-light pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                       <div class="get-in-touch-section py-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="get-in-touch-wrapper">
                                     <div class="contact-wrapper">
                                        <h3>
                                            <?php echo $Dictionary['contact_info']; ?>
                                        </h3>
                                            <ul class="contact-info mt-4">
                                                <li>
                                                    <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>
                                                    <?php if ($lang_id ==1) { echo " العنوان  "; } else { echo " Address "; } ?>  :<br>
                                                    <?php echo $DetailCompany['Address']; ?>
                                                </li>    
                                               <li>
                                        <i class="flaticon-telephone-handle-silhouette"></i>
                                        <?php if ($lang_id ==1) { echo " اتصل بنا "; } else { echo " Call Us "; } ?>  :<br>
                                        <?php if ($DetailCompany['Phone']!="") {
                      echo '<a href="tel:'.$DetailCompany['Phone'].'">
          <bdo dir="ltr">'.$DetailCompany['Phone'].' </bdo></a>' ;}
            ?>
            <?php if ($DetailCompany['Mobile']!="") {
                      echo '<br> <a href="tel:'.$DetailCompany['Mobile'].'">
          <bdo dir="ltr">'.$DetailCompany['Mobile'].' </bdo></a>' ;}
            ?>
             <?php if ($DetailCompany['Phone1']!="") {
                      echo '<br> <a href="tel:'.$DetailCompany['Phone1'].'">
          <bdo dir="ltr">'.$DetailCompany['Phone1'].' </bdo></a>' ;}
            ?>
            <?php if ($DetailCompany['Phone2']!="") {
                      echo '<br> <a href="tel:'.$DetailCompany['Phone2'].'">
          <bdo dir="ltr">'.$DetailCompany['Phone2'].' </bdo></a>' ;}
            ?>
                                    </li>
                                    <li>
                                        <i class="fa fa-fax"></i>
                                         <?php if ($lang_id ==1) { echo " فاكس "; } else { echo " Fax "; } ?>  :<br>
                                          <?php if ($DetailCompany['Fax']!="") {
                      echo '<a href="tel:'.$DetailCompany['Fax'].'">
          <bdo dir="ltr">'.$DetailCompany['Fax'].' </bdo></a>' ;}
            ?>
                                    </li>
                                    <li>
                                        <i class="flaticon-mail-black-envelope-symbol"></i>
                                        <?php if ($lang_id ==1) { echo " البريد الإلكتروني "; } else { echo " Email "; } ?> :<br>
                                        <a href="mailto:<?php echo $DetailCompany['Email']; ?>"><?php echo $DetailCompany['Email']; ?></a>
                                    </li>
                                    
                                            </ul>
                                    </div>
                                    <div class="get-in">
                                        <ul class="social-links text-center mt-3">
                                    <li>
                                        <a href="<?php echo $DetailCompany['Twitter']; ?>"><i class="flaticon-twitter-black-shape"></i></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $DetailCompany['Youtube']; ?>"><i class="flaticon-youtube"></i></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $DetailCompany['Facebook']; ?>"><i class="flaticon-facebook-logo"></i></a>
                                    </li>
                                </ul>
                                    </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="Form-contact">
                            <div class="section-title-left">
                                
                                <h2><?php echo $Dictionary['contact_nav']; ?></h2>
                            </div>
                            <form id="contactForm">
                                <div class="alert alert-primary alert_notif" role="alert" id="alert_notif"></div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="<?php echo $Dictionary['enter_name']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="<?php echo $Dictionary['enter_email']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="subject" class="form-control" placeholder="<?php echo $Dictionary['enter_subject']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" cols="30" rows="5" class="form-control" placeholder="<?php echo $Dictionary['enter_message']; ?>"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <input type="button" id="submitcontactForm" class="default-btn" value="<?php echo $Dictionary['send']; ?>">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
					
                </div>
				
            </div>
        </section>
        <!-- End Contact Section -->