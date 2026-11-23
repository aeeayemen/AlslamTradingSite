<style type="text/css">
 .formdetailcompanyen label{
 	padding:10px;
 	font-weight:bold; 
 	  
 }
 .formdetailcompanyen h3{
  
 	text-align:center; 
 }
.formdetailcompanyen	 .emailsect{
border:2px solid #ddd;
 padding:10px; 
 }
 .numberssect {
 	border-bottom:2px solid #ddd;
 }
 #imagelogoen{
 	width:100%;
  
 }
 .formdetailcompanyen .image  {
	border:2px solid #ddd;
	 padding:10px; 
 }
.formdetailcompanyen .col-md-1,.formdetailcompanyen .col-md-2,.formdetailcompanyen .col-md-3,.formdetailcompanyen .col-md-4,.formdetailcompanyen .col-md-5,.formdetailcompanyen .col-md-6,.formdetailcompanyen .col-md-7,.formdetailcompanyen .col-md-8,.formdetailcompanyen .col-md-9,.formdetailcompanyen .col-md-10,.formdetailcompanyen .col-md-11,.formdetailcompanyen .col-md-12{
   float:left; 
 }
.formdetailcompanyen .input-icon.right > i{
 left: unset;
right: 8px;
float: left;              
     	 }

.formdetailcompanyen  .input-icon.right > .form-control {
padding-left: 12px;
padding-right: 12px;
}                  


</style> 

<div class="portlet-body form formdetailcompanyen">
<!-- BEGIN FORM-->

