<!DOCTYPE html>
<style>
.detailsLabel{
	float:left;
	font-size:9pt;
	font-family:Arial;
	font-weight:bold;
	margin-left:8px;
}
.detailsValue{
	float:left;
	border-bottom:1px solid black;
	font-size:9pt;
	font-family:Arial;
	margin-right:5px;
}
.sectionBlocks{
	height:80px;
	border-right:1px solid black;
	float:left;
	text-align:center;
	font-size:10pt;
	font-family:Arial;
	font-weight:bold;
}
.section{
	line-height:20px;
	text-align:left;
	border-top:1px solid black;
	padding-left:5px;
	height:20px;
}
.regNum{
	float:left;
	font-size:20pt;
	font-family:Arial;
	font-weight:bold;
	margin-top:5px;
	width:33%;
}
.regSet{
	float:left;
	font-size:16pt;
	font-family:Arial;
	font-weight:bold;
	margin-top:8px;
	width:33%;
}
.partLabel{
	line-height:25px;
	text-align:center;
	font-family:Arial;
	font-weight:bold;
	font-size:11pt;
}
.part2Index{
	width:40px;
	border-right:1px solid black;
	line-height:62px;
	height:62px;
	font-family:Arial;
	font-size:11pt;
	text-align:center;
}

</style>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	
		<title>Flexeye</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>	
	</head>
	<body>
		<?php
		foreach($allSheets as $sheet)
		{
		?>
		<div style="width:590px;height:920px;margin:10px auto;page-break-after:always;">
			<div style="height:45px;">
				<div class="regNum"><?php echo $sheet->regId?></div>
				<div class="regSet">
					<div style="float:left;margin-left:55px;padding-right:4px">SET -</div>
					<div>B</div>
				</div>
				<div style="float:right;"><img src="assets/img/index.png" width="146px" height="35px"></div>
			</div>
			<div style="text-align:center;font-weight:bold;font-size:12pt;font-family:Arial">FLEXEYE RECRUITMENT ANSWER SHEET</div>
			<div style="height:232px;border:1px solid black">
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
					<div id="regCollege" class="detailsValue" style="width:334px;"><?php echo $sheet->college?></div>
					<div class="detailsLabel" style="width:60px;margin-left:0px;">STREAM:</div>
					<div id="regStream" class="detailsValue" style="width:90px;"><?php echo $sheet->stream?></div>						
				</div></br>
				<div style="padding-top:7px;">
					<div class="detailsLabel" style="width:75px;">PASSED IN:</div>
					<div id="regPassout" class="detailsValue" style="width:35px;"><?php echo $sheet->yearPassed?></div>		
					<div class="detailsLabel" style="width:135px;">CURRENT COMPANY:</div>
					<div id="regCompany" class="detailsValue" style="width:113px;height:13px"><?php echo $sheet->currentCompany?></div>	
					<div class="detailsLabel" style="width:155px;margin-left:0px;">YEARS OF EXPERIENCE:</div><div id="regExperience" class="detailsValue" style="width:25px;height:13px"><?php echo $sheet->yearsOfExperience?></div>					
				</div></br>
				<div style="padding-top:7px;padding-bottom:7px">						
					<div class="detailsLabel" style="width:215px;">How did you come across the Drive:</div><div id="regInfo" class="detailsValue" style="width:341px;"><?php echo $sheet->source?></div>	
				</div></br>
				
				<div style="text-align:center;font-size:9pt;font-family:Arial;font-weight:bold;border-top:1px solid black;border-bottom:1px solid black;padding:2px 0px">For INTERNAL USE ONLY</div>			
				<div class="sectionBlocks" style="width:100px">
					<div>Section - A</div>
					<div class="section">S1:</div>
					<div class="section">S2:</div>
					<div class="section">Initials:</div>
				</div>
				<div class="sectionBlocks" style="width:100px">
					<div>Section - B</div>
					<div class="section">S3:</div>
					<div class="section">S4:</div>
					<div class="section"></div>
				</div>
				<div class="sectionBlocks" style="width:160px">
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
				<div class="sectionBlocks" style="border-right:none;width:225px">
					<div>Personal Rounds</div>
					<div>
						<div style="width:50%;float:left">
							<div class="section" style="border-right:1px solid black">R1:</div>
							<div class="section" style="border-right:1px solid black">R2:</div>
							<div class="section" style="border-right:1px solid black"></div>
						</div>
						<div style="width:50%;float:left">
							<div class="section">R3:</div>
							<div class="section">R4:</div>
							<div class="section"></div>
						</div>
					</div>
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
		?>
		
	</body>
</html>