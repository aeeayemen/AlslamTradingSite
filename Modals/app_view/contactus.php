
<!--contact start-->
<section class="contact-2 grey-bg">
  <div class="container">
    <div class="row pos-r">

      <div class="col-lg-8 mr-auto">
        <div class="contact-main">
          <h4 class="title mb-4 text-right"><span><?php echo $Dictionary['send_inquiries']; ?>: </span></h4> 
          
          <form id="fromcontactmada">
              <div class="alert alert-primary alert_notif" role="alert" id="alert_notif" style="  ">
                      
                    </div> 
            <div class="form-group">
              <input type="hidden" name="emailmada" value="<?php echo $DetailCompany['Email'] ?>">
            </div>
            <div class="form-group">
              <input id="form_name" type="text" name="name" class="form-control" placeholder=" <?php echo $Dictionary['your_name']; ?> " required="required" data-error=" Name is required .">
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
              <input id="form_email" type="email" name="email" class="form-control" placeholder="<?php echo $Dictionary['your_email']; ?> " required="required" data-error=" Valid email is required .">
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
              <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="<?php echo $Dictionary['mobile_number']; ?> " required="required" data-error=" Valid mobile is required ">
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
              <input id="subject" type="text" name="subject" class="form-control" placeholder=" <?php echo $Dictionary['sendmfsubject']; ?> " >
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
              <textarea id="form_message" name="message" class="form-control" placeholder=" <?php echo $Dictionary['sendmfmessage']; ?> " rows="4" required="required" data-error="Please,leave us a message."></textarea>
              <div class="help-block with-errors"></div>
            </div>
            <button type="button" class="btn btn-border btn-radius" id="submitmada"><span> <?php echo $Dictionary['sendmfbutton']; ?> </span>
            </button>
          </form>
        </div>
      </div>
      <div class="form-info theme-bg text-white contactus-bg">
        <h2 class="title"><span>
          <?php echo $Dictionary['stay_us']; ?> !
        </span></h2>
        <p>
          <?php echo $Dictionary['stay_us_nots']; ?>
          
        </p>
        <ul class="contact-info list-unstyled mt-4">
          <li class="mb-4"><i class="flaticon-paper-plane"></i><span> <?php echo $Dictionary['adress']; ?> :</span>
            <p><?php echo $DetailCompany['Address'] ?> </p>
          </li>
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
    </div>
  </div>
</section>

<!--contact end-->


       

