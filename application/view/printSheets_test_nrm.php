<?php include 'application/view/fx_commonhead.php'; ?>    
<script src="assets/js/jquery.min.js"></script>        
<?php include 'application/view/fx_sidebarAlt.php'; ?>
<?php include 'application/view/fx_sidebar.php'; ?>
           <div id="main-container">
               <?php include 'application/view/fx_header.php'; ?> 
                <!-- Page content -->
                <div id="page-content" style="min-height: 378px;">
                    <!-- Fixed Top Header + Footer Header -->
                    <?php include 'application/view/contentHeader.php'; ?>                   
                    <!-- END Fixed Top Header + Footer Header -->
					<div class="block full" style="padding-bottom:40px;">
                        <div class="block-title">
                            <h2><strong>All</strong> Candidates</h2>
                        </div>
                        <div class="table-responsive">		
									
								<form action="" method="post">							
									<table id="example-datatable5" class="table table-vcenter table-hover table-condensed table-bordered">
									<thead>
										<tr>
											<th><input id="selctAll" type="checkbox" name="selectAll" ></th>
											<th>Reg ID</th>
											<th>Name</th>
											<th>Email</th>
											<th>Phone</th>		
										</tr>
									</thead>
									<tbody>										
											<?php $ind=0;foreach($allSheets as $sheet){?>
												<tr>
													<td style="padding-left:18px"><input type="checkbox" name="prntSheet[]" onclick="switchBtn()" value=<?php echo $ind; $ind++;?>></td>
													<td class="text-left" style="padding-left:20px"><?php echo $sheet->regId;?></td>
													<td class="text-left" style="padding-left:20px"><?php echo $sheet->fullname?></td>
													<td class="text-left" style="padding-left:20px" ><?php echo $sheet->email;?></td>
													<td class="text-left" style="padding-left:20px"><?php echo $sheet->mobile;?></td>
												</tr>
											<?php }	?>
																			
									</tbody>
									</table>
									<div style="float:right;margin-top:4px;">
										<div style="float:left;margin-right:10px;" ><input id="printAllSheets" type="submit" name="printAll" value="Print All" class="btn btn-sm btn-primary pull-right"></div>
										<div style="float:left"><input id="printSelSheets" type="submit" name="printIt" value="Print" class="btn btn-sm btn-primary pull-right disabled"></div>
										
									</div>
								</form>
							
							
                        </div>
                  </div>
                    <?php						
								if(isset($_POST['printIt']) || isset($_POST['printAll']))
								{
									if(isset($_POST['printIt']))
									{
										$pSheet=$_POST['prntSheet'];		
										$sTextArray=array();
										foreach($pSheet as $pSh)
										{
											array_push($sTextArray,$pSh);
										}
									}
							?>
							<script>
								var element = document.getElementById("totalPrintPage");
								if(element != null){element.parentNode.removeChild(element);}
							</script>
							<div id="totalPrintPage" style="display:none">
						<?php
								$tempNum=0;								
								foreach($allSheets as $sheet)
								{
									if((isset($_POST['printIt']) && in_array($tempNum, $sTextArray)) || isset($_POST['printAll']))
									{	
						?>
								<div style="width:590px;height:920px;margin:10px auto;page-break-after:always;">
									
									<div style="height:45px;">
										<div class="regNum"><?php echo $sheet->regId?></div>
										<div class="regSet">
											<div style="float:left;margin-left:55px;padding-right:4px">SET -</div>
											<div><?php echo $sheet->paper?></div>
										</div>
										<!--div style="float:right;"><img src="assets/img/index.png" width="146px" height="35px"></div-->
										<div style="float:right;"><img src="assets/img/flexeye-transperent2.png" width="148px" height="40px"></div>
									</div>
									<div style="text-align:center;font-weight:bold;font-size:12pt;font-family:Arial;width:100%">FLEXEYE RECRUITMENT ANSWER SHEET</div>
									<div style="height:238px;border:1px solid black">
										<div style="padding-top:7px">
											<div class="detailsLabel" style="width:55px;">NAME:</div>
											<div class="detailsValue" style="width:205px;margin-right:15px;"><?php echo $sheet->fullname?></div>
											<div class="detailsLabel" style="width:35px;margin-left:0px;">10TH</div>
											<div class="detailsValue" style="width:35px;"><?php echo $sheet->ssc?>%</div>
											<div class="detailsLabel" style="width:35px;margin-left:3px;;">12TH</div>
											<div class="detailsValue" style="width:35px;"><?php echo $sheet->inter?>%</div>
											<div class="detailsLabel" style="width:90px;margin-left:3px;">B.TECH / MCA</div>
											<div class="detailsValue" style="width:35px;"><?php echo $sheet->degree?>%</div>
										</div></br>
										<div style="padding-top:7px">
											<div class="detailsLabel" style="width:125px;">CONTACT NUMBER:</div>
											<div class="detailsValue" style="width:135px;margin-right:15px;"><?php echo $sheet->mobile?></div>
											<div class="detailsLabel" style="width:50px;margin-left:0px;">EMAIL:</div>
											<div class="detailsValue" style="width:231px;"><?php echo $sheet->email?></div>
										</div></br>
										<div style="padding-top:7px">
											<div class="detailsLabel" style="width:67px;">COLLEGE:</div>
											<div id="regCollege" class="detailsValue" style="width:304px;"><?php echo $sheet->college?></div>
											<div class="detailsLabel" style="width:60px;margin-left:0px;">STREAM:</div>
											<div id="regStream" class="detailsValue" style="width:120px;">
												<?php echo $sheet->stream;?>
											</div>						
										</div></br>
										<div style="padding-top:7px;">
											<div class="detailsLabel" style="width:75px;">PASSED IN:</div>
											<div id="regPassout" class="detailsValue" style="width:35px;"><?php echo $sheet->yearPassed?></div>		
											<div class="detailsLabel" style="width:135px;">CURRENT COMPANY:</div>
											<div id="regCompany" class="detailsValue" style="width:113px;height:18px"><?php echo $sheet->currentCompany?></div>	
											<div class="detailsLabel" style="width:155px;margin-left:0px;">YEARS OF EXPERIENCE:</div><div id="regExperience" class="detailsValue" style="width:25px;height:18px"><?php echo $sheet->yearsOfExperience?></div>					
										</div></br>
										<div style="padding-top:7px;padding-bottom:7px">						
											<div class="detailsLabel" style="width:215px;">How did you come across the Drive:</div><div id="regInfo" class="detailsValue" style="width:341px;"><?php echo $sheet->source?></div>	
										</div></br>
										
										<div style="text-align:center;font-size:9pt;font-family:Arial;font-weight:bold;border-top:1px solid black;border-bottom:1px solid black;padding:2px 0px">For INTERNAL USE ONLY</div>			
										<div class="sectionBlocks" style="width:80px;height:79px;" >
											<div>Section - A</div>
											<div class="section">S1:</div>
											<div class="section">S2:</div>
											<div class="section">Initials:</div>
										</div>
										<div class="sectionBlocks" style="width:80px;height:79px;">
											<div>Section - B</div>
											<div class="section">S3:</div>
											<div class="section">S4:</div>
											<div class="section"></div>
										</div>
										<div class="sectionBlocks" style="width:138px;height:79px;">
											<div>Section - C</div>
											<div>
												<div style="width:50%;float:left">
													<div class="section" style="border-right:1px solid black">S5:</div>
													<div class="section" style="border-right:1px solid black">S6:</div>
													<div class="section" style="border-right:1px solid black"></div>
												</div>
												<div style="width:50%;float:left">
													<div class="section">S7:</div>
													<div class="section">S8:</div>
													<div class="section"></div>
												</div>
											</div>
										</div>
										<div class="sectionBlocks" style="width:38px;height:79px;">
											<div>VR</div>
											<div class="section"></div>
											<div class="section"></div>
											<div class="section"></div>
										</div>
										<div class="sectionBlocks" style="width:140px;height:79px;">
											<div>TR</div>
											<div>
												<div style="width:50%;float:left">
													<div class="section" style="border-right:1px solid black">T1:</div>
													<div class="section" style="border-right:1px solid black">T2:</div>
													<div class="section" style="border-right:1px solid black"></div>
												</div>
												<div style="width:50%;float:left">
													<div class="section">T3:</div>
													<div class="section">CR:</div>
													<div class="section"></div>
												</div>
											</div>
										</div>
										<div class="sectionBlocks" style="width:38px;height:79px;">
											<div>OS</div>
											<div class="section"></div>
											<div class="section"></div>
											<div class="section"></div>
										</div>
										<div class="sectionBlocks" style="width:38px;height:79px;">
											<div>MD</div>
											<div class="section"></div>
											<div class="section"></div>
											<div class="section"></div>
										</div>
										<div class="sectionBlocks" style="border-right:none;width:36px;height:79px;">
											<div>HR</div>
											<div class="section"></div>
											<div class="section"></div>
											<div class="section"></div>
										</div>
									
									</div>
									<div style="text-align:center;margin:10px 0px;font-family:Arial;"><span style="font-weight:bold;font-size:12pt;">SECTION A: Aptitude </span><span style="font-size:10pt;">(Please write your answers below)</span></div>
									<div style="height:565px">
										<div style="height:545px;width:150px;border:1px solid black;float:left">
											<div class="partLabel">PART - 1</div>
											<div>
												<?php					
													$part1Txt="";
													$i=1;
													for($i=1;$i<=20;$i++)
													{	
														$part1Txt=$part1Txt.'<div style="border-top:1px solid black;"><div style="width:40px;border-right:1px solid black;line-height:25px;height:25px;font-family:Arial;font-size:11pt;text-align:center">'.$i.'</div><div style="width:350px"></div></div>';
													}
													echo $part1Txt;
												?>
											</div>
										</div>
										<div style="height:545px;width:420px;float:right">
											<div style="height:529px;border:1px solid black">
												<div class="partLabel">PART - 2</div>
												<div>
													<?php
														$part2Txt="";							
														for($j=1;$j<=8;$j++)
														{	
															$part2Txt=$part2Txt.'<div style="border-top:1px solid black;"><div class="part2Index">'.$j.'</div><div style="width:350px"></div></div>';
														}
														echo $part2Txt;
													?>
												</div>
											</div>
											<div style="text-align:center;font-weight:bold;font-size:10pt;font-family:Arial;padding-top:5px;">Note: Use the blank pages for answering Section B, C and D.</div>
										</div>
									</div>
									<div style="border-top:1px solid black;font-size:10pt;font-family:Arial;padding-top:5px"><span style="float:left">CONFIDENTIAL, &copy Flexeye IT Services Recruitment Examination</span><span  style="float:right">1 | Page</span></div>
								</div>
								<?php
									}					
									$tempNum++;
								}		
								?>
								</div>
								</div>
								<script>
									setTimeout(function(){
										var printContents = document.getElementById("totalPrintPage").innerHTML;
										var originalContents = document.body.innerHTML;
										document.body.innerHTML = printContents;
										//alert(printContents);
										window.print();
										document.body.innerHTML = originalContents;
										$('input[name="selectAll"]').bind('click', function(){
											var status = $(this).is(':checked');
											var sheetRecs=document.getElementsByName("prntSheet[]");	
											$.each(sheetRecs,function(i,v){
												v.checked=status;	
											});
										});	
									},2000);
								</script>
						<?php						
							}							
						?>	
						
								
                  
                <!-- END Footer -->
            </div>
			 <?php include 'application/view/fx_footer.php'; ?>
            <!-- END Main Container -->
        </div>		
