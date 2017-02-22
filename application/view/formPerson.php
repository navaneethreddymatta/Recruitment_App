<div id="personform" class="block">
	<!-- Form Validation Example Title -->
	<div class="block-title">
		<h2><strong>Person Information</strong></h2>
	</div>
	<!-- END Form Validation Example Title -->
	<!-- Form Validation Example Content -->
	<form class="form-horizontal" method="post" action="" id="personform-validation" novalidate="novalidate">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-user"></i></span>
							<input type="text" placeholder="Please enter display name" class="form-control input-lg" name="val_name" id="val_name" value="<?php if(count($settingFor)>0){ echo $settingFor->name;}?>">	
						</div>
					</div>
					<span id="errMess" style="color:Red;padding-left:16px;font-family: Helvetica,Arial,sans-serif;font-size: 15px;display:none"></span>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-envelope"></i></span>
							<input type="email" placeholder="Please enter username" class="form-control input-lg" name="val_username" id="val_username" value="<?php if(count($settingFor)>0){ echo $settingFor->username;}?>">							
						</div>
					</div>
					<span id="errMess2" style="color:Red;padding-left:16px;font-family: Helvetica,Arial,sans-serif;font-size: 15px;display:none"></span>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-envelope"></i></span>
							<input type="password" placeholder="Please enter password" class="form-control input-lg" name="val_password" id="val_password" value="<?php if(count($settingFor)>0){ echo $settingFor->password;}?>">							
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-parents"></i></span>
							<select class="form-control input-lg" placeholder="Select a Role" id ="val_role" name="val_role" style="padding-top:12px;opacity:0.8">
								<option value="" disabled selected style='display:none;' >Select a Role</option>
								<?php foreach($roles as $row){								
									/*** create the options ***/
									echo '<option value="'.$row->id.'"';
									if(count($settingFor)>0 && $row->id == $settingFor->role)	{
										echo ' selected';
									}
									echo '>'. $row->name . '</option>'."\n";
								}
								?>
							</select>
						</div>
					</div>
				</div>			
			</div>	
		</div>
		<div class="form-group form-actions">
			<div class="col-md-8 col-md-offset-4">
				<input type="hidden" value="people" name="val_form" id="val_form">
				<input type="hidden" value="<?php if(count($settingFor)>0){ echo $settingFor->id;}?>" name="val_id" id="val_id">
				<button id="sbmt" class="btn btn-sm btn-primary" type="submit" ><i class="fa fa-arrow-right"></i> Submit</button>
				<button class="btn btn-sm btn-warning" type="reset"><i class="fa fa-repeat"></i> Reset</button>
			</div>
		</div>
		</form>
	<!-- END Form Validation Example Content -->
</div>
<script>
var staffList=<?php echo json_encode($staffLst)?>;
var currId='<?php if(count($settingFor)>0){ echo $settingFor->id;}else{echo "";}?>';
var isNameValid=1;
var isUsernameValid=1;
$("#val_name").change(function(){
	var dv=document.getElementById("val_name").parentNode;	
	isNameValid=1;
	var inpName=this.value;
	for(var i=0;i<staffList.length;i++){
		if(staffList[i].id != currId && staffList[i].name == inpName){			
			isNameValid=0;
			break;
		}
	}
	if(isNameValid==1){
		$(dv).removeClass("has-error");
		var dv1=dv.parentNode;
		$("#errMess").text("");	
		$("#errMess").css({'display':'none'});
	}
	else{
		$(dv).addClass("has-error");
		var dv1=dv.parentNode;
		$("#errMess").text("Name already exists");
		$("#errMess").css({'display':'block'});
	}
	accessSubmit();
});
$("#val_username").change(function(){
	var dv=document.getElementById("val_username").parentNode;	
	isUsernameValid=1;
	var inpUsername=this.value;
	for(var i=0;i<staffList.length;i++){
		if(staffList[i].id != currId && staffList[i].username == inpUsername){			
			isUsernameValid=0;
			break;
		}
	}
	if(isUsernameValid==1){
		$(dv).removeClass("has-error");
		var dv1=dv.parentNode;
		$("#errMess2").text("");
		$("#errMess2").css({'display':'block'});		
	}
	else{
		$(dv).addClass("has-error");
		var dv1=dv.parentNode;
		$("#errMess2").text("Username already exists");
		$("#errMess2").css({'display':'block'});
	}
	accessSubmit();
});
function accessSubmit(){
	if(isNameValid ==1 && isUsernameValid ==1){
		$("#sbmt").removeClass("disabled");
	}
	else{
		$("#sbmt").addClass("disabled");
	}
}
</script>