<table>
<tbody>
<tr>
<td>
	

				<!-- BEGIN FORM-->
				<form  id="formdetailcoEnglish" class="form-horizontal" dir="ltr">
						<input type="hidden" name="company_id"  value="<?php echo $rowen['company_id']; ?>" id="company_id">
					<div class="form-body">
						<input type="hidden" name="lang_id"  value="2">
							<input type="hidden" name="company_id"  value="<?php echo $rowen['company_id']; ?>">
						<div class="form-group">
							<label class="col-md-3 control-label">Name (Institution / Company):</label>
							<div class="col-md-6">
								<input type="text"name="Name" class="form-control input-circle" placeholder="اكتب   هنا" value="<?php echo $rowen['Name']; ?>">
								 
							</div>
						</div>

						<div class="form-group">
							 <label class="col-md-3 control-label">Address:</label>
							<div class="col-md-6">
								<input type="text" name="Address" class="form-control input-circle" placeholder="اكتب   هنا" value="<?php echo $rowen['Address']; ?>">
								 
							</div>
						</div>
						<div class="form-group emailsect">
							<label class="col-md-2 control-label">E-mail:</label>
							<div class="col-md-5">
								<div class="input-group">
									<input type="email" name="Email" class="form-control input-circle-right" value="<?php echo $rowen['Email']; ?>" placeholder="Email Address">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-envelope"></i>
									</span>
									
								</div>
							</div>

							<div class="col-md-5">
								<div class="input-group">
									<input type="email" name="Email2" class="form-control input-circle-right" value="<?php echo $rowen['Email2']; ?>" placeholder="Email Address">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-envelope"></i>
									</span>
									
								</div>
							</div>

						</div>

						<div class="form-group emailsect">
						
							<div class="col-md-6">
									<label class="col-md-2 control-label">Email-Forms:</label>
								<div class="input-group">
									<input type="email" name="EmailRC" class="form-control input-circle-right" value="<?php echo $rowen['EmailRC']; ?>" placeholder="Email Address">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-envelope"></i>
									</span>
									
								</div>
							</div>

							<div class="col-md-6">
									<label class="col-md-2 control-label">Email Job:</label>
								<div class="input-group">
									<input type="email" name="EmailJ" class="form-control input-circle-right" value="<?php echo $rowen['EmailJ']; ?>" placeholder="Email Address">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-envelope"></i>
									</span>
									
								</div>
							</div>
							<div class="col-md-6">
								<label class="col-md-2 control-label">E-mail Notifcation:</label>
								<div class="input-group">
									<input type="email" name="EmailNotifcation" class="form-control input-circle-right" value="<?php echo $rowen['EmailNotifcation']; ?>" placeholder="Email Address">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-envelope"></i>
									</span>
									
								</div>
							</div>
							
						</div>

					    <div class="numberssect">
						<div class="form-group ">
							 
							<div class="col-md-4">
								<label class="control-label">Mobile number:</label>
								<div class="input-icon right">
									<i class="fa fa-phone"></i>
									<input type="text" name="Mobile" class="form-control input-circle" value="<?php echo $rowen['Mobile']; ?>" placeholder="">
								</div>
							</div> 
							<div class="col-md-4">
								<label class="control-label">Phone number (1):</label>
								<div class="input-icon right">
									<i class="fa fa-phone"></i>
									<input type="text" name="Phone" class="form-control input-circle" value="<?php echo $rowen['Phone']; ?>" placeholder="">
								</div>
							</div>
						
							<div class="col-md-4">
									<label class="control-label">Phone number (2):</label>
								<div class="input-icon right">
									<i class="fa fa-phone"></i>
									<input type="text" name="Phone1" class="form-control input-circle" value="<?php echo $rowen['Phone1']; ?>" placeholder="">
								</div>
							</div>
						</div>

						<div class="form-group">
							
							<div class="col-md-4">
								<label class="control-label">Phone number (3):</label>
								<div class="input-icon right">
									<i class="fa fa-phone"></i>
									<input type="text" name="Phone2" class="form-control input-circle" value="<?php echo $rowen['Phone2']; ?>" placeholder="">
								</div>
							</div> 
							
							<div class="col-md-4">
								<label class="control-label">Fax:</label>
								<div class="input-icon right">
									<i class="fa fa-fax"></i>
									<input type="text" name="Fax" class="form-control input-circle" value="<?php echo $rowen['Fax']; ?>" placeholder="">
								</div>
							</div> 
							
							<div class="col-md-4">
								<label class="control-label">mail box:</label>
								<div class="input-icon right">
									<i class="fa fa-print"></i>
									<input type="text" name="box" class="form-control input-circle" value="<?php echo $rowen['box']; ?>" placeholder="">
								</div>
							</div>
						</div>
					</div>
                     
						<div class="form-group">
							  <h3>Social Media</h3>
							<div class="col-md-6">
								<label class="control-label">Facebook:</label>
								<div class="input-icon right">
									<i class="fa fa-facebook"></i>
									<input type="text" name="Facebook" class="form-control input-circle" value="<?php echo $rowen['Facebook']; ?>" placeholder="">
								</div>
							</div> 
							
							
							<div class="col-md-6">
								<label class="control-label"> YouTube:</label>
								<div class="input-icon right">
									<i class="fa fa-youtube"></i>
									<input type="text" name="Youtube" class="form-control input-circle" value="<?php echo $rowen['Youtube']; ?>" placeholder="">
								</div>
							</div>

							<div class="col-md-4">
								<label class="control-label">Twitter:</label>
								<div class="input-icon right">
									<i class="fa fa-twitter"></i>
									<input type="text" name="Twitter" class="form-control input-circle" value="<?php echo $rowen['Twitter']; ?>" placeholder="">
								</div>
							</div> 

							<div class="col-md-4">
								<label class="control-label">Google Plus:</label>
								<div class="input-icon right">
									<i class="fa fa-googleplus"></i>
									<input type="text" name="googleplus" class="form-control input-circle" value="<?php echo $rowen['googleplus']; ?>" placeholder="">
								</div>
							</div> 


							<div class="col-md-4">
								<label class="control-label">اInstagram:</label>
								<div class="input-icon right">
									<i class="fa fa-instagram"></i>
									<input type="text" name="instagram" class="form-control input-circle" value="<?php echo $rowen['instagram']; ?>" placeholder="">
								</div>
							</div> 
						</div>

						<div class="form-group ">
							 
								<label class="control-label">Location on Map:</label>
								<div class="input-icon right">
									<i class="fa fa-mapmarker"></i>
									<textarea type="text" cols="10" rows="10" name="geoglocation" class="form-control input-circle" > 
									<?php echo $rowen['geoglocation']; ?>
									</textarea>
									 
								 
							</div> 

						</div>

						<div class="form-group image">
                            
							<div class="col-md-5">
								<label class="control-label">Logo:</label>
								<a  class="btn iframe-btn" type="button" href="<?PHP echo FILEMANAGERPATH;  ?>/dialog.php?type=1&editor=mce_0&field_id=logoen&relative_url=0&multiple=0">Selection </a>
								<div class="input-icon right">
									<i class="fa fa-image"></i>
									<input type="text" name="logo" id="logoen" class="form-control input-circle" value="<?php echo $rowen['logo']; ?>" onchange="checken()" placeholder="">
								</div> 
							</div> 
							<div class="col-md-4">
									<img src="<?php echo $logoen; ?>" id="imagelogoen" onerror="this.onerror=null; this.src='../../assets/images/no-image.png';" style="max-height:80px; max-width:100%; object-fit:contain;"> 
							</div>


						</div>

						<div class="form-group">
                            
							 
							<div class="col-md-6">
								<label class="control-label">Keywords:</label>
								<div class="input-icon right"> 
									<textarea type="text" cols="10" rows="10" name="keyword" class="form-control input-circle" > 
										<?php echo $rowen['keyword']; ?>
									</textarea>
								</div>
							</div> 


							<div class="col-md-6">
								<label class="control-label">Seo Description</label>
								<div class="input-icon right">
									 
									<textarea type="text" cols="10" rows="10" name="seo_description" class="form-control input-circle" > 
										<?php echo $rowen['seo_description']; ?>
									</textarea>
									 
								</div>
							</div> 

						</div>


						<div class="form-group image hidden">
                            <div class="col-md-6 hidden">
								<label class="control-label">Google Play:</label>
								 
								<div class="input-icon right">
									<i class="fa fa-link"></i>
									<input type="text" name="googleplay"  referrerpolicy="no-referrer-when-downgrade"  class="form-control input-circle" value="<?php echo $rowen['googleplay']; ?>"   placeholder="">
								</div> 
							</div> 
							 
                            
							<div class="col-md-6 hidden">
								<label class="control-label">Apple Store:</label>
							 
								<div class="input-icon right">
									<i class="fa fa-link"></i>
									<input type="text" name="appstore"  referrerpolicy="no-referrer-when-downgrade"  class="form-control input-circle" value="<?php echo $rowen['appstore']; ?>"   placeholder="">
								</div> 
							</div>  

							 
						</div>

						<div class="form-group">
                            <div class="col-md-6"> 
								<label class="col-md-4 control-label">Site Activation:</label>
								<div class="col-md-8">
								 <select name="Is_Actieved" class="form-control ">
								 	  <option value="<?php echo $rowar['Is_Actieved']; ?>"><?php echo $rowar['Is_Actieved']; ?></option>
								 	  <option value="Yes">Yes</option>
								 	  <option value="No">No</option>
								 </select>
								 </div>
							</div> 
							 
                            
							<div class="col-md-6">
								<label class="col-md-4 control-label">Jobs</label>
							 
							 <div class="col-md-8">
								 <select name="job_active" class="form-control">
								 	  <option value="<?php echo $rowar['job_active']; ?>"><?php echo $rowar['job_active']; ?></option>
								 	  <option value="Yes">Yes</option>
								 	  <option value="No">No</option>
								 </select>
								</div>
							</div>  
						</div>


						<div class="form-group image">
                            <div class="col-md-6">
                                <label class="control-label">Video Url:</label>

                                <div class="input-icon right">
                                    <i class="fa fa-link"></i>
                                    <input type="text" name="URL" class="form-control input-circle"
                                           value="<?php echo $rowar['URL']; ?>" placeholder="">
                                </div>
                            </div>
                             <div class="col-md-6 hidden">
							<div class="col-md-8">
								<label class="control-label"> Banner Maintenance :</label>
								<a  class="btn iframe-btn" type="button" href="../filemanager/dialog.php?type=1&editor=mce_0&field_id=banneren1&relative_url=0&multiple=0">اختيار  </a>
								<div class="input-icon right">
									<i class="fa fa-image"></i>
									<input type="text" name="banner1" id="banneren1" class="form-control input-circle" value="<?php echo $rowen['banner1']; ?>" onchange="checkbanneren1()" placeholder="">
								</div> 
							</div> 
							<div class="col-md-4">
									<img src="<?php echo $banneren1; ?>" id="imagebanneren1" onerror="this.onerror=null; this.src='../../assets/images/no-image.png';" style="max-height:120px; width:100%; object-fit:contain;"> 
							</div>
                          </div>

                             <div class="col-md-6 hidden">
							<div class="col-md-8">
								<label class="control-label">Banner(2):</label>
								<a  class="btn iframe-btn" type="button" href="<?PHP echo FILEMANAGERPATH;  ?>/dialog.php?type=1&editor=mce_0&field_id=banneren2&relative_url=0&multiple=0">اختيار  </a>
								<div class="input-icon right">
									<i class="fa fa-image"></i>
									<input type="text" name="banner2" id="banneren2" class="form-control input-circle" value="<?php echo $rowen['banner2']; ?>" onchange="checkbanneren2()" placeholder="">
								</div> 
							</div> 
							<div class="col-md-4">
									<img src="<?php echo $banneren2; ?>" id="imagebanneren2" onerror="this.onerror=null; this.src='../../assets/images/no-image.png';" style="max-height:120px; width:100%; object-fit:contain;"> 
							</div>
                          </div>
                             <div class="col-md-6 hidden">
							<div class="col-md-8">
								<label class="control-label">Banner (3):</label>
								<a  class="btn iframe-btn" type="button" href="<?PHP echo FILEMANAGERPATH;  ?>/dialog.php?type=1&editor=mce_0&field_id=banneren3&relative_url=0&multiple=0">اختيار  </a>
								<div class="input-icon right">
									<i class="fa fa-image"></i>
									<input type="text" name="banner3" id="banneren3" class="form-control input-circle" value="<?php echo $rowen['banner3']; ?>" onchange="checkbanneren3()" placeholder="">
								</div> 
							</div> 
							<div class="col-md-4">
									<img src="<?php echo $banneren3; ?>" id="imagebanneren3" onerror="this.onerror=null; this.src='../../assets/images/no-image.png';" style="max-height:120px; width:100%; object-fit:contain;"> 
							</div>
                          </div>
                             <div class="col-md-6 hidden">
							<div class="col-md-8">
								<label class="control-label">Banner (4):</label>
								<a  class="btn iframe-btn" type="button" href="<?PHP echo FILEMANAGERPATH;  ?>/dialog.php?type=1&editor=mce_0&field_id=banneren4&relative_url=0&multiple=0">اختيار  </a>
								<div class="input-icon right">
									<i class="fa fa-image"></i>
									<input type="text" name="banner4" id="banneren4" class="form-control input-circle" value="<?php echo $rowen['banner4']; ?>" onchange="checkbanneren4()" placeholder="">
								</div> 
							</div> 
							<div class="col-md-4">
									<img src="<?php echo $banneren4; ?>" id="imagebanneren4" onerror="this.onerror=null; this.src='../../assets/images/no-image.png';" style="max-height:120px; width:100%; object-fit:contain;"> 
							</div>
                          </div>

						</div>


						 
						 
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-5">
								<button type="button" class="btn btn-block btn-circle blue" id="savedataEn" name="Save">Save</button>
								 
								 
							</div>
						</div>
					</div>
				</form>
				<!-- END FORM-->

			</td>
		</tr>
	</tbody>
</table>

			</div>