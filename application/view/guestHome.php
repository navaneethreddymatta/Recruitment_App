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
			<div id="page-content"  style="min-height: 550px;">
				<div class="content-header">
					<div class="header-section">
						<h1>
							Flexeye Recruitment Drive
							<a href="index.php?op=logout" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Logout" style="float:right;margin-top:-17px"><i class="gi gi-exit"></i></a>	
							<img src="assets/img/flexeye blue logo.png TRANSPARENT.png" width="220px" align="right" style="float:right;margin-top:-17px"/>	
						</h1>						
					</div>
				</div>	
				<div class="block full" style="padding-bottom:40px">
			<div class="block-title">
				<h2><strong>All</strong> Candidates</h2>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<div class="input-group">
						<span id="eveDm" class="input-group-addon"><?php echo $eve->evtDM; ?></span>
						<input id="regIdb" type="search" class="form-control input-lg" aria-controls="example-datatable" placeholder="Reg ID" >
						<span class="input-group-addon">
							<i class="fa fa-search"></i>
						</span>
					</div>
				</div>				
				<div class="col-lg-4 col-md-4">
					<div class="input-group" style="width:200px"><input id="ex2"  name="pscore" data-slider-id='ex2Slider' type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="3" value="3"  />
					<span id="ex6CurrentSliderValLabel">Score: <span id="ex2SliderVal">3</span></span></div>
				</div>				
			</div>	
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8">
					<div style="color:Red" id="errMsg"></div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div style="float:right;padding-bottom:3px;">								
						<div style="float:left">
							<button id="submitted2" name="submitted2" type="submit" class="btn btn-sm btn-primary pull-right" style="margin-right:15px;">Submit</button>
						</div>																
					</div>
				</div>
			</div>						
			<div class="table-responsive">
				<div id="example-data" class="table-responsive"  >
				</div>
			</div>
			<div class="row" style="margin-top:10px">				
				<div class="col-lg-4 col-md-4">
					<div class="form-group">
						<div>
							<div class="input-group">
								<span class="input-group-addon"><i class="gi gi-parents"></i></span>
								<select class="form-control input-lg" placeholder="Select Round" id ="status" name="status" style="padding-top:12px;opacity:0.8"><option value="" disabled selected style='display:none;' >Select Round</option>
									<?php
										$lmt=0;
										foreach($statusesObj as $state)
										{
											if($lmt < 2)
											{
											$stId=$state->id;
											$stDn=$state->displayName;
											echo '$("#status").append("<option value='.$stId.'>'.$stDn.'</option>")';
											}
											else{
												break;
											}
											$lmt++;
										}		
									?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="input-group">
						<span class="input-group-addon"><i class="gi gi-parents"></i></span>
						<input id="bulkComment" type="text" class="form-control input-lg" aria-controls="example-datatable" placeholder="Comment..">
					</div>
				</div>	
			</div>
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8">
					<div style="color:Red" id="errMsg2"></div>
				</div>
				<div style="float:right;padding-top:3px;">		
					<div style="float:left">
						<button id="updated2" name="updated2" type="submit" class="btn btn-sm btn-primary pull-right">Update</button>
					</div>
					<div  style="margin-left:10px;float:left;margin-right:15px;">
						<button id="reset2" name="reset2" type="submit" class="btn btn-sm btn-primary pull-right" >Reset</button>
					</div>								
				</div>
			</div>
		</div>
			</div>
			<footer class="clearfix">
				<!--div class="pull-right">
					Crafted with <i class="fa fa-heart text-danger"></i> by <a target="_blank" href="http://goo.gl/vNS3I">pixelcave</a>
				</div-->
				<div class="pull-left" style="background-color:#ffffff;padding:5px;font-size:11px;">
					<div>&copy; 2015 Flexeye. All rights reserved.</div>
				</div>
			</footer>
		</div>
	</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/vendor/bootstrap.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/app.js"></script>
