<div id="eventform" class="block">
	<!-- Form Validation Example Title -->
	<div class="block-title">
		<h2><strong>Event Information</strong></h2>
	</div>
	<!-- END Form Validation Example Title -->
	<!-- Form Validation Example Content -->
	<form class="form-horizontal" method="post" action="" id="eventform-validation" novalidate="novalidate">
		<div class="row">
			<div class="col-md-12">
			<div class="form-group">
				<div class="col-md-12">
					<div class="input-group">
					<span class="input-group-addon"><i class="gi gi-cargo"></i></span>
						<input type="text" placeholder="Please enter event name" class="form-control input-lg" name="val_name" id="val_name" value="<?php if(count($settingFor)>0){ echo $settingFor->name;}?>">
					</div>
				</div>
			</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
						<span class="input-group-addon"><i class="gi gi-globe"></i></span>
							<input type="text" placeholder="Please enter location" class="form-control input-lg" name="val_location" id="val_location" value="<?php if(count($settingFor)>0){ echo $settingFor->location;}?>">
							
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-left:0px;margin-right:0px">
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							<input type="text" placeholder="Passouts from" class="form-control input-lg" name="val_pass" id="val_pass" value="<?php if(count($settingFor)>0){ echo $settingFor->evtYearFrom;}?>">
							
						</div>
					</div>
				</div>		
			</div>	
			
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							<input type="text" placeholder="ID Prefix" class="form-control input-lg" name="val_idpref" id="val_idpref" value="<?php if(count($settingFor)>0){ echo $settingFor->evtDM;}?>">							
						</div>
					</div>
				</div>
			</div>
			</div>
			<div class="row" style="margin-left:0px;margin-right:0px">
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
						<span class="input-group-addon"><i class="gi gi-stats"></i></span>
							<input type="text" placeholder="Cut-Off %" class="form-control input-lg" name="val_cutoff" id="val_cutoff" value="<?php if(count($settingFor)>0){ echo $settingFor->evtCutOff;}?>">
							
						</div>
					</div>
				</div>			
			</div>			
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
						<span class="input-group-addon"><i class="gi gi-cargo"></i></span>
							<input type="text" placeholder="Enter prior attended days" class="form-control input-lg" name="val_evtPriorAtnDays" id="val_evtPriorAtnDays" value="<?php if(count($settingFor)>0){ echo $settingFor->evtPriorAtnDays;}?>">							
						</div>
					</div>
				</div>
			</div>
			</div>
			<div class="col-md-12">		
				<div class="form-group">
					<div class="col-lg-12 col-md-7">
						<div class="col-lg-5 col-md-5">
							<label class="col-lg-6 col-md-5 control-label">Active </label>
							<label for="val_active" class="switch switch-primary">
								<input type="checkbox" value="<?php if(count($settingFor)>0){ echo $settingFor->isActive;}?>" name="val_active" id="val_active" onChange="valChanged()" <?php if(count($settingFor)>0){ if($settingFor->isActive==1){echo "checked";}}?>>
								<span title="" data-toggle="tooltip" data-original-title="Mark as active"></span>
							</label>
						</div>
						<div class="col-lg-7 col-md-7">
							<label class="col-lg-7 col-md-7 control-label">Notifications </label>
							<label for="val_email" class="switch switch-primary">
								<input type="checkbox" value="<?php if(count($settingFor)>0){ echo $settingFor->isEmail;}?>" name="val_email" id="val_email" onChange="valChanged1()" <?php if(count($settingFor)>0){ if($settingFor->isEmail==1){echo "checked";}}?>>
								<span title="" data-toggle="tooltip" data-original-title="Mark as active"></span>
							</label>
						</div>
					</div>
					<div class="col-lg-12 col-md-5">
						<div class="col-lg-8 col-md-12">
							<label class="col-lg-8 col-md-7 control-label">Close Registrations </label>
							<label for="val_isRegComplete" class="switch switch-primary">
								<input type="checkbox" value="<?php if(count($settingFor)>0){ echo $settingFor->isRegComplete;}?>" name="val_isRegComplete" id="val_isRegComplete" onChange="valChanged2()" <?php if(count($settingFor)>0){ if($settingFor->isRegComplete==1){echo "checked";}}?>>
								<span title="" data-toggle="tooltip" data-original-title="Mark as active"></span>
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group form-actions">
			<div class="col-md-8 col-md-offset-4">
				<input type="hidden" value="event" name="val_form" id="val_form">
				<input type="hidden" value="<?php if(count($settingFor)>0){ echo $settingFor->id;}?>" name="val_id" id="val_id">
				<button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-arrow-right"></i> Submit</button>
				<button class="btn btn-sm btn-warning" type="reset"><i class="fa fa-repeat"></i> Reset</button>
			</div>
		</div>
	</form>
	<!-- END Form Validation Example Content -->
</div>
<script>
function valChanged(){
	if(document.getElementById("val_active").value=="" || document.getElementById("val_active").value=="0"){
		document.getElementById("val_active").value="1";
	}
	else{
		document.getElementById("val_active").value="0";
	}
}
function valChanged1(){
	if(document.getElementById("val_email").value=="" || document.getElementById("val_email").value=="0"){
		document.getElementById("val_email").value="1";
	}
	else{
		document.getElementById("val_email").value="0";
	}
}
function valChanged2(){
	if(document.getElementById("val_isRegComplete").value=="" || document.getElementById("val_isRegComplete").value=="0"){
		document.getElementById("val_isRegComplete").value="1";
	}
	else{
		document.getElementById("val_isRegComplete").value="0";
	}
}
</script>