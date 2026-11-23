<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu" data-slide-speed="200" data-auto-scroll="true" >
            
				<li class="start" id="homePage">
					<a class="ajaxify1 start" href="index.php">
					<i class="fa fa-home"></i>
					<span class="title">
					<?php echo $langs["Home_PGTITL"];?></span>
					<span class="selected">
					</span>
					</a>
				</li>
    <?php   require_once "../Models/App_Parts/Admins/Menu-Builder.php";  ?>
                
			</ul>
			<!-- END SIDEBAR MENU1 -->
		</div>
	</div>

    
    
    