<?php if(count($scontacts)>0){ echo '<script>document.getElementById("default1").style.display="none";
				document.getElementById("default2").style.display="none"; document.getElementById("searchResult").style.display="block";</script>';}?>

<script src="assets/js/pages/tablesDatatables.js"></script>
<script>
var regIds = <?php echo json_encode($candidates); ?>;
var allStatusesObj = <?php echo json_encode($statusesObj); ?>;
var storage=window.localStorage;
$("#ex2").slider();
$("#ex2").on("slide", function(slideEvt) {
	$("#ex2SliderVal").text(slideEvt.value);
})
$("#regIdb").change(function(){
	var isValidId=0;
	var tempReg=document.getElementById("eveDm").innerHTML +""+document.getElementById("regIdb").value;	
	for(i=0;i<regIds.length;i++){
		if(tempReg == regIds[i].regId){
			isValidId=1;		
			break;
		}
	}
	if(isValidId == 0){
		$("#errMsg").text("Please enter a valid Registration Number");
	}
	else{
		$("#errMsg").text("");		
	}
});
$("#submitted2").click(function(){
	var tempReg=document.getElementById("eveDm").innerHTML +""+document.getElementById("regIdb").value;	
	var tempScore =document.getElementById("ex2").value;
	var isValidId=0;
	for(i=0;i<regIds.length;i++){
		if(tempReg == regIds[i].regId){
			isValidId=1;
			break;
		}
	}
	if(tempScore == null || tempScore == ""){
		tempScore=0;
	}
	if(isValidId == 1){
		$("#errMsg").text("");	
		$.ajax({
			type: "POST",
			url: "index.php?op=searchfor&reg2="+tempReg+"&score2="+tempScore,
			data: "",
			success: function(response){		
				appendTempTable(response,tempScore);
			},
			error:function(data){
				alert("error");
			},
			contentType: 'application/json; charset=utf-8',
		});
	}
	else if(isValidId == 0){
		$("#errMsg").text("Please enter a valid Registration Number");
	}
	$("#errMsg2").text("");
});
$("#status").change(function(){
	$("#errMsg2").text("");
});
$("#updated2").click(function(){
	if(tablelist.length > 0 && !($("#status").val() == null)){
		tablelistStr=JSON.stringify(tablelist);
		var bStatus=document.getElementById("status").value;
		var bComment=document.getElementById("bulkComment").value;
		var urlTxt = "index.php?op=updateList&activityList="+tablelistStr+"&status="+bStatus+"&comment="+bComment;		
		$.ajax({
			type: "POST",
			url: urlTxt,
			data:"",
			success: function(response){
				//alert(response);
			},
			error:function(data){
				alert("error");
			},
		  contentType: 'application/json; charset=utf-8',
		});			
		for(j=0;j<tablelist.length;j++){
			var rowObj=tablelist[j];
			for(i=0;i<regIds.length;i++){
				if(regIds[i].regId==rowObj.regIdNum){
					regIds[i].status=rowObj.statusId;			
					break;
				}
			}
		}
		document.getElementById("regIdb").value="";
		$("#status").append("<option value='' disabled selected style='display:none;' >Select Round</option>");
		$("#ex2SliderVal").text("3");
		document.getElementById("ex2").value="3";
		$(".slider-selection").css({'width':'30%'});
		$(".slider-handle").css({'left':'30%'});
		$(".tooltip").css({'left':'50.5px'});
		$(".tooltip-inner").text("3");
		document.getElementById("bulkComment").value="";
		var tablelist1=new Array();
		tablelist=tablelist1;
		createSessionTable('2');
		$("#errMsg2").text("");
	}
	else if(tablelist.length == 0)
	{
		$("#errMsg2").text("Please enter candidate records.");
	}
	else
	{
		$("#errMsg2").text("Please select the status.");
	}
});
$("#reset2").click(function(){
	var tablelist1=new Array();
	tablelist=tablelist1;
	createSessionTable('2');
	document.getElementById("regIdb").value="";
	$("#status").append("<option value='' disabled selected style='display:none;' >Select Round</option>");
	$("#ex2SliderVal").text("3");
	document.getElementById("ex2").value="3";
	$(".slider-selection").css({'width':'30%'});
	$(".slider-handle").css({'left':'30%'});
	$(".tooltip").css({'left':'50.5px'});
	$(".tooltip-inner").text("3");
	document.getElementById("bulkComment").value="";
	$("#errMsg2").text("");
});
function deleteRow(rowId,reg){		
	for(i=0;i<tablelist.length;i++){
		if(tablelist[i].regIdNum == reg){
			tablelist.splice(i,1);			
			break;
		}		
	}
	//sessionStorage.setItem('tempTableList',JSON.stringify(tablelist));
	createSessionTable('1');
}
var tablelist=<?php echo json_encode($tempUsers); ?>;
function appendTempTable(tempTxt,tempScore){
	var details=tempTxt.split(",");
	var cId=details[0];
	var rgId=details[1];
	var fullnme=details[2];
	var emailId=details[3];
	var tscore=tempScore;
	var currStatusName=details[4];
	var duplicate=0;
	var tempRw={id:cId,regIdNum:rgId,name:fullnme,mail:emailId,score:tscore,currStatus:currStatusName};
	var tId=document.getElementById("eveDm").innerHTML +""+document.getElementById("regIdb").value;			
	for(i=0;i<tablelist.length;i++){
		if(tablelist[i].regIdNum == tId){
			tablelist[i].score=tscore;
			$("#tempTableScoreCol"+i).text(tscore);						
			duplicate=1;				
			break;
		}
	}		
	if(duplicate == 0){
		tablelist.push(tempRw);						
	}
	createSessionTable('1');
}
createSessionTable('1');
function createSessionTable(type){
	var jsondata= JSON.stringify(tablelist);
	$url = 'index.php?op=loadSessionListDetails&type='+type+'&source='+jsondata;	
	$.get($url, function(data) {		
		$("#example-data").html(data);
		$(function(){ TablesDatatables.init(); });
	});
}
</script>
<script src="assets/js/appInitializer.js" type="text/javascript"></script>
<!--script src="assets/js/pages/tablesDatatables.js"></script>
<script>$(function(){ TablesDatatables.init(); });</script-->
<script>function getContact(id,status){location.href = 'index.php?op=showDetails&id='+id+'&status='+status;}</script>
<script src="assets/js/stats.js" type="text/javascript"></script>
<script>function getContact(id,status){location.href = 'index.php?op=showDetails&id='+id+'&status='+status;}</script>
	</body>
</html>
