<div id="emailform" class="block">
	<!-- Form Validation Example Title -->
	<div class="block-title">
		<h2><strong>Email Information</strong></h2>
	</div>
	<!-- END Form Validation Example Title -->
	<!-- Form Validation Example Content -->
	<form class="form-horizontal" method="post" action="" id="emailform-validation" novalidate="novalidate">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<input type="hidden" value="<?php echo $settingFor->id ?>" name="val_id" id="val_id">
							<span class="input-group-addon"><i class="fa fa-shield"></i></span>
							<input type="text" placeholder="Please enter the name" class="form-control input-lg" name="val_name" id="val_name" value="<?php if(count($settingFor)>0){ echo $settingFor->name;}?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-comments"></i></span>
							<input type="text" placeholder="Please enter the Subject" class="form-control input-lg" name="val_subject" id="val_subject" value="<?php if(count($settingFor)>0){ echo $settingFor->subject;}?>">							
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-envelope"></i></span>
							<textarea type="text" rows="7" placeholder="Please enter the Body Content" class="form-control input-lg" name="val_body" id="val_body" value=""><?php if(count($settingFor)>0){ echo $settingFor->body;}?></textarea>
						</div>
					</div>
				</div>
			</div>			
		</div>
		<div class="form-group form-actions">
			<div class="col-md-8 col-md-offset-4">
				<input type="hidden" value="email" name="val_form" id="val_form">
				<input type="hidden" value="<?php if(count($settingFor)>0){ echo $settingFor->id;}?>" name="val_id" id="val_id">
				<button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-arrow-right"></i> Submit</button>
				<button class="btn btn-sm btn-warning" type="reset"><i class="fa fa-repeat"></i> Reset</button>
			</div>
		</div>
		</form>
	<!-- END Form Validation Example Content -->
</div>