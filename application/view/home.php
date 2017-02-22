<?php
$ptweet="";
$pscore=3;
$regId =0;
$status=0;?>
<?php include 'application/view/fx_commonhead.php'; ?>            
<?php include 'application/view/fx_sidebarAlt.php'; ?>
<?php include 'application/view/fx_sidebar.php'; 

?>
<!-- Main Container -->
	<div id="main-container">
		<?php include 'application/view/fx_header.php'; ?> 
		<!-- Page content -->
		<div id="page-content" style="min-height: 378px;">
			<!-- Fixed Top Header + Footer Header -->
			 <?php include 'application/view/contentHeader.php'; ?> 
			<!--ul class="breadcrumb breadcrumb-top">
				<li>Page Layouts</li>
				<li><a href="">Fixed Top Header+ Footer</a></li>
			</ul-->
			<!-- END Fixed Top Header + Footer Header -->
		<div id="searchResult" class="row" >
		<?php
		$count = count($scontacts);
		if($count >= 1)
		{
		?>
			<div class="col-lg-5 col-md-5 col-sm-5">
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
			<div class="col-lg-7 col-md-7 col-sm-7">
				<div class="block full">
					<!-- Twitter Title -->
					<div class="block-title">
						
						<h2>Comments <strong>Feed</strong></h2>
					</div>
					<!-- END Twitter Title -->

					<!-- Twitter Content -->
					<div class="block-top block-content-mini-padding">
						<form id="commentsForm" method="post" action="">
						<div id="progress-first" class="step">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<div>
											<div class="input-group"> 
												<span class="input-group-addon"><i class="gi gi-podium"></i></span>
												<textarea placeholder="Write your comments here.." rows="3" class="form-control input-lg" name="ptweet" id="ptweet" value="<?php print htmlentities($ptweet) ?>"></textarea>
											 </div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-7">
									<div class="form-group">
										<div>
											<div class="input-group">
													<span class="input-group-addon"><i class="gi gi-parents"></i></span>
													<select class="form-control input-lg" placeholder="Select your gender" id ="status" name="status"></select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">		
									<input id="ex1"  name="pscore" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="3" value="<?php print htmlentities($pscore) ?>"  />
									<span id="ex6CurrentSliderValLabel">Score: <span id="ex6SliderVal">3</span></span>
								</div>
								<div class="col-md-1">
								</div>
							</div>
							<div class="clearfix">		
								<div class="col-md-6">		
									<span><input type="checkbox" id="specialCase" name="specialCase"></span>
									<span>Special Consideration</span>
								</div>
								<button class="btn btn-sm btn-primary pull-right" type="submit" id="submitBtn1" name="msg-submitted2">Submit</button>
								<input type="hidden" name="msg-submitted" value="1" />
								<input type="hidden" name="rId" value="<?php print htmlentities($scontacts[0]->id) ?>" />
								<input type="hidden" name="rId2" value="<?php print htmlentities($scontacts[0]->regId) ?>" />
							</div>
							</div>
						</form>
					</div>
					<ul class="media-list">
					<?php 
					foreach($scontacts['activities']  as $act){ 
						$fColor = $act->bgColor;?>
						<li class="media">
						   <!-- <a class="pull-left" href="page_ready_user_profile.html">
								<img class="img-circle" alt="Avatar" src="img/placeholders/avatars/avatar2.jpg">
							</a> -->
							<div class="media-body">
								<span class="text-muted pull-right"><small><em><?php echo $act->stime; ?></em></small></span>
								<a href="index.php?op=profile"><strong><?php echo $act->staff; ?></strong></a>
								<div>
									<span class="text-muted pull-right"><small><em style="color:<?php echo $fColor;?>"><?php echo $act->statusName.' ('.$act->score.'/10)' ?></em></small></span>
									<p><?php echo $act->comment; ?></p>
								</div>
							</div>
						</li> 
					<?php } ?>
					</ul>
					<!-- END Twitter Content -->
				</div>
			</div>
			<?php }
			else{?>
			<table class="table table-borderless table-striped">
				<tbody>
					<tr class="danger">
						<td ><strong>Invalid Registration ID</strong></td>
					</tr>
				</tbody>
			</table>
			<?php }?>
		</div>                 
	</div>
	<!-- END Page Content -->
	<?php include 'application/view/fx_footer.php'; ?>
	</div>
<!-- END Main Container -->
</div>		
<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/vendor/bootstrap.min.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/app.js"></script>
	<?php /*if(count($scontacts)>0){ echo '<script>document.getElementById("default1").style.display="none";
					document.getElementById("default2").style.display="none"; document.getElementById("searchResult").style.display="block";</script>';}*/?>
	<script src="assets/js/appInitializer.js" type="text/javascript"></script>
	<script src="assets/js/pages/formsValidation.js"></script>
        <script>$(function(){ FormsValidation.init(); });</script>
		<script>function getContactsByStatus(status){location.href = 'index.php?op=showDetails&id='+id+'&status='+status;}</script>
	<script src="assets/js/stats.js" type="text/javascript"></script>
	<script>
		var allStatuses = <?php echo json_encode($statusArray); ?>;
		var currRound=<?php echo $scontacts[0]->roundId;?>;
		var currStatus=<?php echo $scontacts[0]->statusId;?>;
		var currState=<?php echo $scontacts[0]->stateId;?>;
		var currOrdinal=<?php echo $scontacts[0]->ordinalId;?>;
		loadFilteredStatuses();
		function loadFilteredStatuses()
		{
			$("#status").children().remove();$("#status").append("<option value='' disabled selected style='display:none;' >Select Round</option>");
			var filterStats=new Array();
			for(i=0,j=0;i<allStatuses.length && j<=2;i++)
			{			
				if(currState == 1 && j==0)
				{
					j=j+1;
				}
				if(allStatuses[i].id == currStatus || j>0)
				{
					if(j>0 && currState == 2)
					{
						filterStats.push(allStatuses[i]);
						j=j+2;
					}
					else if(j>0 && (currState == 3 || currState == 1))
					{
						filterStats.push(allStatuses[i]);
					}
					j=j+1;
				}				
			}
			for(j=0;j<filterStats.length;j++)
			{
				$("#status").append("<option value='"+filterStats[j].id+"'>"+filterStats[j].displayName+"</option>");
			}
		}
		function loadAllStatuses()
		{
			$("#status").children().remove();	
			$("#status").append("<option value='' disabled selected style='display:none;' >Select Round</option>");
			for(i=0;i<allStatuses.length;i++)
			{
				if(allStatuses[i].id != currStatus){
					$("#status").append("<option value='"+allStatuses[i].id+"'>"+allStatuses[i].displayName+"</option>");
				}
			}	
		}
		$("#specialCase").click(function(){
			var $this=$(this);
			if($this.is(':checked'))
			{
				loadAllStatuses();
			}
			else
			{
				loadFilteredStatuses();
			}			
		});
		$(document).ready(function(){
//$("#submitBtn1").addClass("disabled");
	$("#submitBtn1").bind("click",function(e){
	document.forms['commentsForm'].submit();
		$(this).attr("disabled",true);
	});
	$('#ptweet').change(function(){
		$("#submitBtn1").prop("disabled",false);
	});
	$('#status').change(function(){
		$("#submitBtn1").prop("disabled",false);
	});
});	

	</script>
	</body>
</html>