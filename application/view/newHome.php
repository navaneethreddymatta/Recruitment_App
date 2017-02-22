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
		<div class="block full">
			<div class="block-title">
				<h2><strong>Statistics</strong></h2>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="form-group">                                      
						<div style="padding:0px">
							<div class="input-group ">
								<span class="input-group-addon"><i class="si si-myspace"></i></span>
								<select class="form-control input-md"  id ="selectRadio" >													
									<option    value="college" selected >College</option>	
									<option    value="stream"  >Stream</option>	
									<option    value="source" >Source</option>	
									<option    value="person"  >Person</option>	
									<option    value="event"  >Event</option>	
								</select>
							</div>
						</div>	
					</div>
				</div>
				<div id="chrtTypeSelector" class="col-md-6 col-sm-6">
					<div class="form-group">  			
						<div>
							<div class="input-group ">
								<span class="input-group-addon"><i class="gi gi-charts"></i></span>
								<select class="form-control input-md"  id ="selectRadio1" >														
									<option value="table"  >Table View</option>	
									<option value="chart" selected >Chart View</option>	
								</select>
							</div>
						</div>			
					</div>
				</div>
			</div>
			<div class="row">
			
				<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" >
					<div id="example-data3" class="table-responsive"  >
				
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<!-- Input Grid Block -->
					<div id="example-data1" class="table-responsive"  >
					</div>
				</div>
				<!-- Input Grid Content -->
			<!-- END Input Grid Content -->
			</div>
		</div>
	</div>	
    <?php include 'application/view/fx_footer.php'; ?>
    <!-- END Main Container -->
    </div>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/vendor/bootstrap.min.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/app.js"></script>
	<?php if(count($scontacts)>0){ echo '<script>document.getElementById("default1").style.display="none";
					document.getElementById("default2").style.display="none"; document.getElementById("searchResult").style.display="block";</script>';}?>
	<script src="assets/js/appInitializer.js" type="text/javascript"></script>
	<script src="assets/js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
		<script>function getContact(id,status){location.href = 'index.php?op=showDetails&id='+id+'&status='+status;}</script>
	<script>

$("#ex1").slider();
$("#ex1").on("slide", function(slideEvt) {
	$("#ex6SliderVal").text(slideEvt.value);
})
var $toggle="chart";
var $val="college";
$("#selectRadio1").change(function(){
	$toggle = $(this).val();		
	changeTable();
});
$("#selectRadio").change(function(){
		$val = $(this).val();
		changeTable();	
});
$url = 'index.php?op=homeDetails&val=college&toggle=chart';	
$.get($url, function(data) {
	$("#example-data3").html(data);
	$(function(){ TablesDatatables3.init(); });
	$("#example-data1").html("");
});
function changeTable(){

	if($val=="event")
	{
		$("#chrtTypeSelector").hide();
		$url = 'index.php?op=homeDetailsEvent&val='+$val+'&toggle='+$toggle;	
		$.get($url, function(data) {		
			$("#example-data3").html(data);
			$(function(){ TablesDatatables3.init(); });
			$("#example-data1").html("");
		});
	}
	else
	{
		$("#chrtTypeSelector").show();
		$url = 'index.php?op=homeDetails&val='+$val+'&toggle='+$toggle;	
		$.get($url, function(data) {
			$("#example-data3").html(data);
			$(function(){ TablesDatatables3.init(); });
			$("#example-data1").html("");
		});
	}
}
function getContactBySelection(source,val){
	$url = 'index.php?op=homeDetailsBySelection&source='+source+'&val='+val;	
	$.get($url, function(data) {
		$("#example-data1").html(data);
		$(function(){ TablesDatatables1.init(); });
	});
}
	</script>
	<script src="assets/js/pages/formsValidation.js"></script>
	<script>$(function(){ FormsValidation.init(); });</script>
	<script>function getContactsByStatus(status){location.href = 'index.php?op=showDetails&id='+id+'&status='+status;}</script>
	<script>function getContactDetails(id,status,regId){location.href = 'index.php?op=showDetails&id='+regId;}</script>		
	<script src="assets/js/pages/tablesDatatables3.js"></script>
	<script src="assets/js/pages/tablesDatatables1.js"></script>
	<script>$(function(){ TablesDatatables.init(); });</script>
	<script src="assets/js/stats.js" type="text/javascript"></script>
</body>
</html>