<script>
var allSheetList=<?php echo count($allSheets)?>;
if(allSheetList == 0)
{
	$("#printAllSheets").addClass("disabled");
}
	$(function() {
		$.get('index.php?op=activities', function(data) {
		  $('#activity').html(data);
		});
	});
	
	$(function() {
		$.get('index.php?op=panels', function(data) {
		  $('#panels').html(data);
		});

	});
	$(function() {

  setInterval(function() {
    $.get('index.php?op=activities', function(data) {
      $('#activity').html(data);
    });
  }, 5 * 1000);

});
$(function() {

  setInterval(function() {
    $.get('index.php?op=panels', function(data) {
      $('#panels').html(data);
    });
  }, 5 * 1000);

});

/*$("#ex1").slider();
$("#ex1").on("slide", function(slideEvt) {
	$("#ex6SliderVal").text(slideEvt.value);
})*/


function switchBtn()
{
	if(jQuery('#example-datatable5 input[type=checkbox]:checked').length > 0) 
	{		
		$( "#printSelSheets").removeClass( "disabled" );
	}
	else
	{
		$( "#printSelSheets").addClass( "disabled" );
	}
}
$('#selctAll').click(function(){
		var status = $(this).is(':checked');
		var sheetRecs=document.getElementsByName("prntSheet[]");	
		$.each(sheetRecs,function(i,v){
			v.checked=status;	
		});
		if(status == true)
		{
			$( "#printSelSheets" ).removeClass( "disabled" );
		}
		else
		{
			$( "#printSelSheets" ).addClass( "disabled" );
		}
	});	

</script>
	<script src="assets/js/vendor/bootstrap.min.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/app.js"></script>
	<?php if(count($scontacts)>0){ echo '<script>document.getElementById("default1").style.display="none";
					document.getElementById("default2").style.display="none"; document.getElementById("searchResult").style.display="block";</script>';}?>
	<script src="assets/js/appInitializer.js" type="text/javascript"></script>
	<script src="assets/js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
		<script>function getContact(id,status){location.href = 'index.php?op=showDetails&id='+id+'&status='+status;}</script>
	<script src="assets/js/stats.js" type="text/javascript"></script>
		<script>function getContact(id,status){location.href = 'index.php?op=showDetails&id='+id+'&status='+status;}</script>
		<!--script src="assets/js/pages/formsValidation.js"></script>
        <script>$(function(){ FormsValidation.init(); });</script!-->
	</body>
</html>