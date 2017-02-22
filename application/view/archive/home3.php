<!DOCTYPE html>
<?php
/*echo "<pre>"; 
print_r($scontacts[0]);*/
//echo $scontacts[0]->regId;
$ptweet="";
$pscore=0;
$regId =0;
$status=0;?>
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
                        <a href="index.html" class="sidebar-brand">
                            <i class="gi gi-flash"></i><strong>Pro</strong>UI
                        </a>
                        <!-- END Brand -->

                        <!-- User Info -->
                        <div class="sidebar-section sidebar-user clearfix">
                            <div class="sidebar-user-avatar">
                                <a href="page_ready_user_profile.html">
                                    <img src="img/placeholders/avatars/avatar2.jpg" alt="avatar">
                                </a>
                            </div>
                            <div class="sidebar-user-name"><?php echo $_SESSION['user']->name;?></div>
                            <div class="sidebar-user-links">
                                <a href="index.php?op=profile" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                                <!--a href="page_ready_inbox.html" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a-->
                                <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                                <!--a href="#modal-user-settings" data-toggle="modal" class="enable-tooltip" data-placement="bottom" title="Settings"><i class="gi gi-cogwheel"></i></a-->
                                <a href="index.php?op=logout" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
                            </div>
                        </div>
                        <!-- END User Info -->

                        <!-- Theme Colors -->
                        <!-- Change Color Theme functionality can be found in js/app.js - templateOptions() -->
                        <!--ul class="sidebar-section sidebar-themes clearfix">
                            <li class="active">
                                <a href="javascript:void(0)" class="themed-background-dark-default themed-border-default" data-theme="default" data-toggle="tooltip" title="Default Blue"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-dark-night themed-border-night" data-theme="assets/css/themes/night.css" data-toggle="tooltip" title="Night"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-dark-amethyst themed-border-amethyst" data-theme="assets/css/themes/amethyst.css" data-toggle="tooltip" title="Amethyst"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-dark-modern themed-border-modern" data-theme="assets/css/themes/modern.css" data-toggle="tooltip" title="Modern"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-dark-autumn themed-border-autumn" data-theme="assets/css/themes/autumn.css" data-toggle="tooltip" title="Autumn"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-dark-flatie themed-border-flatie" data-theme="assetscss/themes/flatie.css" data-toggle="tooltip" title="Flatie"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-dark-spring themed-border-spring" data-theme="assets/css/themes/spring.css" data-toggle="tooltip" title="Spring"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-dark-fancy themed-border-fancy" data-theme="assets/css/themes/fancy.css" data-toggle="tooltip" title="Fancy"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-dark-fire themed-border-fire" data-theme="assets/css/themes/fire.css" data-toggle="tooltip" title="Fire"></a>
                            </li>
                        </ul-->
                        <!-- END Theme Colors -->

                        <!-- Sidebar Navigation -->
                        <!--ul class="sidebar-nav">
                            <li>
                                <a href="index.html"><i class="gi gi-stopwatch sidebar-nav-icon"></i>Dashboard</a>
                            </li>
                            <li class="sidebar-header">
                                <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a><a href="javascript:void(0)" data-toggle="tooltip" title="Create the most amazing pages with the widget kit!"><i class="gi gi-lightbulb"></i></a></span>
                                <span class="sidebar-header-title">Widget Kit</span>
                            </li>
                            <li>
                                <a href="page_widgets_stats.html"><i class="gi gi-charts sidebar-nav-icon"></i>Statistics</a>
                            </li>
                            <li>
                                <a href="page_widgets_social.html"><i class="gi gi-share_alt sidebar-nav-icon"></i>Social</a>
                            </li>
                            <li>
                                <a href="page_widgets_media.html"><i class="gi gi-film sidebar-nav-icon"></i>Media</a>
                            </li>
                            <li>
                                <a href="page_widgets_links.html"><i class="gi gi-link sidebar-nav-icon"></i>Links</a>
                            </li>
                            
                            
                        </ul-->
                        <!-- END Sidebar Navigation -->

                        <!-- Activity -->
                        <a href="javascript:void(0)" class="sidebar-title">
                            <i class="fa fa-globe pull-right"></i> <strong>Activity</strong>
                        </a>
                        <div class="sidebar-section">
						<div id="activity">
						</div>
                            <!--div class="alert alert-danger alert-alt">
                                <small>just now</small><br>
                                <i class="fa fa-thumbs-up fa-fw"></i> Upgraded to Pro plan
                            </div>
                            <div class="alert alert-info alert-alt">
                                <small>2 hours ago</small><br>
                                <i class="gi gi-coins fa-fw"></i> You had a new sale!
                            </div>
                            <div class="alert alert-success alert-alt">
                                <small>3 hours ago</small><br>
                                <i class="fa fa-plus fa-fw"></i> <a href="page_ready_user_profile.html"><strong>John Doe</strong></a> would like to become friends!<br>
                                <a href="javascript:void(0)" class="btn btn-xs btn-primary"><i class="fa fa-check"></i> Accept</a>
                                <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Ignore</a>
                            </div>
                            <div class="alert alert-warning alert-alt">
                                <small>2 days ago</small><br>
                                Running low on space<br><strong>18GB in use</strong> 2GB left<br>
                                <a href="page_ready_pricing_tables.html" class="btn btn-xs btn-primary"><i class="fa fa-arrow-up"></i> Upgrade Plan</a>
                            </div-->
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
                <!-- Header -->
                <!-- In the PHP version you can set the following options from inc/config file -->
                <!--
                    Available header.navbar classes:

                    'navbar-default'            for the default light header
                    'navbar-inverse'            for an alternative dark header

                    'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                        'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                    'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                        'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                -->
                <header class="navbar navbar-default navbar-fixed-top">
                
                    <!-- Navbar Header -->
                    <div class="navbar-header">
                        <!-- Horizontal Menu Toggle + Alternative Sidebar Toggle Button, Visible only in small screens (< 768px) -->
                        <ul class="nav navbar-nav-custom pull-right visible-xs">
                            <li>
                                <a data-target="#horizontal-menu-collapse" data-toggle="collapse" href="javascript:void(0)">Menu</a>
                            </li>
                            <!--li>
                                <a onclick="App.sidebar('toggle-sidebar-alt');" href="javascript:void(0)">
                                    <i class="gi gi-share_alt"></i>
                                    <span class="label label-primary label-indicator animation-floating">4</span>
                                </a>
                            </li-->
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
                        <!--li>
                            <!-- If you do not want the main sidebar to open when the alternative sidebar is closed, just remove the second parameter: App.sidebar('toggle-sidebar-alt'); -->
                            <!--a onclick="App.sidebar('toggle-sidebar-alt', 'toggle-other');" href="javascript:void(0)">
                                <i class="gi gi-share_alt"></i>
                                <span class="label label-primary label-indicator animation-floating">4</span>
                            </a-->
							<!--a href="javascript:void(0)">
                                <i class="gi gi-share_alt"></i>
                                <span class="label label-primary label-indicator animation-floating">4</span>
                            </a>
                        </li-->
                    </ul>
                    <!-- END Alternative Sidebar Toggle Button -->

                    <!-- Horizontal Menu + Search -->
                    <div class="collapse navbar-collapse" id="horizontal-menu-collapse">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="javascript:void(0)">Home</a>
                            </li>
                            <!--li>
                                <a href="javascript:void(0)">Profile</a>
                            </li-->
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">Candidates <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="fa fa-asterisk fa-fw pull-right"></i> Bulk Update</a></li>
                                    <li><a href="index.php?op=list" ><i class="fa fa-lock fa-fw pull-right"></i> All</a></li>
                                    <!--li><a href="javascript:void(0)"><i class="fa fa-user fa-fw pull-right"></i> Account</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-magnet fa-fw pull-right"></i> Subscription</a></li>
                                    <li class="divider"></li>
                                    <!--li class="dropdown-submenu">
                                        <a tabindex="-1" href="javascript:void(0)"><i class="fa fa-chevron-right fa-fw pull-right"></i> More Settings</a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="javascript:void(0)">Second level</a></li>
                                            <li><a href="javascript:void(0)">Second level</a></li>
                                            <li><a href="javascript:void(0)">Second level</a></li>
                                            <li class="divider"></li>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="javascript:void(0)"><i class="fa fa-chevron-right fa-fw pull-right"></i> More Settings</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="javascript:void(0)">Third level</a></li>
                                                    <li><a href="javascript:void(0)">Third level</a></li>
                                                    <li><a href="javascript:void(0)">Third level</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li-->
                                </ul>
                            </li>
                            <!--li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">Contact <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="fa fa-envelope-o fa-fw pull-right"></i> By Email</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-phone fa-fw pull-right"></i> By Phone</a></li>
                                </ul>
                            </li-->
                        </ul>
                        <form action="index.php?op=customSearch" method="post" class="navbar-form-custom" role="search">
                        <div class="form-group">
							<input type="hidden" name="form-submitted" value="1" />	
                            <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search..">
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
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Page Layouts</li>
                        <li><a href="">Fixed Top Header+ Footer</a></li>
                    </ul>
                    <!-- END Fixed Top Header + Footer Header -->
					<div id="searchResult" class="row" style="display:none;">
						<div class="col-lg-5 col-md-6 col-sm-6">
						<div class="block">
                                <!-- Info Title -->
                                <div class="block-title">
                                    <div class="block-options pull-right">
                                        <!--a title="" data-toggle="tooltip" class="btn btn-alt btn-sm btn-default" href="javascript:void(0)" data-original-title="Friend Request"><i class="fa fa-plus"></i></a>
                                        <a title="" data-toggle="tooltip" class="btn btn-alt btn-sm btn-default" href="javascript:void(0)" data-original-title="Hire"><i class="fa fa-briefcase"></i></a-->
                                    </div>
                                    <h2>About <strong><?php echo $scontacts[0]->regId;?></strong> <!--small>• <!--i class="fa fa-file-text text-primary"></i> <a title="" data-toggle="tooltip" href="javascript:void(0)" data-original-title="Download Bio in PDF">Bio</a></small--></h2>
                                </div>
                                <!-- END Info Title -->

                                <!-- Info Content -->
                                <table class="table table-borderless table-striped">
                                    <tbody>
                                        <tr>
                                            <td style="width: 30%;"><strong>Full Name</strong></td>
                                            <td><?php echo $scontacts[0]->fname." ".$scontacts[0]->lname;?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email</strong></td>
                                            <td><!--a href="javascript:void(0)"--><?php echo $scontacts[0]->email;?><!--/a--></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Mobile</strong></td>
                                            <td><!--a href="javascript:void(0)"--><?php echo $scontacts[0]->mobile;?><!--/a--></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Qualification</strong></td>
                                            <td><?php echo $scontacts[0]->qualName;?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Stream</strong></td>
                                            <td>
                                                <?php echo $scontacts[0]->streamName;?>
                                            </td>
                                        </tr>
										<tr>
                                            <td><strong>College</strong></td>
                                            <td>
                                                <?php echo $scontacts[0]->college;?>
                                            </td>
                                        </tr>
										<tr>
                                            <td><strong>Current Status</strong></td>
                                            <td>
                                                <?php echo $scontacts[0]->statusName;?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- END Info Content -->
                            </div>
						</div>
						<div class="col-lg-7 col-md-6 col-sm-6">
						<div class="block full">
                                <!-- Twitter Title -->
                                <div class="block-title">
                                    <div class="block-options pull-right">
                                        <a title="" data-toggle="tooltip" class="btn btn-sm btn-alt btn-default" href="javascript:void(0)" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                    </div>
                                    <h2>Comments <strong>Feed</strong></h2>
                                </div>
                                <!-- END Twitter Title -->

                                <!-- Twitter Content -->
                                <div class="block-top block-content-mini-padding">
                                    <form  method="post" action="">
                                        <textarea placeholder="Write your comments here.." rows="3" class="form-control push-bit" name="ptweet" id="profile-tweet" value="<?php print htmlentities($ptweet) ?>"></textarea>
										<div class="form-group">
											<div class="input-group">
														<span class="input-group-addon"><i class="gi gi-parents"></i></span>
														<select class="form-control input-lg" placeholder="Select your gender" id ="status" name="status" ><option value="" disabled selected style='display:none;' >Select Round</option>
														<?php foreach($statusArray as $row){ 
														/*** create the options ***/
															echo '<option value="'.$row->id.'"';
															if($row->id==45)
															{
																echo ' selected';
															}
															echo '>'. $row->displayName . '</option>'."\n";
															
														
														
														}?>
														</select>
											</div>
										</div>
                                        <div class="clearfix">
											<div class="row" style="padding-left:12px">
												<div class="col-md-10">		
												<input id="ex1"  name="pscore" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="0" value="<?php print htmlentities($pscore) ?>"  />
												</div>
												<div class="col-md-2">
													<button class="btn btn-sm btn-primary pull-right" type="submit" name="msg-submitted2">Submit</button>
												</div>
												
											</div>
											<input type="hidden" name="msg-submitted" value="1" />
											<input type="hidden" name="rId" value="<?php print htmlentities($scontacts[0]->id) ?>" />
                                        </div>
                                    </form>
                                </div>
                                <ul class="media-list">
								<?php foreach($scontacts['activities']  as $act){ ?>
                                    <li class="media">
                                       <!-- <a class="pull-left" href="page_ready_user_profile.html">
                                            <img class="img-circle" alt="Avatar" src="img/placeholders/avatars/avatar2.jpg">
                                        </a> -->
                                        <div class="media-body">
                                            <span class="text-muted pull-right"><small><em><?php echo $act->stime; ?></em></small></span>
                                            <a href="page_ready_user_profile.html"><strong><?php echo $act->staff; ?></strong></a>
											<div>
												<span class="text-muted pull-right"><small><em><?php echo $act->statusName.' with score of '.$act->score; ?></em></small></span>
												<p><?php echo $act->comment; ?></p>
											</div>
                                        </div>
                                    </li> 
								<?php } ?>
                                </ul>
                                <!-- END Twitter Content -->
                            </div>
						</div>
						
					</div>
                   
					<div id="default1" class="row">
                        <div class="col-md-6">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-extra text-center themed-background-dark-night">
                                    <h3 class="widget-content-light"><i class="fa fa-arrow-up animation-floating"></i> Weekly <strong>Stats</strong></h3>
                                </div>
                                <div class="widget-simple">
                                    <div class="row text-center">
                                        <div class="col-xs-4">
                                            <a class="widget-icon themed-background-spring" href="javascript:void(0)">
                                                <i class="gi gi-coins"></i>
                                            </a>
                                            <h3 class="remove-margin-bottom">+ <strong>10%</strong><br><small>Earnings</small></h3>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="widget-icon themed-background-spring" href="javascript:void(0)">
                                                <i class="gi gi-thumbs_up"></i>
                                            </a>
                                            <h3 class="remove-margin-bottom">+ <strong>20%</strong><br><small>Sales</small></h3>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="widget-icon themed-background-fire" href="javascript:void(0)">
                                                <i class="fa fa-ticket"></i>
                                            </a>
                                            <h3 class="remove-margin-bottom">- <strong>10%</strong><br><small>Tickets</small></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Widget -->
                        </div>
                        <div class="col-md-6">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-extra text-center themed-background-flatie">
                                    <h3 class="widget-content-light"><i class="fa fa-chevron-up animation-floating"></i> Monthly <strong>Stats</strong></h3>
                                </div>
                                <div class="widget-simple themed-background-dark-flatie">
                                    <div class="row text-center">
                                        <div class="col-xs-4">
                                            <a class="widget-icon themed-background-flatie" href="javascript:void(0)">
                                                <i class="gi gi-coins"></i>
                                            </a>
                                            <h3 class="widget-content-light remove-margin-bottom">+ <strong>10%</strong><br><small>Earnings</small></h3>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="widget-icon themed-background-flatie" href="javascript:void(0)">
                                                <i class="gi gi-thumbs_up"></i>
                                            </a>
                                            <h3 class="widget-content-light remove-margin-bottom">+ <strong>20%</strong><br><small>Sales</small></h3>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="widget-icon themed-background-night" href="javascript:void(0)">
                                                <i class="fa fa-ticket"></i>
                                            </a>
                                            <h3 class="widget-content-light remove-margin-bottom">- <strong>10%</strong><br><small>Tickets</small></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Widget -->
                        </div>
						
                    </div>
					<div id="default2" class="row">
                        <div class="col-lg-4">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-extra-full text-center themed-background-modern">
                                    <!-- Jquery Sparkline (initialized in js/pages/widgetsStats.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                                    <span class="mini-chart-line" id="mini-chart-line1"><canvas style="display: inline-block; width: 270px; height: 150px; vertical-align: top;" width="270" height="150"></canvas></span>
                                </div>
                                <div class="widget-extra text-center themed-background-dark-modern">
                                    <h3 class="widget-content-light">Weekly <strong>Earnings</strong></h3>
                                </div>
                            </div>
                            <!-- END Widget -->
                        </div>
                        <div class="col-lg-4">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-extra-full text-center themed-background-night">
                                    <!-- Jquery Sparkline (initialized in js/pages/widgetsStats.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                                    <span class="mini-chart-line" id="mini-chart-line2"><canvas style="display: inline-block; width: 270px; height: 150px; vertical-align: top;" width="270" height="150"></canvas></span>
                                </div>
                                <div class="widget-extra text-center themed-background-dark-night">
                                    <h3 class="widget-content-light">Weekly <strong>Sales</strong></h3>
                                </div>
                            </div>
                            <!-- END Widget -->
                        </div>
                        <div class="col-lg-4">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-extra-full text-center themed-background-fire">
                                    <!-- Jquery Sparkline (initialized in js/pages/widgetsStats.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                                    <span class="mini-chart-line" id="mini-chart-line3"><canvas style="display: inline-block; width: 270px; height: 150px; vertical-align: top;" width="270" height="150"></canvas></span>
                                </div>
                                <div class="widget-extra text-center themed-background-dark-fire">
                                    <h3 class="widget-content-light">File <strong>Downloads</strong></h3>
                                </div>
                            </div>
                            <!-- END Widget -->
                        </div>
                    </div>
					
					
                </div>
				
                <!-- END Page Content -->

                <!-- Footer -->
                <footer class="clearfix">
                    <div class="pull-right">
                        Crafted with <i class="fa fa-heart text-danger"></i> by <a target="_blank" href="http://goo.gl/vNS3I">pixelcave</a>
                    </div>
                    <div class="pull-left">
                        <span id="year-copy">2014</span> &copy; <a target="_blank" href="http://goo.gl/TDOSuC">ProUI 2.1</a>
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
	<script>
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
$('#ex1').slider({
	formatter: function(value) {
		return 'Current value: ' + value;
	}
});
	</script>
	</body>
</html>