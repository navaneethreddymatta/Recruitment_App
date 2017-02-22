<div id="statusDefinition" class="block">
	<!-- Form Validation Example Title -->
	<div class="block-title">
		<h2><strong>Status Definitions</strong></h2>
	</div>
	<!-- END Form Validation Example Title -->
	<!-- Form Validation Example Content -->
	
	<form class="form-horizontal" method="post" action="" id="statusform-validation" novalidate="novalidate">
		<div class="col-md-12">
			<div class="form-group">
				<table id="example-datatable2" class="table table-vcenter table-hover table-condensed table-bordered">
					<thead>
						<tr>
							<th>Round</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i=1;
						foreach($statusDefs as $statusDef){
						?>
							<tr>
								<td><?php echo $statusDef->roundName ?></td>
								<td><input type='checkbox' id='val_statusIncluded<?php echo $i;?>' name='val_statusIncluded[]' value="<?php echo $statusDef->round;?>" onChange="valChanged(this.id)" <?php if($statusDef->cnt>0){ echo 'checked';}?>></td>							
							</tr>
						<?php
							$i=$i+1;
						}?>			
					</tbody>
				</table>
			</div>			
		</div>
		<div class="form-group form-actions">
			<div class="col-md-8 col-md-offset-4">
				<input type="hidden" value="statusDefinition" name="val_form" id="val_form">				
				<button class="btn btn-sm btn-primary" type="submit" name="stInclude"><i class="fa fa-arrow-right"></i> Submit</button>
				<button class="btn btn-sm btn-warning" type="reset"><i class="fa fa-repeat"></i> Reset</button>
			</div>
		</div>
	</form>
	<!-- END Form Validation Example Content -->
</div>
