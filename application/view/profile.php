<?php include 'application/view/fx_commonhead.php'; ?>            
<?php include 'application/view/fx_sidebarAlt.php'; ?>
<?php include 'application/view/fx_sidebar.php'; ?>

	<!-- Main Container -->
	<div id="main-container">
		
		<?php include 'application/view/fx_header.php'; ?> 
		<!-- END Header -->

		<!-- Page content -->
		
	   <div id="page-content" style="min-height: 378px;">
			<!-- Fixed Top Header + Footer Header -->
			 <?php include 'application/view/contentHeader.php'; ?>                   
			<div class="block full">
				<div class="block-title">
					<h2>Comments <strong>Feed</strong></h2>
				</div>            
				<div id="pcomments" class="timeline block-content-full" style="height:370px;overflow:auto">
							
						 
				</div>    
				<!-- END Twitter Content -->
			</div>
		</div>

		<?php include 'application/view/fx_footer.php'; ?>
	</div>

	<!-- END Main Container -->
</div>
        
<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/vendor/bootstrap.min.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/app.js"></script>
	<?php if(count($scontacts)>0){ echo '<script>document.getElementById("default1").style.display="none";
					document.getElementById("default2").style.display="none"; document.getElementById("searchResult").style.display="block";</script>';}?>
					<script src="assets/js/appInitializer.js" type="text/javascript"></script>
	<script>
	$(function() {
		$.get('index.php?op=profile2', function(data) {
			$('#pcomments').html(data);
		});
	});
	$(function() {
		setInterval(function() {
			$.get('index.php?op=profile2', function(data) {
				$('#pcomments').html(data);
			});
		}, 5 * 1000);
	});
	</script>
	<script src="assets/js/stats.js" type="text/javascript"></script>
</body>
</html>