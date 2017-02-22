<div id="statusform" class="block">
	<!-- Form Validation Example Title -->
	<div class="block-title">
		<h2><strong>Status Information</strong></h2>
	</div>
	<!-- END Form Validation Example Title -->
	<!-- Form Validation Example Content -->
	<form class="form-horizontal" method="post" action="" id="statusform-validation" novalidate="novalidate">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<input type="hidden" value="<?php echo $settingFor->id ?>" name="val_id" id="val_id">
							<span class="input-group-addon"><i class="fa fa-shield"></i></span>
							<input type="text" placeholder="Please enter the name" class="form-control input-lg" name="val_displayname" id="val_displayname" value="<?php if(count($settingFor)>0){ echo $settingFor->displayName;}?>">
							
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-shield"></i></span>
							<input type="text" placeholder="Please enter Round Name" class="form-control input-lg" name="val_roundname" id="val_roundname" value="<?php if(count($settingFor)>0){ echo $settingFor->roundName;}?>">							
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-shield"></i></span>
							<input type="text" placeholder="Please enter Round Ordinal" class="form-control input-lg" name="val_ordinal" id="val_ordinal" value="<?php if(count($settingFor)>0){ echo $settingFor->ordinal;}?>">							
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span>
							<select class="form-control input-lg" placeholder="Select an Email Template" id ="val_emailTemp" name="val_emailTemp" style="padding-top:12px;opacity:0.8">
								<option value="" disabled selected style='display:none;' >Select an Email Template</option>
								<?php foreach($emailTemps as $row){								
									/*** create the options ***/
									echo '<option value="'.$row->id.'"';
									if(count($settingFor)>0 && $row->id == $settingFor->emailTemplate){
										echo ' selected';
									}
									echo '>'.$row->id.'. '. $row->name . '</option>'."\n";
								}
								?>
							</select>
						</div>
					</div>
				</div>			
			</div>
			<?php 
			if(count($settingFor)>0)
			{
			?>
			<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-caret-square-o-down "></i></span>
							<select class="form-control input-lg" placeholder="Select a State" id ="val_state" name="val_state" style="padding-top:12px;opacity:0.8">
								<option value="" disabled selected style='display:none;' >Select a State</option>
								<?php
								foreach($states as $row){ 
								/*** create the options ***/
								
								echo '<option value="'.$row->id.'"';
								if(count($settingFor)>0 && $row->id == $settingFor->state){
									echo ' selected';
								}
								echo '>'. $row->name . '</option>'."\n";
								}?>
							</select>
						</div>
					</div>
				</div>			
			</div>
			<?php
			}
			?>
			<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-envelope"></i></span>
							<input type="text" placeholder="Please enter Email Label" class="form-control input-lg" name="val_emaillabel" id="val_emaillabel" value="<?php if(count($settingFor)>0){ echo $settingFor->emailLabel;}?>">							
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-left:0px;margin-right:0px">
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="gi gi-envelope"></i></span>
								<input type="text" placeholder="Enter Chart Label" class="form-control input-lg" name="val_chartlabel" id="val_chartlabel" value="<?php if(count($settingFor)>0){ echo $settingFor->chartLabel;}?>">							
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="gi gi-envelope"></i></span>
								<input type="text" placeholder="Enter Legend" class="form-control input-lg" name="val_legendlabel" id="val_legendlabel" value="<?php if(count($settingFor)>0){ echo $settingFor->legendLabel;}?>">							
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-envelope"></i></span>
							<input type="text" placeholder="Enter the Color" class="form-control input-lg" name="val_colorvalue" id="val_colorvalue" value="<?php if(count($settingFor)>0){ echo $settingFor->colorValue;}?>">							
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group form-actions">
			<div class="col-md-8 col-md-offset-4">
				<input type="hidden" value="status" name="val_form" id="val_form">
				<input type="hidden" value="<?php if(count($settingFor)>0){ echo $settingFor->id;}?>" name="val_id" id="val_id">
				<button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-arrow-right"></i> Submit</button>
				<button class="btn btn-sm btn-warning" type="reset"><i class="fa fa-repeat"></i> Reset</button>
			</div>
		</div>
		</form>
	<!-- END Form Validation Example Content -->
</div>