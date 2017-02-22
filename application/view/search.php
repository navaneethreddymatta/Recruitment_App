<?php
$rID="";
?>
<!--<form id="searchByID  role="form" method="POST" action="">	
Search: <input type="text" name="rID" id="rID" value="<?php //print htmlentities($rID) ?>"><br>

<input type="submit" value="Submit" name="searchForm">
</form>-->

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Flexeye</title>
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
		</br>
		<div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
	</div>
</div>
<div id="page-container"  class="sidebar-no-animations footer-fixed">
	<div id="main-container">
		<div id="page-content"  style="min-height: 749px;">
			<div class="content-header">
				<div class="header-section">
					<div class="row">
						<div class="col-lg-10 col-md-10 col-sm-10">
							<h1>
							Flexeye Recruitment Drive
							</h1>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2">
							<img src="assets/img/flexeye blue logo.png TRANSPARENT.png" width="220px" align="right" style="float:right;margin-top:-17px"/>	
						</div>
					</div>	
				</div>
			</div>	
			<div id="searchErrors" class="nav navbar-nav">
			<?php if(count($errors)!=0){
					echo '<ul class="errors">';
					foreach ( $errors as $field => $error ) {
						echo '<li>'.htmlentities($error).'</li>';
					}
					echo '</ul>';
				} 
			?>	
			</div>			
			<div class="block">
				<div class="block-title">
					<h3 style="font-size:24px;" ><strong>Results!</strong></h3>
				</div>
				<div class="row">
					<div class= "col-lg-12 col-md-12 col-sm-12" >
						<form id="progress-wizard1"  role="form" method="POST" action="">	
							<div id="progress-first" class="step">	
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<div>
												<div class="input-group">
													<span class="input-group-addon"><i class="gi gi-user"></i></span>
													<span id="eveDm" class="input-group-addon"><?php echo $prefixEve; ?></span>
													<input type="text"  placeholder="Please enter your Registration ID" class="form-control input-lg" name="rID" id="rID" value="" />
												</div>
												<!--div class="input-group">	
													<span class="input-group-addon"><i class="gi gi-user"></i></span>
													<input type="text"  placeholder="Please enter your Registration ID" class="form-control input-lg" name="rID" id="rID" value="" />
												</div-->
											</div>
										</div>
									</div>	
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<div>
												<div class="input-group">	
													<span class="input-group-addon"><i class="gi gi-user"></i></span>
													<input type="text"  placeholder="Please enter your email ID" class="form-control input-lg" name="remail" id="remail" value="" />
												</div>
											</div>
										</div>
									</div>									
								</div>
								<input type="hidden" name="searchForm" value="1" />
								<div class="row">
									<div class= "col-lg-4  col-sm-4 col-ms-4">
									</div>
									<div class = "col-lg-4 col-sm-4 col-ms-4" style="align:center">										
										<button class="btn btn-lg btn-primary btn-block" type="submit">Show Status  <i class="fa fa-arrow-right"></i></button>
									</div>
									<div class= "col-lg-4  col-sm-4 col-ms-4">
									</div>
								</div>
							</div>
						</form>
						<br/>
						<?php if ( isset($_POST['searchForm']) ) {?>
						<table class="table table-borderless table-striped">
							<tbody>
								<?php $count = count($scontacts);						 
								 if($count >=1){
								 ?>							
								<tr>
									<td style="width: 25%;"><strong>Full Name</strong></td>
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
									<?php
									$statusName = $scontacts[0]->statusName;
										$result = "warning";
										if (strpos($statusName,'Qualified') !== false) {
											$result ="success";
										}
										if (strpos($statusName,'Disqualified') !== false) {
											$result ="danger";
										}
										if (strpos($statusName,'Completed') !== false) {
											$result ="info";
										}
										if (strpos($statusName,'Day') !== false) {
											$result ="warning";
										}?>	
								<tr class="<?php echo $result; ?>">						
									<td ><strong>Current Status</strong></td>
									<td>
									<?php echo $scontacts[0]->statusName;?>
									</td>											
								</tr>
								<?php					
								}
								else{?>
								<tr class="danger">	
									<td class="danger"><strong>Invalid Registration ID</strong></td>                                            											
								</tr>
								<?php }
								}?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<footer class="clearfix">
			<div class="pull-left" style="background-color:#ffffff;padding:5px;font-size:11px;">
				<div>&copy; 2015 Flexeye. All rights reserved.</div>
			</div>
		</footer>
	</div>
</div>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/vendor/bootstrap.min.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/pages/formsValidation.js"></script>
    <script>$(function(){ FormsValidation.init(); });</script>
	</body>
</html>
