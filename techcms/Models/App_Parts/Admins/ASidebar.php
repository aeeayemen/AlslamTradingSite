<!--   App Configratuion END HERE  
كود الجزء الخاص بالشريط الجانبي للوحة التحكم 
قسم الادمين
-->

<li>
					<a href="javascript:;">
						<i class="icon-settings"></i>
						<span class="title">
						<?php echo $langs["BASIC_CONFIG"];?>
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
                    
                    <!--   Managment config submenu start   here  -->
      <li>
					<a href="javascript:;">
						<i class="fa  fa-cogs"></i>
						<span class="title">
						<?php echo $langs["APP_CONFIG_MAGMNTAPPROOT"];?>
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
                <li>
                    	<a class="ajaxify" href="Pages/Department-Managment.php">
								<i class="fa fa-file-o"></i>
                                <?php echo $langs["APP_CONFIG_DEPT_TITLE"];?>
							</a>
    	           </li>
                    <li>
                    	<a class="ajaxify" href="Pages/Jobs-Managment.php">
								<i class="fa fa-graduation-cap"></i>
                                <?php echo $langs["APP_CONFIG_JOB_MANAGTITLE"];?>
							</a>
    	               </li>
                    <li>
                    	<a class="ajaxify" href="Pages/Proposal-Categories.php">
								<i class="fa fa-file-pdf-o"></i>
                                <?php echo $langs["APP_CONFIG_PRPOSLCAT_MANAGTITLE"];?>
							</a>
    	               </li>

                           <li style="display: none;">
                    	<a class="ajaxify" href="Pages/Proposal-Status.php" >
								<i class="fa fa-sitemap"></i>
                                <?php echo $langs["APP_CONFIG_PRPOSLSTATUS_MANGITLE"];?>
							</a>
    	               </li>

                        <li>
                    		<a class="ajaxify" href="Pages/Units-Management.php">
								<i class="icon-flag"></i>
                                <?php echo $langs["APP_CONFIG_UNITS_MANGITLE"];?>
							</a>
    	               </li>
                        <li>
                    <a class="ajaxify" href="Pages/Contract-Types.php">
								<i class="icon-basket"></i>
                                <?php echo $langs["APP_CONFIG_CONTRCT_TYPE_MANGITLE"];?>
							</a>
    	               </li>
                        <li>
                    	<a class="ajaxify" href="Pages/Page_Privilegs_Config.php">
								<i class="icon-clock"></i>
                              إعداد صلاحيات الصفحات 
							</a>
    	               </li>
                         <li>
                      <a class="ajaxify" href="Pages/Users_Groups.php">
								<i class="icon-clock"></i>
                              مجموعات المستخدمين
							</a>
                </li>
                      <li>
                      <a class="ajaxify" href="Pages/Privilege_Groups.php">
								<i class="icon-clock"></i>
                               صلاحية المجموعات
							</a>
                </li>
                
                       </ul>
            	</li>
                       
              <!--   Managment config submenu End   here  -->         
                 
                    <!--   Golden Maps subment start here  -->
 
    
    <!--   Golden Maps subment End  here  -->
    
    
    
 
           <li>
					<a href="javascript:;">
						<i class="fa  fa-list-alt"></i>
						<span class="title">
						الترميزات والقوائم 
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
                    	<li>
                    <a class="ajaxify" href="Pages/Materials-Management.php">
								<i class="fa fa-flask"></i>
                               	<?php echo $langs["MATERIALSMENU_ROOT"];?>
							</a>
                            </li>
						<li>
							<a class="ajaxify" href="Pages/Task-List-Managements.php">
								<i class="fa fa-list"></i>
                                ترميز المهام
							</a>
						</li>
                        	<li>
							<a class="ajaxify" href="Pages/System-Template-Managements.php">
								<i class="fa fa-list"></i>
                            إدارة انواع القوالب
							</a>
						</li>
					<li>
							<a class="ajaxify" href="Pages/Template-Management-List.php">
								<i class="fa fa-list"></i>
                         إدارة القوالب الجاهزه
							</a>
						</li>
					</ul>
	</li>
    
 
  
    
    
     </ul>
   	</li>
      <!--   Golden Map part start   HERE  -->
      <li>
					<a href="javascript:;">
						<i class="fa  icon-pointer"></i>
						<span class="title">
						<?php echo $langs["APP_CONFIG_LOCATIONCONFIGROOT"];?>
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						 <li>
                    	<a class="ajaxify" href="Pages/Cities-Managment.php">
								<i class="fa fa-tags"></i>
                                <?php echo $langs["APP_CONFIG_CITIES_MANGITLE"];?>
							</a>
    	               </li> 
                   <li>
                    	<a class="ajaxify" href="Pages/Zones-Managment.php">
								<i class="fa fa-tags"></i>
                                <?php echo $langs["APP_CONFIG_ZONES_MANGITLE"];?>
							</a>
    	               </li> 
                     <li>
                    	<a class="ajaxify" href="Pages/Loctions-Status-Managment.php">
								<i class="fa fa-book"></i>
                                <?php echo $langs["APP_CONFIG_LOCATIONSTATUS_MANGITLE"];?>
							</a>
    	               </li> 
                    
                    <li>
                    	<a class="ajaxify" href="Pages/Loctions-Types-Managment.php">
								<i class="fa fa-cubes"></i>
                                <?php echo $langs["APP_CONFIG_LOCATIONTYPES_MANGITLE"];?>
							</a>
    	               </li> 
                       
         <li>
                    	<a class="ajaxify" href="Pages/Add-SLocation.php" target="_parent">
								<i class="fa  icon-pointer"></i>
                              إدارة المواقع
							</a>
    	               </li> 
                       
					</ul>
	</li>
  
    <!--   Proposal Part Start Here  -->
     <li>
					<a href="javascript:;">
						<i class="icon-basket"></i>
						<span class="title">
						عروض الاسعار والعقود
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
           <!--    Propsal Menu Start here -->
                    <li>
					<a href="javascript:;">
						<i class="fa fa-file-powerpoint-o"></i>
						<span class="title">
				<strong>	عروض الاسعار</strong>
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
               	<li>
							<a class="ajaxify" href="Pages/Proposals-Management.php">
								<i class="fa fa-list"></i>
                              قائمة عروض الاسعار 
							</a>
						</li>
                        	<li>
							<a class="ajaxify" href="Pages/Create-Proposal.php">
								<i class="fa fa-plus"></i>
						تحرير عرض سعر
							</a>
						</li>
                   
                     
                        <li>
                    		<a class="ajaxify" href="Pages/Aproved-Proposal.php">
								<i class="fa fa-chevron-circle-down"></i>
                               تأكيد عرض السعر 
							</a>
    	               </li>
                      
                       </ul>
            	</li>
       <!--    Propsal Menu End here -->
					<!--    Contract Menu Start here -->
                    <li>
					<a href="javascript:;">
						<i class="fa fa-file-text-o"></i>
						<span class="title">
				<strong>إدارة العقود</strong>
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
               	<li>
							<a class="ajaxify" href="Pages/Contracts-Management.php">
								<i class="fa fa-list"></i>
                              قائمة العقود  
							</a>
						</li>
                        	<li>
							<a class="ajaxify" href="Pages/Create-Contracts.php">
								<i class="fa fa-plus"></i>
			         		تحرير عقد
							</a>
						</li>
                   
                     
                        <li>
                    		<a class="ajaxify" href="Pages/Aproved-Contracts.php">
								<i class="fa fa-chevron-circle-down"></i>
                              تأكيد عقد
							</a>
    	               </li>
                      
                       </ul>
            	</li>
       <!--    Contract Menu End here -->
	
					</ul>
	</li>
      <!--    Proposal Part END HERE  -->
       <!--   Proposal Part Start Here  -->
    

                    <li>
					<a href="javascript:;">
						<i class="icon-calendar"></i>
						<span class="title">
				أوامر الشغل
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
               	<li>
							<a class="ajaxify" href="Pages/Projects-Management.php">
								<i class="fa fa-list"></i>
                           إدارة اوامر الشغل
							</a>
						</li>
                        	<li>
							<a class="ajaxify" href="Pages/Create-Projects.php">
								<i class="fa fa-edit"></i>
					   انشاء أمر شغل
							</a>
						</li>
                   
                     
                        <li>
                    		<a class="ajaxify" href="Pages/Aproved-Proposal.php">
								<i class="fa fa-chevron-circle-down"></i>
                               تأكيد عرض السعر 
							</a>
    	               </li>
                      
                       </ul>
            	</li>
       <!--    Propsal Menu End here -->
    <!--   Employees Part Start Here  -->
     <li>
					<a href="javascript:;">
						<i class="icon-users"></i>
						<span class="title">
						إدارة الموظفين
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a class="ajaxify" href="Pages/Employees-Management.php">
								<i class="icon-user"></i>
                               إدارة الموظفين
							</a>
						</li>
						<li>
									<a class="ajaxify" href="Pages/Users-Management.php">
								<i class="icon-users"></i>
                             إدارة المستخدمين
							</a>
						</li>
	                   	<li>
									<a class="ajaxify" href="Pages/Users-Role-Management.php">
								<i class="fa fa-lock"></i>
                             إدارة الصلاحيات
							</a>
						</li>
					</ul>
	</li>
      <!--    Employees Part END HERE  -->
      
    
        <!--   Finance Part Start Here  -->
     <li>
					<a href="javascript:;">
						<i class="fa fa-usd"></i>
						<span class="title">
						الادارة المالية
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a class="ajaxify" href="Models/Pages/Add_Department.php">
								<i class="fa fa-list"></i>
                                <?php echo $langs["DEPTMENU_LIST"];?>
							</a>
						</li>
						<li>
							<a class="ajaxify" href="DB-includes/Add-City.php">
								<i class="fa fa-plus"></i>
							<?php echo $langs["DEPTMENU_ADD"];?>
							</a>
						</li>
						<li>
							<a class="ajaxify" href="DB-includes/Edit-City.php">
								<i class="fa fa-edit"></i>
							<?php echo $langs["DEPTMENU_EDIT"];?>
							</a>
						</li>
                        
						<li>
								<a class="ajaxify" href="DB-includes/Delete-City.php">
								<i class="fa fa-close"></i>
								<?php echo $langs["DEPTMENU_DELETE"];?>
							</a>
						</li>
	
					</ul>
	</li>
      <!--    Finance Part END HERE  -->
        <!--   Markting Part Start Here  -->
     <li>
					<a href="javascript:;">
						<i class="fa fa-bullhorn"></i>
						<span class="title">
						إدارة التسويق
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a class="ajaxify" href="Models/Pages/Add_Department.php">
								<i class="fa fa-list"></i>
                                <?php echo $langs["DEPTMENU_LIST"];?>
							</a>
						</li>
						<li>
							<a class="ajaxify" href="DB-includes/Add-City.php">
								<i class="fa fa-plus"></i>
							<?php echo $langs["DEPTMENU_ADD"];?>
							</a>
						</li>
						<li>
							<a class="ajaxify" href="DB-includes/Edit-City.php">
								<i class="fa fa-edit"></i>
							<?php echo $langs["DEPTMENU_EDIT"];?>
							</a>
						</li>
                        
						<li>
								<a class="ajaxify" href="DB-includes/Delete-City.php">
								<i class="fa fa-close"></i>
								<?php echo $langs["DEPTMENU_DELETE"];?>
							</a>
						</li>
	
					</ul>
	</li>
      <!--    Markting Part END HERE  -->
       <!--   Clients Part Start Here  -->
     <li>
					<a href="javascript:;">
						<i class="fa fa-users"></i>
						<span class="title">
						إدارة العملاء
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a class="ajaxify" href="Pages/Clients-Managements.php">
								<i class="fa fa-users"></i>
                               إدارة العملاء
							</a>
						</li>
					
                        
						<li>
								<a class="ajaxify" href="DB-includes/Delete-City.php">
								<i class="fa fa-close"></i>
								<?php echo $langs["DEPTMENU_DELETE"];?>
							</a>
						</li>
	
					</ul>
	</li>
      <!--    Clients Part END HERE  -->
      
    
         <!--   Printer Part Start Here  -->
     <li>
					<a href="javascript:;">
						<i class="glyphicon glyphicon-print"></i>
						<span class="title">
						إدارة الطابعة
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a class="ajaxify" href="Models/Pages/Add_Department.php">
								<i class="fa fa-list"></i>
                                <?php echo $langs["DEPTMENU_LIST"];?>
							</a>
						</li>
						<li>
							<a class="ajaxify" href="DB-includes/Add-City.php">
								<i class="fa fa-plus"></i>
							<?php echo $langs["DEPTMENU_ADD"];?>
							</a>
						</li>
						<li>
							<a class="ajaxify" href="DB-includes/Edit-City.php">
								<i class="fa fa-edit"></i>
							<?php echo $langs["DEPTMENU_EDIT"];?>
							</a>
						</li>
                        
						<li>
								<a class="ajaxify" href="DB-includes/Delete-City.php">
								<i class="fa fa-close"></i>
								<?php echo $langs["DEPTMENU_DELETE"];?>
							</a>
						</li>
	
					</ul>
	</li>
      <!--    Printer Part END HERE  -->
         <!--   Desgining Part Start Here  -->
     <li>
					<a href="javascript:;">
						<i class="icon-basket"></i>
						<span class="title">
						إدارة التصاميم
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a class="ajaxify" href="Models/Pages/Add_Department.php">
								<i class="fa fa-list"></i>
                                <?php echo $langs["DEPTMENU_LIST"];?>
							</a>
						</li>
						<li>
							<a class="ajaxify" href="DB-includes/Add-City.php">
								<i class="fa fa-plus"></i>
							<?php echo $langs["DEPTMENU_ADD"];?>
							</a>
						</li>
						<li>
							<a class="ajaxify" href="DB-includes/Edit-City.php">
								<i class="fa fa-edit"></i>
							<?php echo $langs["DEPTMENU_EDIT"];?>
							</a>
						</li>
                        
						<li>
								<a class="ajaxify" href="DB-includes/Delete-City.php">
								<i class="fa fa-close"></i>
								<?php echo $langs["DEPTMENU_DELETE"];?>
							</a>
						</li>
	
					</ul>
	</li>
      <!--    Desgining Part END HERE  -->
      
         <!--   Gate Part Start Here  -->
     <li>
					<a href="javascript:;">
						<i class="glyphicon glyphicon-tower"></i>
						<span class="title">
						إدارة قسم البوابة
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a class="ajaxify" href="Models/Pages/Add_Department.php">
								<i class="fa fa-list"></i>
                                <?php echo $langs["DEPTMENU_LIST"];?>
							</a>
						</li>
						<li>
							<a class="ajaxify" href="DB-includes/Add-City.php">
								<i class="fa fa-plus"></i>
							<?php echo $langs["DEPTMENU_ADD"];?>
							</a>
						</li>
						<li>
							<a class="ajaxify" href="DB-includes/Edit-City.php">
								<i class="fa fa-edit"></i>
							<?php echo $langs["DEPTMENU_EDIT"];?>
							</a>
						</li>
                        
						<li>
								<a class="ajaxify" href="DB-includes/Delete-City.php">
								<i class="fa fa-close"></i>
								<?php echo $langs["DEPTMENU_DELETE"];?>
							</a>
						</li>
	
					</ul>
	</li>
      <!--    Gate Part END HERE  -->
       <!--   Documents Part Start Here  -->
     <li>
					<a href="javascript:;">
						<i class="fa fa-files-o"></i>
						<span class="title">
						إدارة الارشيف
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a class="ajaxify" href="Models/Pages/Add_Department.php">
								<i class="fa fa-list"></i>
                                <?php echo $langs["DEPTMENU_LIST"];?>
							</a>
						</li>
						<li>
							<a class="ajaxify" href="DB-includes/Add-City.php">
								<i class="fa fa-plus"></i>
							<?php echo $langs["DEPTMENU_ADD"];?>
							</a>
						</li>
						<li>
							<a class="ajaxify" href="DB-includes/Edit-City.php">
								<i class="fa fa-edit"></i>
							<?php echo $langs["DEPTMENU_EDIT"];?>
							</a>
						</li>
                        
						<li>
								<a class="ajaxify" href="DB-includes/Delete-City.php">
								<i class="fa fa-close"></i>
								<?php echo $langs["DEPTMENU_DELETE"];?>
							</a>
						</li>
	
					</ul>
	</li>
      <!--    Documents Part END HERE  -->
      
        <!--   App setting Part Start Here  -->
     <li>
					<a href="javascript:;">
						<i class="fa fa-gears"></i>
						<span class="title">
						اعدادت التطبيق
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
                    	<a class="ajaxify" href="Models/Pages/Department_Managment.php">
								<i class="fa fa-file-o"></i>
                                <?php echo $langs["APP_CONFIG_DEPT_TITLE"];?>
							</a>
                            	</li>
					
				                <li>
                    	<a class="ajaxify" href="Models/Pages/Jobs_Managment.php">
								<i class="fa fa-file-o"></i>
                                <?php echo $langs["APP_CONFIG_JOB_MANAGTITLE"];?>
							</a>
                            	</li>	
                        
					
	
					</ul>
	</li>
      <!--    App setting Part END HERE  -->