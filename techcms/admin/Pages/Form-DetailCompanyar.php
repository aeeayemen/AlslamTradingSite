
<div class="portlet-body form formdetailcompany">
	<!-- BEGIN FORM-->

	<table>
		<tbody>
			  <tr>
			  	  <td>
			  	  	


	<form  id="formdetailcoarabic" class="form-horizontal" action="" title='' style="margin:0px;" method="post">
		<div class="form-body">
			<input type="hidden" name="lang_id"  value="1">
				<input type="hidden" name="company_id"  value="<?php echo $rowar['company_id']; ?>" id="company_id">
			<div class="form-group">
				<label class="col-md-3 control-label">اسم(المؤسسة /الشركة):</label>
				<div class="col-md-6">
					<input type="text"name="Name" class="form-control input-circle" placeholder="اكتب   هنا" value="<?php echo $rowar['Name']; ?>">
					 
				</div>
			</div>

			<div class="form-group">
				 <label class="col-md-3 control-label">العنوان:</label>
				<div class="col-md-6">
					<input type="text" name="Address" class="form-control input-circle" placeholder="اكتب   هنا" value="<?php echo $rowar['Address']; ?>">
					 
				</div>
			</div>
			<div class="form-group emailsect">
				<label class="col-md-2 control-label">البريد  الاكتروني  :</label>
				<div class="col-md-5">
					<div class="input-group">
						<input type="email" name="Email" class="form-control input-circle-left" value="<?php echo $rowar['Email']; ?>" placeholder="Email Address">
						<span class="input-group-addon input-circle-right">
						<i class="fa fa-envelope"></i>
						</span>
						
					</div>
				</div>

				<div class="col-md-5">
					<div class="input-group">
						<input type="email" name="Email2" class="form-control input-circle-left" value="<?php echo $rowar['Email2']; ?>" placeholder="Email Address">
						<span class="input-group-addon input-circle-right">
						<i class="fa fa-envelope"></i>
						</span>
						
					</div>
				</div>
				

			</div>

			<div class="form-group emailsect">
			
				<div class="col-md-4">
						<label class="col-md-5 control-label">بريد  الالنماذج:</label>
					<div class="input-group col-md-7">
						<input type="email" name="EmailRC" class="form-control input-circle-left" value="<?php echo $rowar['EmailRC']; ?>" placeholder="Email Address">
						<span class="input-group-addon input-circle-right">
						<i class="fa fa-envelope"></i>
						</span>
						
					</div>
				</div>

				<div class="col-md-4">
						<label class="col-md-5 control-label">بريد  التوظيف:</label>
					<div class="input-group col-md-7">
						<input type="email" name="EmailJ" class="form-control input-circle-left" value="<?php echo $rowar['EmailJ']; ?>" placeholder="Email Address">
						<span class="input-group-addon input-circle-right">
						<i class="fa fa-envelope"></i>
						</span>
						
					</div>
				</div>

				<div class="col-md-4">
					<label class="col-md-4 control-label">الاشعارات:</label>
					<div class="input-group col-md-8">
						<input type="email" name="EmailNotifcation" class="form-control input-circle-left" value="<?php echo $rowar['EmailNotifcation']; ?>" placeholder="Email Address">
						<span class="input-group-addon input-circle-right">
						<i class="fa fa-envelope"></i>
						</span>
						
					</div>
				</div>
				
			</div>

		    <div class="numberssect">
			<div class="form-group ">
				 
				<div class="col-md-4">
					<label class="control-label">رقم الجوال:</label>
					<div class="input-icon right">
						<i class="fa fa-phone"></i>
						<input type="text" name="Mobile" class="form-control input-circle" value="<?php echo $rowar['Mobile']; ?>" placeholder="">
					</div>
				</div> 
				<div class="col-md-4">
					<label class="control-label">رقم   الهاتف   (1):</label>
					<div class="input-icon right">
						<i class="fa fa-phone"></i>
						<input type="text" name="Phone" class="form-control input-circle" value="<?php echo $rowar['Phone']; ?>" placeholder="">
					</div>
				</div>
			
				<div class="col-md-4">
						<label class="control-label">رقم   الهاتف   (2):</label>
					<div class="input-icon right">
						<i class="fa fa-phone"></i>
						<input type="text" name="Phone1" class="form-control input-circle" value="<?php echo $rowar['Phone1']; ?>" placeholder="">
					</div>
				</div>
			</div>

			<div class="form-group">
				
				<div class="col-md-4">
					<label class="control-label">رقم   الهاتف   (3):</label>
					<div class="input-icon right">
						<i class="fa fa-phone"></i>
						<input type="text" name="Phone2" class="form-control input-circle" value="<?php echo $rowar['Phone2']; ?>" placeholder="">
					</div>
				</div> 
				
				<div class="col-md-4">
					<label class="control-label">فاكس:</label>
					<div class="input-icon right">
						<i class="fa fa-fax"></i>
						<input type="text" name="Fax" class="form-control input-circle" value="<?php echo $rowar['Fax']; ?>" placeholder="">
					</div>
				</div> 
				
				<div class="col-md-4">
					<label class="control-label">صندوق البريد:</label>
					<div class="input-icon right">
						<i class="fa fa-print"></i>
						<input type="text" name="box" class="form-control input-circle" value="<?php echo $rowar['box']; ?>" placeholder="">
					</div>
				</div>
			</div>
		</div>
         
			<div class="form-group">
				  <h3>مواقع  التواصل الاجتماعي</h3>
				<div class="col-md-6">
					<label class="control-label">فيسبوك:</label>
					<div class="input-icon right">
						<i class="fa fa-facebook"></i>
						<input type="text" name="Facebook" class="form-control input-circle" value="<?php echo $rowar['Facebook']; ?>" placeholder="">
					</div>
				</div> 
				
				
				<div class="col-md-6">
					<label class="control-label">يوتيوب:</label>
					<div class="input-icon right">
						<i class="fa fa-youtube"></i>
						<input type="text" name="Youtube" class="form-control input-circle" value="<?php echo $rowar['Youtube']; ?>" placeholder="">
					</div>
				</div>

				<div class="col-md-4">
					<label class="control-label">تويتر:</label>
					<div class="input-icon right">
						<i class="fa fa-twitter"></i>
						<input type="text" name="Twitter" class="form-control input-circle" value="<?php echo $rowar['Twitter']; ?>" placeholder="">
					</div>
				</div> 

				<div class="col-md-4">
					<label class="control-label">قوقل بلس:</label>
					<div class="input-icon right">
						<i class="fa fa-googleplus"></i>
						<input type="text" name="googleplus" class="form-control input-circle" value="<?php echo $rowar['googleplus']; ?>" placeholder="">
					</div>
				</div> 


				<div class="col-md-4">
					<label class="control-label">انستقرام:</label>
					<div class="input-icon right">
						<i class="fa fa-instagram"></i>
						<input type="text" name="instagram" class="form-control input-circle" value="<?php echo $rowar['instagram']; ?>" placeholder="">
					</div>
				</div> 
			</div>

			<div class="form-group ">
				 
					<label class="control-label">الموقع على الخريطة:</label>
					<div class="input-icon right">
						<i class="fa fa-mapmarker"></i>
						<textarea type="text" cols="10" rows="10" name="geoglocation" class="form-control input-circle" > 
							<?php echo $rowar['geoglocation']; ?>
						</textarea>
						 
					 
				</div> 

			</div>

			<div class="form-group image">
                
				<div class="col-md-5">
					<label class="control-label">الشعار:</label>
					<a  class="btn iframe-btn" type="button" href="<?PHP echo FILEMANAGERPATH;  ?>/dialog.php?type=1&editor=mce_0&field_id=logoar&relative_url=0&multiple=0">اختيار  </a>
					<div class="input-icon right">
						<i class="fa fa-image"></i>
						<input type="text" name="logo" id="logoar" class="form-control input-circle" value="<?php echo $rowar['logo']; ?>" onchange="check()" placeholder="">
					</div> 
				</div> 
				<div class="col-md-4">
						<img src="<?php echo $logoar; ?>" id="imagelogoar" onerror="this.onerror=null; this.src='../../assets/images/no-image.png';" style="max-height:80px; max-width:100%; object-fit:contain;"> 
				</div>


			</div>

			<div class="form-group">
                
				 
				<div class="col-md-6">
					<label class="control-label">كلمات مفتاحية:</label>
					<div class="input-icon right"> 
						<textarea type="text" cols="10" rows="10" name="keyword" class="form-control input-circle" > 
							<?php echo $rowar['keyword']; ?>
						</textarea>
					</div>
				</div> 


				<div class="col-md-6">
					<label class="control-label">وصف  مختصر لمحركات البحث:</label>
					<div class="input-icon right">
						 
						<textarea type="text" cols="10" rows="10" name="seo_description" class="form-control input-circle" > 
							<?php echo $rowar['seo_description']; ?>
						</textarea>
						 
					</div>
				</div> 

			</div>


			<div class="form-group image">
                <div class="col-md-6"> 
					<label class="control-label">قوقل بلاي:</label>
					 
					<div class="input-icon right">
						<i class="fa fa-link"></i>
						<input type="text" name="googleplay"  class="form-control input-circle" value="<?php echo $rowar['googleplay']; ?>"   placeholder="">
					</div> 
				</div> 
				 
                 
				<div class="col-md-6">
					<label class="control-label">ابل  ستور:</label>
				 
					<div class="input-icon right">
						<i class="fa fa-link"></i>
						<input type="text" name="appstore"  class="form-control input-circle" value="<?php echo $rowar['appstore']; ?>"   placeholder="">
					</div> 
				</div>  

			 
			</div>

			<div class="form-group">
                <div class="col-md-6"> 
					<label class="col-md-4 control-label">تفعيل  الموقع:</label>
					<div class="col-md-8">
					 <select name="Is_Actieved" class="form-control ">
					 	  <option value="<?php echo $rowar['Is_Actieved']; ?>"><?php echo $rowar['Is_Actieved']; ?></option>
					 	  <option value="Yes">Yes</option>
					 	  <option value="No">No</option>
					 </select>
					 </div>
				</div> 
				 
                
				<div class="col-md-6">
					<label class="col-md-4 control-label">وظائف:</label>
				 
				 <div class="col-md-8">
					 <select name="job_active" class="form-control">
					 	  <option value="<?php echo $rowar['job_active']; ?>"><?php echo $rowar['job_active']; ?></option>
					 	  <option value="Yes">Yes</option>
					 	  <option value="No">No</option>
					 </select>
					</div>
				</div>  
			</div>


			<div class="form-group image ">
                <div class="col-md-6">
                    <label class="control-label">رابط الفيديو:</label>

                    <div class="input-icon right">
                        <i class="fa fa-link"></i>
                        <input type="text" name="URL" class="form-control input-circle"
                               value="<?php echo $rowar['URL']; ?>" placeholder="">
                    </div>
                </div>
                 <div class="col-md-6 hidden">
				<div class="col-md-8">
					<label class="control-label">  غلاف   الموقع تحت الصيانة:</label>
					<a  class="btn iframe-btn" type="button" href="<?PHP echo FILEMANAGERPATH;  ?>/dialog.php?type=1&editor=mce_0&field_id=bannerar1&relative_url=0&multiple=0">اختيار  </a>
					<div class="input-icon right">
						<i class="fa fa-image"></i>
						<input type="text" name="banner1" id="bannerar1" class="form-control input-circle" value="<?php echo $rowar['banner1']; ?>" onchange="checkbannerar1()" placeholder="">
					</div> 
				</div> 
				<div class="col-md-4">
						<img src="<?php echo $bannerar1; ?>" id="imagebannerar1" onerror="this.onerror=null; this.src='../../assets/images/no-image.png';" style="max-height:120px; width:100%; object-fit:contain;"> 
				</div>
              </div>



			</div>
	 
 
			<div class="form-group image hidden">
                 <div class="col-md-6">
				<div class="col-md-8">
					<label class="control-label"> عقد  الوكلاء  </label>
					<a  class="btn iframe-btn" type="button" href="<?PHP echo FILEMANAGERPATH;  ?>/dialog.php?type=4&editor=mce_0&field_id=bannerar4&relative_url=0&multiple=0">اختيار  </a>
					<div class="input-icon right">
						<i class="fa fa-file"></i>
						<input type="text" name="banner4" id="bannerar4" class="form-control input-circle" value="<?php echo $rowar['banner4']; ?>" onchange="checkbannerar4()" placeholder="">
					</div> 
				</div> 
				<div class="col-md-4">
                      <?php

                      if ($rowar['banner4']!="") { ?>
                        	 
                      
					<iframe src="<?php echo $bannerar4; ?>" style="width:118px; height:auto;" frameborder="0" id="iframePdfAgents"></iframe>
					 <?php }   ?>

						 
				</div>
              </div>



			</div>
		<div class="form-actions">
			<div class="row">
				<div class="col-md-offset-3 col-md-5">
					<button type="button" class="btn btn-block btn-circle blue" id="savedata" name="Save">حفــــظ</button>
					 
				</div>
			</div>
		</div>
	</form>


			  	  </td>
			  </tr>
		</tbody>
	</table>
	<!-- END FORM-->
</div>