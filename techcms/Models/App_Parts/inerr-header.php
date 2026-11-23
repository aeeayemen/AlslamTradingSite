
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
				 	<a href="../../index.php" class="logo-default">
					
                   <!-- <img src="../../<?php echo $DetailCompany['logo']; ?>"  styte=" "  height="30" width="auto" alt="<?php echo $DetailCompany['cname']; ?>"    /> -->  
                   <h4>
                   	 
                   	<?php

                   	$name=$DetailCompany['cname'];
                   	// $name=substr($DetailCompany['cname'], 0,33);
                   	echo $name ?>
                   		
                   	</h4> 
                <!-- <h5> الرجوع  للواجهه  الرئيسية  </h5>  -->
                 
                 
			</a>
			<div class="menu-toggler sidebar-toggler">
 			</div>
		</div> 
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
	  
		<div class="top-menu">
			
			<ul class="nav navbar-nav pull-right">
		 
			 
             	<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="<?php echo $Applogins_cls->logpath;?>"/>
				<span class="username username-hide-on-mobile"><strong><?php echo $langs["Home_UWELCMSG"];?>
					<?php echo $Applogins_cls->Shown_Name;?> </strong> </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="../Logout.php">
							<i class="icon-key"></i>تسجيل الخروج  </a>
						</li>
					</ul>
				</li>
			 
				<li class="dropdown dropdown-quick-sidebar-toggler">
					<a href="javascript:;" class="dropdown-toggle">
					<i class="icon-logout"></i>
					</a>
				</li>
				 
			</ul>
		</div>
	 
	</div>
 
</div>