<!--subscribe start-->
<section class="dark-bg py-5 bg-cover" data-bg-img="uploads/subscribe.jpg" data-overlay="8" >
	<div class="container">
    <div class="row align-items-center">
      <div class="col-md-4 col-sm-12">
        <h3 class="text-white "> 
        <?php echo $Dictionary['ToreceiveourNewSubscribeWithUs']; ?> <span class="text-theme font-weight-bold">    </span></h3>
      </div>
      <div class="col-md-8 col-sm-12">
      	<form id="subscribe" method="post" action="">
      		<div class="row">
      			<div class="col-md-8 col-sm-8">
      				<div class="form-group">
              <input id="form_email" type="email" name="email" class="form-control" placeholder="<?php echo $Dictionary['email']; ?> " required="required" data-error="<?php echo $Dictionary['Email_required']; ?> .">
              <div class="help-block with-errors"></div>
            </div>
      			</div>
      			<div class="col-md-4 col-sm-4">
      				<button class="btn btn-border btn-radius"><span><?php echo $Dictionary['subscribe']; ?>   </span>
            </button>
      			</div>
      		</div>
      		
            
      	</form>
      </div>
      
    </div>
  </div>
</section>
<!--subscribe end-->
