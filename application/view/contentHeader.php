<?php 
	$count = count($rounds);
	$roundsArray=array();
	$colorsArray=array();
	for($i=0;$i<$count;$i++)
	{
		$roundsArray[$i]=$rounds[$i]->shortName2;
		$colorsArray[$i]=$rounds[$i]->backgroundColor;
	}
?>
<div class="content-header">
	<div class="header-section" style="padding:10px 10px 0px 30px">
		<div class="row">
			<div class="col-md-3 col-lg-3 col-sm-12">
			<div style="text-align:center;margin-left:-35px"><h5><strong>Total : <?php echo $xyz[0]->total ?></strong></h5>	</div>
				<div id="panelspie">
				<div class="div_RootBody" id="pie_chart_1">
					<div class="chart1"></div>
				</div>
				</div>								
			</div>			
			<div class="col-md-9 col-lg-9 col-sm-12">
				<div id="linechart2">
					<svg id="visualisation" width="1000" height="150"></svg>
				</div>
			</div>
			<!-- END Top Stats -->
		</div>
		<br/>
		<div class="row">		
			<div class="col-md-12 col-lg-12 col-sm-12 block-section text-center">
				<?php /*$colors=array("#d9edf7","#1e1e1e","#660000","#ADDFAD","#990000","#90EE90","#cc0000","#77DD77","#ff0000","#3CD070","#ff3232","#00CC99","#ff6666","#1CAC78","#ff9999","#009F6B","#ffcccc","#00703C");
				$statuses = array("RC","LD","W-D","W-Q","VR-D","VR-Q","TR1-D","TR1-Q","TR2-D","TR2-Q","CR-D","CR-Q","O-D","O-Q","MD-D","MD-Q","HR-D","HR-Q");*/
				$colors=$colorsArray;
				$statuses=$roundsArray;											
				for($i=0;$i<$count;$i++)
				{?>
				<button type="button" class="btn btn-xs btn-default" style="background-color:<?php echo $colors[$i]; ?>;border-color:<?php echo $colors[$i];?>"><b style="color:white"><?php echo $statuses[$i];?></b></button>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</div>
<style>
.div_RootBody{
   text-align:center;
	width:100%;
}
.chart1{
	display:inline-block;
	margin-top:24px;
	width:75%;
}
</style>