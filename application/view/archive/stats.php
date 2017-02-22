<?php 
$count = count($stats);
$i=-1;
$t =0;
$wq=0;
$wd=0;
$r1q = 0;
$r1d = 0;
$r2q = 0;
$r2d = 0;
$r3q = 0;
$r3d = 0;
$r4q = 0;
$r4d = 0;
$count = 6;
for($j=0;$j<$count;$j++)
{
	if($i==-1)
	{
		$t=$stats[$j]->t1;	
	}
	else if($i==0)
	{		
		$wq=$stats[$j]->t1;$wd=$stats[$j-1]->t1-$wq;	
	}
	else
	{
		if($i==1){$newStatus=6;}else if($i==2){$newStatus=8;}else if($i==3){$newStatus=10;}else{$newStatus=12;}		
		
		if($i== 1)
		{
			$r1q = $stats[$j]->t1;
			$r1d = $stats[$j-1]->t1 - $r1q;						
		}
		elseif($i ==2)
		{
			$r2q = $stats[$j]->t1;
			$r2d = $stats[$j-1]->t1 - $r2q;
		}
		elseif($i ==3)
		{
			$r3q = $stats[$j]->t1;
			$r3d = $stats[$j-1]->t1 - $r3q;
		}
		else
		{
			$r4q = $stats[$j]->t1;
			$r4d = $stats[$j-1]->t1 - $r4q;
		}		
	}
	$i++;
}
/*echo "W1 Q----".$wq;echo "<br>";
echo "W1 D---".$wd;echo "<br>";
echo "R1 Q---".$r1q;echo "<br>";
echo "R1 D---".$r1d;echo "<br>";
echo "R2 Q---".$r2q;echo "<br>";
echo "R2 D---".$r2d;echo "<br>";
echo "R3 Q----".$r3q;echo "<br>";
echo "R3 D---".$r3d;echo "<br>";
echo "R4 Q----".$r4q;echo "<br>";
echo "R4 D----".$r4d;echo "<br>";
echo "<pre>";
echo "Count is!!!!!!!!!".count($stats['streams']);
print_r($stats);*/

?>
<!DOCTYPE html>
<style>
#ex1Slider .slider-selection {
	background: #6AD2EB;
}

</style>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	
	<title>
	Flexeye
	</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- bootstrap 3.0.2 -->	
	<!-- Stylesheets -->
<!-- Bootstrap is included in its original form, unaltered -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<!-- Related styles of various icon packs and plugins -->
<link rel="stylesheet" href="assets/css/plugins.css">

<!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
<link rel="stylesheet" href="assets/css/main.css">
<!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

<!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
<link rel="stylesheet" href="assets/css/themes.css">
<!-- END Stylesheets -->
<script src="assets/js/vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
</head>
<body class="page-loading" >
<script>setTimeout(function() {$('body').removeClass('page-loading');}, 2000);</script>
<div class="preloader themed-background">
            <h1 class="push-top-bottom text-light text-center"><strong>Please Wait </strong>a moment</h1>
            <div class="inner">
                <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>
				<br/>
				
                <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
            </div>
