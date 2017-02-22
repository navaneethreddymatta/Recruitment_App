<?php include 'application/view/fx_commonhead.php'; ?>            
<?php include 'application/view/fx_sidebarAlt.php'; ?>
<?php include 'application/view/fx_sidebar.php'; 
$colors=array("#d9edf7","#1e1e1e","#660000","#ADDFAD","#990000","#90EE90","#cc0000","#77DD77","#ff0000","#3CD070","#ff3232","#00CC99","#ff6666","#1CAC78","#ff9999","#009F6B","#ffcccc","#00703C");
?>
<!-- Main Container -->
<div id="main-container">
   <?php include 'application/view/fx_header.php'; ?> 
	<div id="page-content" style="min-height: 378px;">
		<!-- Fixed Top Header + Footer Header -->
		<?php include 'application/view/contentHeader.php'; ?>  
		<!--ul class="breadcrumb breadcrumb-top">
			<li>Page Layouts</li>
			<li><a href="">Fixed Top Header+ Footer</a></li>
		</ul-->
		<div class="block full">
			<div class="block-title">
				<h2><strong>All</strong> Candidates</h2>
			</div>	
			<div class="table-responsive">
				<table id="example-datatable" class="table table-vcenter table-hover table-condensed table-bordered">
					<thead>
						<tr>
							<th>Reg ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>						
							<th>Status</th>
							<th>Stream</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($contacts as $contact){
						$statusName = $contact->statusName;
						$status = $contact->status;
						$bcolor = $contact->bgColor;
						$fcolor="#fff";
						if($bcolor == null)
						{
							$bcolor="#fff";
							$fcolor="#000";
						}
					?>	
						<tr  style="cursor:pointer;color:<?php echo $fcolor;?>;background-color:<?php echo $bcolor;?>;" onclick= getContact('<?php echo $contact->regId;?>'); >	
							<td class="text-left" style="padding-left:20px"><?php echo $contact->regId;?></td>
							<td class="text-left" style="padding-left:20px" ><?php echo $contact->fname.' '.$contact->lname;?></td>
							<td class="text-left" style="padding-left:20px" ><?php echo $contact->email;?></td>
							<td class="text-left" style="padding-left:20px"><?php echo $contact->mobile;?></td>
							<!--<td class="text-center"><?php echo $contact->college;?></td>
							<td class="text-center"><?php if($contact->qualName == "MCA"){$var = $contact->qualName;}else{$var = $contact->qualName.' '.'-'.' '.$contact->streamName;}echo $var;?></td>
							<td class="text-center"><?php echo $contact->yearPassed.' '.'/'.' '.$contact->degree;?></td> -->
							<td class="text-left" style="padding-left:20px"><?php echo $contact->statusName;?></td>
							<td class="text-left" style="padding-left:20px"><?php echo $contact->streamName;?></td>
							</tr>
						<?php }	?>
					</tbody>
				</table>
			</div>
		</div>		
	</div>
	<?php include 'application/view/fx_footer.php'; ?>
   </div>
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
<script>function getContact(id){location.href = 'index.php?op=showDetails&id='+id;}</script>
<script src="assets/js/stats.js" type="text/javascript"></script>
</body>
</html>