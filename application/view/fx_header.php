<header class="navbar navbar-default navbar-fixed-top">
	<!-- Navbar Header -->
	<div class="navbar-header">
		<!-- Horizontal Menu Toggle + Alternative Sidebar Toggle Button, Visible only in small screens (< 768px) -->
		<ul class="nav navbar-nav-custom pull-right visible-xs">
			<li>
				<a data-target="#horizontal-menu-collapse" data-toggle="collapse" href="javascript:void(0)">Menu</a>
			</li>
		</ul>
		<!-- END Horizontal Menu Toggle + Alternative Sidebar Toggle Button -->
		<!-- Main Sidebar Toggle Button -->
		<ul class="nav navbar-nav-custom">
			<li>
				<a onclick="App.sidebar('toggle-sidebar');" href="javascript:void(0)">
					<i class="fa fa-bars fa-fw"></i>
				</a>
			</li>
		</ul>
		<!-- END Main Sidebar Toggle Button -->
	</div>
	<!-- END Navbar Header -->
    <!-- Alternative Sidebar Toggle Button, Visible only in large screens (> 767px) -->
	<ul class="nav navbar-nav-custom pull-right hidden-xs">
	</ul>
	<!-- END Alternative Sidebar Toggle Button -->
    <!-- Horizontal Menu + Search -->
	<div class="collapse navbar-collapse" id="horizontal-menu-collapse">
		<ul class="nav navbar-nav">
			<li>
				<a href="index.php?op=atHome">Home</a>
			</li>
			<!--li>
				<a href="javascript:void(0)">Profile</a>
			</li-->
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">Candidates <i class="fa fa-angle-down"></i></a>
				<ul class="dropdown-menu">
					<li><a href="index.php?op=bulkUpdate"><i class="fa fa-asterisk fa-fw pull-right"></i> Bulk Update</a></li>
					<li><a href="index.php?op=list" ><i class="fa fa-lock fa-fw pull-right"></i> All</a></li>
					 <li><a href="index.php?op=printSheets" ><i class="fa fa-lock fa-fw pull-right"></i> Print All</a></li>
				</ul>
			</li>
		</ul>
		<form action="index.php?op=customSearch" method="post" class="navbar-form-custom" role="search">
			<div class="form-group">
				<input type="hidden" name="form-submitted" value="1" />	
				<input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search">
			</div>
		</form>
	<?php if(count($errors)!=0){  echo'<div id="searchErrors" class="nav navbar-nav">';
	if ( $errors ) {
		print '<ul class="errors">';
		foreach ( $errors as $field => $error ) {
			print '<li>'.htmlentities($error).'</li>';
		}
		print '</ul>';
		}
	} 
	?>
	</div>
	<!-- END Horizontal Menu + Search -->
</header>
<!-- END Header -->