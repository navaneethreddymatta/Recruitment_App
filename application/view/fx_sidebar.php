<!-- Main Sidebar -->
<div id="sidebar">
	<!-- Wrapper for scrolling functionality -->
	<div class="sidebar-scroll">
		<!-- Sidebar Content -->
		<div class="sidebar-content">
			<!-- Brand -->
			<a href="#" class="sidebar-brand">
				<i class="gi gi-flash"></i><strong>Flexeye </strong> 
			</a>
			<!-- END Brand -->
			<!-- User Info -->
			<div class="sidebar-section sidebar-user clearfix">
				<div class="sidebar-user-avatar">
					<a href="index.php?op=profile">
						<img src="assets/img/fx_application_manager2.png" alt="avatar">
					</a>
				</div>
				<div class="sidebar-user-name"><?php echo $_SESSION['user']->name;?></div>
				<div class="sidebar-user-links">
					<a href="index.php?op=profile" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
					<?php if($_SESSION['user']->role=="1"){echo '<a data-original-title="Settings" href="index.php?op=settings" data-toggle="modal" data-placement="bottom" title="" class="enable-tooltip"><i class="gi gi-cogwheel"></i></a>'; }?>
					<a href="index.php?op=logout" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
				</div>
			</div>
			<!-- Activity -->
			<a href="javascript:void(0)" class="sidebar-title">
				<i class="fa fa-globe pull-right"></i> <strong>Activity</strong>
			</a>
			<div class="sidebar-section">
			<div id="activity">
			</div>
				
			</div>
			<!-- END Activity -->
		</div>
		<!-- END Sidebar Content -->
	</div>
	<!-- END Wrapper for scrolling functionality -->
</div>
<!-- END Main Sidebar -->