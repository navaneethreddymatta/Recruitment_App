<?php
/*echo "<pre>"; 
print_r($scontacts);*/
//echo $scontacts[0]->regId;
$ptweet="";
$pscore=0;
$regId =0;
$status=0;?>
<?php include 'application/view/fx_commonhead.php'; ?>            
<?php include 'application/view/fx_sidebarAlt.php'; ?>
<?php include 'application/view/fx_sidebar.php'; ?>
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
			<div class="block full">
				<!-- Working Tabs Title -->
				<div class="block-title">
					<h2>Settings <small></small></h2>
				</div>
				<!-- END Working Tabs Title -->
				<!-- Working Tabs Content -->
				<div class="row">
					<div class="col-lg-7 col-md-12 col-sm-12">
						<!-- Default Tabs -->
						<ul data-toggle="tabs" class="nav nav-tabs push">
							<li class="active" onclick="clearForm();"><a href="#example-tabs-settings" data-original-title="Events"><i class="fa fa-cog"></i> Events</a></li>
							<li class="" onclick="clearForm();"><a href="#example-tabs-profile"><i class="gi gi-roundabout"></i> Statuses</a></li>
							<li class="" onclick="clearForm();"><a href="#example-tabs-messages" data-original-title="Email Messages"><i class="fa fa-envelope-o"></i> Emails</a></li>
							<li class="" onclick="clearForm();"><a href="#example-tabs-people" data-original-title="People"><i class="gi gi-group"></i> Staff</a></li>
							<li class="" onclick="clearForm();"><a href="#example-tabs-definitions"><i class="gi gi-roundabout"></i> Rounds</a></li>							
							<li class="" onclick="clearForm();"><a href="#example-tabs-candidates" data-original-title="People"><i class="gi gi-group"></i> Candidates</a></li>
						</ul>
						<div class="tab-content">
							<div id="example-tabs-settings" class="tab-pane active">									
								<div id="example-data1" class="table-responsive" >
									<table id="example-datatable1" class="table table-vcenter table-hover table-condensed table-bordered">
										<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Location</th>
												<th>Date</th>						
												<th>Cut-Off</th>
												<th>Year(s)</th>
												<th style="opacity:0 !important;max-width:40px"></th>
											</tr>
										</thead>
										<tbody>
										<?php $i=1;foreach($events as $event){
											$rowTxt= "<tr id='Row1".$i."' onclick='getSelected(\"event\",\"".$event->id."\")'><td id='Col1".$i."'>".$event->id."</td><td id='Col1".$i."'>".$event->name."</td><td id='Col1".$i."'>".$event->location."</td><td id='Col1".$i."'>".$event->evtDate."</td><td id='Col1".$i."'>".$event->evtCutOff."</td><td id='Col1".$i."'>".$event->evtYearFrom."</td><td id='Col1".$i."'>";
											if($event->isActive == 1)
											{
												$rowTxt=$rowTxt."<span><i class='gi gi-ok_2 text-success'></span>";
											}
											$rowTxt=$rowTxt."</td></tr>";
											$i=$i+1;
											echo $rowTxt;
										}?>
										</tbody>
									</table>
								</div>
							</div>
							<div id="example-tabs-profile" class="tab-pane">
								<div id="example-data2" class="table-responsive" >
									<table id="example-datatable2" class="table table-vcenter table-hover table-condensed table-bordered">
										<thead>
											<tr>
												<th>Order</th>
												<th>Name</th>
												<th>Display Name</th>
												<th>Email Template</th>
											</tr>
										</thead>
										<tbody>
											<?php $i=1;foreach($allStatuses as $event){
											echo "<tr id='Row2".$i."' onclick='getSelected(\"status\",\"".$event->id."\")'><td id='Col2".$i."'>".$event->ordinal."</td><td id='Col2".$i."'>".$event->name."</td><td id='Col2".$i."'>".$event->displayName."</td><td id='Col2".$i."'>".$event->emailTemplate.". ".$event->emailTemplateName."</td></tr>";
											$i=$i+1;
										}?>			
										</tbody>
									</table>
								</div>
							</div>
							<div id="example-tabs-messages" class="tab-pane">
								<div id="example-data3" class="table-responsive" >
									<table id="example-datatable3" class="table table-vcenter table-hover table-condensed table-bordered">
										<thead>
											<tr>
												<th>ID</th>
												<th>Name</th>
												<th>Subject</th>
											</tr>
										</thead>
										<tbody>
											<?php $i=1;foreach($emailTemplates as $event){
											echo "<tr id='Row3".$i."' onclick='getSelected(\"email\",\"".$event->id."\")'><td id='Col3".$i."'>".$event->id."</td><td id='Col3".$i."'>".$event->name."</td><td id='Col3".$i."'>".$event->subject."</td></tr>";
											$i=$i+1;
										}?>				
										</tbody>
									</table>
								</div>
							</div>
							<div id="example-tabs-people" class="tab-pane">
								<div id="example-data4" class="table-responsive" >
									<table id="example-datatable4" class="table table-vcenter table-hover table-condensed table-bordered">
										<thead>
											<tr>
												<th>ID</th>
												<th>Name</th>
												<th>Username</th>
												<th>Role</th>
											</tr>
										</thead>
										<tbody>
											<?php $i=1;foreach($staff as $person){
											echo "<tr id='Row4".$i."' onclick='getSelected(\"people\",\"".$person->id."\")'><td id='Col4".$i."'>".$person->id."</td><td id='Col4".$i."'>".$person->name."</td><td id='Col4".$i."'>".$person->username."</td><td id='Col4".$i."'>".$person->rolename."</td></tr>";
											$i=$i+1;
										}?>				
										</tbody>
									</table>
								</div>
							</div>
							<div id="example-tabs-definitions" class="tab-pane">
								<div id="example-data5" class="table-responsive" >
									<table id="example-datatable5" class="table table-vcenter table-hover table-condensed table-bordered">
										<thead>
											<tr>	
												<th>Order</th>
												<th>Name</th>
												<th>Display Name</th>
												<th>Email Template</th>
											</tr>
										</thead>
										<tbody>
											<?php $i=1;foreach($allStatusDefinitions as $event){
											echo "<tr id='Row5".$i."' onclick='getSelected(\"statusNewDef\",\"".$event->id."\")'><td id='Col5".$i."'>".$event->ordinal."</td><td id='Col5".$i."'>".$event->name."</td><td id='Col5".$i."'>".$event->displayName."</td><td id='Col5".$i."'>".$event->emailTemplate.". ".$event->emailTemplateName."</td></tr>";
											$i=$i+1;
										}?>			
										</tbody>
									</table>
								</div>
							</div>
							<div id="example-tabs-candidates" class="tab-pane">									
								<div id="example-data6" class="table-responsive" >
									<table id="example-datatable6" class="table table-vcenter table-hover table-condensed table-bordered">
										<thead>
											<tr>
												<th>Id</th>
												<th>Name</th>
												<th>Email</th>
												<th>Mobile</th>						
												<th>Year Passed</th>												
											</tr>
										</thead>
										<tbody>
										<?php $i=1;foreach($allCandidates as $candidate){
											echo "<tr id='Row6".$i."' onclick='getSelected(\"candidateDetail\",\"".$candidate->regId."\")'>
											<td>".$candidate->regId."</td><td>".$candidate->fullName."</td><td>".$candidate->email."</td><td>".$candidate->mobile."</td><td>".$candidate->yearPassed."</td></tr>";
											$i=$i+1;
										}?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- END Default Tabs -->
					</div>
					<div class="col-lg-5 col-md-12 col-sm-12">
						<div id="details">
						</div>
					</div>
				</div>
				<!-- END Working Tabs Content -->
			</div>                
		</div>
		<!-- END Page Content -->
		<!-- END Footer -->
   <?php include 'application/view/fx_footer.php'; ?>
	</div>
	<!-- END Main Container -->
</div>		
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/vendor/bootstrap.min.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/app.js"></script>	
	<script src="assets/js/appInitializer.js" type="text/javascript"></script>
	<script>
		function getSelected(source,val){
			$('#details').html("");
			$.get('index.php?op=getSettings&source='+source+'&val='+val, function(data) {
				$('#details').html(data);
			  $(function(){ FormsValidation1.init(); });
			});
		}
		function getIncluded(source,val){
			$('#details').html("");
			$.get('index.php?op=getIncluded&source='+source, function(data) {
				$('#details').html(data);			 
			});
		}
		function clearForm(){
			$('#details').html("");
		}
	</script>
	<script src="assets/js/pages/formsValidation1.js"></script>
	<script>$(function(){ FormsValidation1.init(); });</script>
	<script>function getContactsByStatus(status){location.href = 'index.php?op=showDetails&id='+id+'&status='+status;}</script>
	<script src="assets/js/pages/tablesDatatables2.js"></script>
	<script>$(function(){ TablesDatatables2.init(); });</script>
	<script src="assets/js/stats.js" type="text/javascript"></script>
</body>
</html>