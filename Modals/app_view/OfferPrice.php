<!-- get a OfferPrice start -->

<a class="contact-btn" data-toggle="modal" data-target="#myModal">
  <div class="contact-bg"> <?php echo $Dictionary['offerPrice']; ?> </div>
</a>
<div class="contact-form text-black"> <a class="close-btn text-capitalize text-right"><i class="flaticon-cancel"></i></a>
  <h2 class="title text-right mb-5"><span><?php echo $Dictionary['requestOfferPrice']; ?> </span></h2>

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

<!-- get a OfferPrice end -->