</div>
<div class="header-fixed-top sidebar-partial sidebar-visible-lg sidebar-no-animations footer-fixed" id="page-container">
            <!-- Alternative Sidebar -->
            <div id="sidebar-alt">
                <!-- Wrapper for scrolling functionality -->
                <div class="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Chat -->
                        <!-- Chat demo functionality initialized in js/app.js -> chatUi() -->
                        
                        <!-- END Chat Users -->

                        
                        <!--  END Chat Talk -->
                        <!-- END Chat -->

                        

                        <!-- Messages -->
                        <a href="page_ready_inbox.html" class="sidebar-title">
                            <i class="fa fa-envelope pull-right"></i> <strong>Messages</strong>UI (5)
                        </a>
                        <div class="sidebar-section">
                            <div class="alert alert-alt">
                                Debra Stanley<small class="pull-right">just now</small><br>
                                <a href="page_ready_inbox_message.html"><strong>New Follower</strong></a>
                            </div>
                            <div class="alert alert-alt">
                                Sarah Cole<small class="pull-right">2 min ago</small><br>
                                <a href="page_ready_inbox_message.html"><strong>Your subscription was updated</strong></a>
                            </div>
                            <div class="alert alert-alt">
                                Bryan Porter<small class="pull-right">10 min ago</small><br>
                                <a href="page_ready_inbox_message.html"><strong>A great opportunity</strong></a>
                            </div>
                            <div class="alert alert-alt">
                                Jose Duncan<small class="pull-right">30 min ago</small><br>
                                <a href="page_ready_inbox_message.html"><strong>Account Activation</strong></a>
                            </div>
                            <div class="alert alert-alt">
                                Henry Ellis<small class="pull-right">40 min ago</small><br>
                                <a href="page_ready_inbox_message.html"><strong>You reached 10.000 Followers!</strong></a>
                            </div>
                        </div>
                        <!-- END Messages -->
                    </div>
                    <!-- END Sidebar Content -->
                </div>
                <!-- END Wrapper for scrolling functionality -->
            </div>
            <!-- END Alternative Sidebar -->

            <!-- Main Sidebar -->
            <div id="sidebar">
                <!-- Wrapper for scrolling functionality -->
                <div class="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Brand -->
                        <a href="index.php?op=home" class="sidebar-brand">
                            <i class="gi gi-flash"></i><strong>Flexeye</strong>
                        </a>
                        <!-- END Brand -->

                        <!-- User Info -->
                        <div class="sidebar-section sidebar-user clearfix">
                            <div class="sidebar-user-avatar">
                                <a href="index.php?op=profile">
                                    <img src="assets/img/avatar2.jpg" alt="avatar">
                                </a>
                            </div>
                            <div class="sidebar-user-name"><?php echo $_SESSION['user']->name;?></div>
                            <div class="sidebar-user-links">
                                <a href="index.php?op=profile" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                               
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


            <!-- Main Container -->
            <div id="main-container">
                
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
                        <form id="progress-wizard" action="index.php?op=customSearch" method="post" class="navbar-form-custom" role="search">
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
						echo '</div>';
					} 
					?>
					
                    </div>
                    <!-- END Horizontal Menu + Search -->
                </header>
                <!-- END Header -->

                <!-- Page content -->
                <div id="page-content" style="min-height: 378px;">
                    <!-- Fixed Top Header + Footer Header -->
                    <div class="content-header">
                        <div class="header-section">
                            <div class="row">
                                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                <div class="col-md-4 col-lg-4 hidden-xs hidden-sm">
                                    <h1>Welcome <strong><?php echo $_SESSION['user']->name;?></strong><br><small>You Look Awesome!</small></h1>
                                </div>
                                <!-- END Main Title -->

                                <!-- Top Stats -->
                                <div class="col-md-8 col-lg-8">
									<div id="panels"></div>                                   
                                </div>
                                <!-- END Top Stats -->
                            </div>
                        </div>
                        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
                        <!--img class="animation-pulseSlow" alt="header image" src="assets/img/home-carousel3.jpg"-->
						
                    </div>
                    <!-- Table Starts here -->
					<div class="table-responsive">
                         <table class="table table-borderless table-striped">
							<tbody>
								<tr>
									<td style="width: 25%;"><strong>Events</strong></td>
									<td >											
									<div class="progress" style="wdith=<?php echo $t?>%">
									  <div class="progress-bar progress-bar-success" style="width: <?php $r4q1 = ($r4q/$t)*100; echo $r4q1; ?>%"><?php echo $r4q?>
										<span class="sr-only">35% Complete (success)</span>
									  </div>
									  <div class="progress-bar progress-bar-info progress-bar-striped" style="width: <?php $r4d1 = ($r4d/$t)*100; echo $r4d1; ?>%"><?php echo $r4d?>
										<span class="sr-only">35% Complete (success)</span>
									  </div>
									  <div class="progress-bar progress-bar-danger " style="width:  <?php $r3d1 = ($r3d/$t)*100; echo $r3d1; ?>%"><?php echo $r3d?>
										<span class="sr-only">20% Complete (warning)</span>
									  </div>
									  <div class="progress-bar progress-bar-warning progress-bar-striped " style="width:  <?php $r2d1 = ($r2d/$t)*100; echo $r2d1; ?>%"><?php echo $r2d?>
										<span class="sr-only">20% Complete (warning)</span>
									  </div>
									  <div class="progress-bar progress-bar-danger progress-bar-striped " style="width:  <?php $r1d1 = ($r1d/$t)*100; echo $r1d1; ?>%"><?php echo $r1d?>
										<span class="sr-only">20% Complete (warning)</span>
									  </div>
									  <div class="progress-bar progress-bar-warning " style="width:  <?php $wd1 = ($wd/$t)*100; echo $wd1; ?>%"><?php echo $wd?>
										<span class="sr-only">20% Complete (warning)</span>
									  </div>
									  
									</div> 
									</td>
								</tr>
								<?php 
								$count = count($stats['streams']);
								for($k =0;$k<$count;$k++)
								{
									$name = "";
									if($k==0)
									{
										$name = "CSE";
									}
									elseif($k ==1)
									{
										$name = "IT";
									}
									elseif($k ==2)
									{
										$name = "ECE";
									}
									elseif($k ==3)
									{
										$name = "EEE";
									}
									elseif($k ==4)
									{
										$name = "MECH";
									}
									else
									{
										$name = "Others";
									}
									?>
								<tr>
								<td style="width: 25%;"><strong><?php echo $name ?></strong></td>
								<?php 
$count = count($stats);
$i=-1;
$t =0;
$wq=0;
$wd=0;
$r1q = 0;
$r1d = 0;
$r2q = 0;
$r2d = 0;
$r3q = 0;
$r3d = 0;
$r4q = 0;
$r4d = 0;
$count = 6;
	for($j=0;$j<$count;$j++)
	{
		if($i==-1)
		{
			$t=$stats['streams'][$k][$j]->t1;	
		}
		else if($i==0)
		{		
			$wq=$stats['streams'][$k][$j]->t1;$wd=$stats[$j-1]->t1-$wq;	
		}
		else
		{
			if($i==1){$newStatus=6;}else if($i==2){$newStatus=8;}else if($i==3){$newStatus=10;}else{$newStatus=12;}		
			
			if($i== 1)
			{
				$r1q = $stats['streams'][$k][$j]->t1;
				$r1d = $stats['streams'][$k][$j-1]->t1 - $r1q;						
			}
			elseif($i ==2)
			{
				$r2q = $stats['streams'][$k][$j]->t1;
				$r2d = $stats['streams'][$k][$j-1]->t1 - $r2q;
			}
			elseif($i ==3)
			{
				$r3q = $stats['streams'][$k][$j]->t1;
				$r3d = $stats['streams'][$k][$j-1]->t1 - $r3q;
			}
			else
			{
				$r4q = $stats['streams'][$k][$j]->t1;
				$r4d = $stats['streams'][$k][$j-1]->t1 - $r4q;
			}		
		}
		$i++;
	}?>									<td >
									<div class="progress" style="wdith=<?php echo $t?>%">
									  <div class="progress-bar progress-bar-success" style="width: <?php $r4q1 = ($r4q/$t)*100; echo $r4q1; ?>%"><?php echo $r4q?>
										<span class="sr-only">35% Complete (success)</span>
									  </div>
									  <div class="progress-bar progress-bar-info progress-bar-striped" style="width: <?php $r4d1 = ($r4d/$t)*100; echo $r4d1; ?>%"><?php echo $r4d?>
										<span class="sr-only">35% Complete (success)</span>
									  </div>
									  <div class="progress-bar progress-bar-danger " style="width:  <?php $r3d1 = ($r3d/$t)*100; echo $r3d1; ?>%"><?php echo $r3d?>
										<span class="sr-only">20% Complete (warning)</span>
									  </div>
									  <div class="progress-bar progress-bar-warning progress-bar-striped " style="width:  <?php $r2d1 = ($r2d/$t)*100; echo $r2d1; ?>%"><?php echo $r2d?>
										<span class="sr-only">20% Complete (warning)</span>
									  </div>
									  <div class="progress-bar progress-bar-danger progress-bar-striped " style="width:  <?php $r1d1 = ($r1d/$t)*100; echo $r1d1; ?>%"><?php echo $r1d?>
										<span class="sr-only">20% Complete (warning)</span>
									  </div>
									  <div class="progress-bar progress-bar-warning" style="width:  <?php $wd1 = ($wd/$t)*100; echo $wd1; ?>%"><?php echo $wd?>
										<span class="sr-only">20% Complete (warning)</span>
									  </div>
									  
									</div> 
									</td>
									
								</tr>
								<?php
								}
								
								?>
							</tbody>
                        </table>
                    </div>
					
					
					<!-- Table Ends Here -->
					
				     
				</div>
				
                <!-- END Page Content -->

                <!-- Footer -->
                <footer class="clearfix">
                    <!--div class="pull-right">
                        Crafted with <i class="fa fa-heart text-danger"></i> by <a target="_blank" href="http://goo.gl/vNS3I">Flexeye</a>
                    </div-->
                    <div class="pull-left">
                        <span id="year-copy">2014</span> &copy; <a target="_blank" href="index.php?op=home">Flexeye IT Services Pvt Ltd</a>
                    </div>
                </footer>
                <!-- END Footer -->
            </div>
            <!-- END Main Container -->
        </div>		
        
