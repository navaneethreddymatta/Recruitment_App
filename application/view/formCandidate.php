<div id="candidateform" class="block">
	<!-- Form Validation Example Title -->
	<div class="block-title">
		<h2><strong>Candidate Information - <?php if(count($settingFor)>0){ echo $settingFor->regId;}?></strong></h2>
	</div>
	<!-- END Form Validation Example Title -->
	<!-- Form Validation Example Content -->
	<form class="form-horizontal" method="post" action="" id="candidateform-validation" novalidate="novalidate">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-user"></i></span>
							<input type="text" placeholder="Enter first name" class="form-control input-lg" name="val_fname" id="val_fname" value="<?php if(count($settingFor)>0){ echo $settingFor->fname;}?>">	
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-user"></i></span>
							<input type="text" placeholder="Enter last name" class="form-control input-lg" name="val_lname" id="val_lname" value="<?php if(count($settingFor)>0){ echo $settingFor->lname;}?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-envelope"></i></span>
							<input type="text" placeholder="Enter Email id" class="form-control input-lg" name="val_email" id="val_email" value="<?php if(count($settingFor)>0){ echo $settingFor->email;}?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-iphone"></i></span>
							<input type="text" placeholder="Enter mobile number" class="form-control input-lg" name="val_mobile" id="val_mobile" value="<?php if(count($settingFor)>0){ echo $settingFor->mobile;}?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-calendar"></i></span>
							<input type="text" placeholder="Enter DOB" class="form-control input-lg" name="val_dob" id="val_dob" value="<?php if(count($settingFor)>0){ echo $settingFor->dob;}?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-parents"></i></span>
							<select class="form-control input-lg" placeholder="Select your gender" id ="val_gender" name="val_gender" style="padding-top:12px;opacity:0.8"><option value="" disabled selected style='display:none;' >Select your Gender</option>
							<?php foreach($genders as $row){ 
								/*** create the options ***/
								echo '<option value="'.$row->id.'"';
								if(count($settingFor)>0 && $row->id==$settingFor->gender)
								{
									echo ' selected';
								}
								echo '>'. $row->name . '</option>'."\n";
							}?>
							</select>
						</div>
					</div>
				</div>
			</div>			
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-cargo"></i></span>								
							<input type="text"  placeholder="Name of College" class="form-control input-lg" id="val_college" name="val_college" value="<?php if(count($settingFor)>0){ echo $settingFor->college;} ?>" />
						</div>
					</div>
				</div>
			</div>				
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group"> 
							<span class="input-group-addon"><i class="gi gi-book_open"></i></span>
							<select class="form-control input-lg" id="val_qualification" name="val_qualification" style="padding-top:12px;opacity:0.8"><option value="" disabled selected style='display:none;' >Select your Qualification</option>
							<?php foreach($qualifications as $row){ 
							/*** create the options ***/
							echo '<option value="'.$row->id.'"';
								if(count($settingFor)>0 && $row->id==$settingFor->qualification)
								{
									echo ' selected';
								}
								echo '>'. $row->name . '</option>'."\n";
							}?>
							</select>
						</div>
					</div>
				</div>
			</div>				
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group"> 
							<span class="input-group-addon"><i class="si si-myspace"></i></span>
							<select class="form-control input-lg" placeholder="Select your Stream" size="1" id="val_stream" name="val_stream" style="padding-top:12px;opacity:0.8"><option value=""  disabled selected style='display:none;' >Select your Stream</option>
							<?php foreach($streams as $row){ 
							/*** create the options ***/
							echo '<option value="'.$row->id.'"';
								if(count($settingFor)>0 && $row->id==$settingFor->stream)
								{
									echo ' selected';
								}
								echo '>'. $row->name . '</option>'."\n";
							}?>
							</select>
						</div>
					</div>
				</div>
			</div>				
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-podium"></i></span>
							<input type="text" placeholder="10th Class %" class="form-control input-lg" name="val_ssc" id="val_ssc" value="<?php if(count($settingFor)>0){ echo $settingFor->ssc;} ?>"/>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group"> 
							<span class="input-group-addon"><i class="gi gi-podium"></i></span>
							<input type="text" placeholder="Intermediate %" class="form-control input-lg" name="val_inter" id="val_inter" value="<?php if(count($settingFor)>0){ echo $settingFor->inter;} ?>"/>
					   </div>
				   </div>
			   </div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group"> 
							<span class="input-group-addon"><i class="gi gi-podium"></i></span>
							<input type="text" placeholder="Degree %" class="form-control input-lg" name="val_degree" id="val_degree" value="<?php if(count($settingFor)>0){ echo $settingFor->degree;} ?>"/>
						</div>
					</div>
				</div>
			</div>				
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group"> 
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							<input type="text" placeholder="Year Passed" class="form-control input-lg" name="val_yearPassed" id="val_yearPassed" value="<?php if(count($settingFor)>0){ echo $settingFor->yearPassed;}?>"/>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
							<input type="text"  placeholder="Current Company" class="form-control input-lg" name="val_currentCompany" id="val_currentCompany" value="<?php if(count($settingFor)>0){ echo $settingFor->currentCompany;} ?>" />
						</div>	
					</div>
				</div>											
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group"> 
							<span class="input-group-addon"><i class="gi gi-tie"></i></span>
							<input type="text" placeholder="Years of Experience" class="form-control input-lg" name="val_yearsOfExp" id="val_yearsOfExp" value="<?php if(count($settingFor)>0){ echo $settingFor->yearsOfExperience;}?>"/>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group"> 
							<span class="input-group-addon"><i class="fa fa-info"></i></span>
							<input type="text" id="source" name="source" placeholder="How did you know about this Drive?" class="form-control input-lg" name="val_source" id="val_source" value="<?php if(count($settingFor)>0){ echo $settingFor->source;}?>" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group form-actions">
			<div class="col-md-8 col-md-offset-4">
				<input type="hidden" value="candidateform" name="val_form" id="val_form">
				<input type="hidden" value="<?php if(count($settingFor)>0){ echo $settingFor->id;}?>" name="val_id" id="val_id">
				<button id="sbmt" class="btn btn-sm btn-primary" type="submit" ><i class="fa fa-arrow-right"></i> Submit</button>
				<button class="btn btn-sm btn-warning" type="reset"><i class="fa fa-repeat"></i> Reset</button>
			</div>
		</div>
		</form>
	<!-- END Form Validation Example Content -->
</div>

<script type="text/javascript">	
$(function(){ FormsWizard.init(); });
$(function() {
	$("#val_dob").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
});
</script>
<script src="assets/js/pages/formsValidation.js"></script>
<script>$(function(){ FormsValidation.init(); });</script>
