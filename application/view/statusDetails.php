<?php include 'application/view/fx_commonhead.php'; ?>            
<?php include 'application/view/fx_sidebarAlt.php'; ?>
<?php include 'application/view/fx_sidebar.php'; 
$colors=array("#d9edf7","#1e1e1e","#660000","#ADDFAD","#990000","#90EE90","#cc0000","#77DD77","#ff0000","#3CD070","#ff3232","#00CC99","#ff6666","#1CAC78","#ff9999","#009F6B","#ffcccc","#00703C");?>
	<!-- Main Container -->
	<div id="main-container">              
		<!-- Main Container -->
		<?php include 'application/view/fx_header.php'; ?> 
		<!-- END Header -->
		<!-- Page content -->
		<div id="page-content" style="min-height: 378px;">
			<!-- Fixed Top Header + Footer Header -->
			<?php include 'application/view/contentHeader.php'; ?>     
			<!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
			<!--img class="animation-pulseSlow" alt="header image" src="assets/img/home-carousel3.jpg"-->
			<div class="block full">
				<div class="block-title">
					<h2><strong><?php if($statusContacts != null){echo $statusContacts[0]->type;}else{echo "No";}?></strong> Candidates</h2>
				</div>
				<div class="table-responsive">
					<table id="example-datatable" class="table table-vcenter table-hover table-condensed table-bordered">
						<thead>
							<tr>
								<th>Reg ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>	
								<th>Score</th>										
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							//echo "<pre>";
							$ostatus = $status4;
							//print_r($statusContacts);
							foreach($statusContacts as $contact){
								$statusName = $contact->statusName;
								if($contact->status == $ostatus)
								{
									$status = $contact->c1status;
									$bcolor = $colors[$status-1];	
									$fcolor = '#fff';
									if($status%2 ==0)
									{
										$fcolor = '#000';
									}
									if($status == 1 )
									{
										$fcolor = '#fff';
									}
									elseif($status == 2)
									{
										$fcolor = '#fff';
									}
							?>										
							<tr  style="background-color:<?php echo $bcolor?>;color:<?php echo $fcolor;?>;cursor:pointer" onclick=<?php echo 'getContact('.$contact->id.','.$contact->status.')';?>>	
								<td class="text-left" style="padding-left:20px"><?php echo $contact->regId;?></td>
								<td class="text-left" style="padding-left:20px" ><?php echo $contact->fname.' '.$contact->lname;?></td>
								<td class="text-left"style="padding-left:20px" ><?php echo $contact->email;?></td>
								<td class="text-left" style="padding-left:20px"><?php echo $contact->mobile;?></td>
								<!--<td class="text-center"><?php echo $contact->college;?></td>
								<td class="text-center"><?php if($contact->qualName == "MCA"){$var = $contact->qualName;}else{$var = $contact->qualName.' '.'-'.' '.$contact->streamName;}echo $var;?></td>
								<td class="text-center"><?php echo $contact->yearPassed.' '.'/'.' '.$contact->degree;?></td> -->
								<td class="text-left" style="padding-left:20px"><?php echo $contact->score;?>
								<td class="text-left" style="padding-left:20px"><?php echo $contact->statusName;?></td>
							</tr>
							<?php 
								}
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>	
	<!-- Footer -->
    <?php include 'application/view/fx_footer.php'; ?>
    </div>
	<!-- END Main Container -->
</div>		
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/vendor/bootstrap.min.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/app.js"></script>
	<script src="assets/js/appInitializer.js" type="text/javascript"></script>
	<script src="assets/js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
		<script>function getContact(id,status){location.href = 'index.php?op=showDetails&id='+id+'&status='+status;}</script>
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
	</script>	
	<script src="assets/js/pages/formsValidation.js"></script>
	<script>$(function(){ FormsValidation.init(); });</script>
	<script>function getContactsByStatus(status){location.href = 'index.php?op=showDetails&id='+id+'&status='+status;}</script>
	<script>function getContactDetails(id,status){location.href = 'index.php?op=showDetails&id='+id+'&status='+status;}</script>		
	<script src="assets/js/pages/tablesDatatables3.js"></script>
	<script src="assets/js/pages/tablesDatatables1.js"></script>
	<script src="assets/js/stats.js" type="text/javascript"></script>
</body>
</html>