<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/vendor/bootstrap.min.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/app.js"></script>	
	<?php if(count($scontacts)>0){ echo '<script>document.getElementById("default1").style.display="none";
					document.getElementById("default2").style.display="none"; document.getElementById("searchResult").style.display="block";</script>';}?>
	
	</script>				
	<script>
	$(function() {
		$.get('index.php?op=activities', function(data) {
		  $('#activity').html(data);
		});
	});
	
	$(function() {

	 
		$.get('index.php?op=panels', function(data) {
		  $('#panels').html(data);
		});

	});
	
	$(function() {

  setInterval(function() {
    $.get('index.php?op=activities', function(data) {
      $('#activity').html(data);
    });
  }, 5 * 1000);

});
$(function() {

  setInterval(function() {
    $.get('index.php?op=panels', function(data) {
      $('#panels').html(data);
    });
  }, 5 * 1000);

});

$("#ex1").slider();
$("#ex1").on("slide", function(slideEvt) {
	$("#ex6SliderVal").text(slideEvt.value);
})

	</script>
	
	<script src="assets/js/pages/formsValidation.js"></script>
        <script>$(function(){ FormsValidation.init(); });</script>
		<script>function getContactsByStatus(status){location.href = 'index.php?op=showDetails&id='+id+'&status='+status;}</script>
	</body>
</html>