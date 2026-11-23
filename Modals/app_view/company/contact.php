<!-- Start Contact Section -->
<section class="contact-section  bg-light pt-100" id="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 bg-white py-4">
                <div class="about-text-wrapper " style="text-align: start;">
                    <div class="section-title-left text-center">

                        <h2><?php echo $Dictionary['contact_info']; ?></h2>
                    </div>
                    <div class="section-title-left">
                       <!--  <h4 style="text-align: start;"><?php echo $Dictionary['contact_info']; ?></h4> -->
                        <h4><?php echo $Dictionary['contact_desc']; ?></h4>

                    </div>
                    <div class="about-list">
                        <p>
                            <i class="fa fa-map-marker"></i> <?php echo $company_info['address']; ?>
                        </p>
                    </div>
                    <div class="about-list">
                        <p>
                            <i class="fa fa-envelope"></i> <?php echo $company_info['email']; ?>
                        </p>
                    </div>
                    <div class="about-list">
                        <p>
                            <i class="fa fa-phone"></i> <?php echo $company_info['mobile']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="Form-contact">
                    <div class="section-title-left text-center">

                        <h2><?php echo $Dictionary['contact_now']; ?></h2>
                    </div>
                    <form id="contactFormsector">
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
                                <input type="button" id="submitcontactFormsector" class="default-btn" value="<?php echo $Dictionary['send']; ?>">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End Contact Section -->
