<table id='example-datatable3'  class='table table-vcenter table-hover table-condensed table-bordered'>
    <thead>
		<tr>
			<th class='text-left' style='padding-left:5px;width:10%'>Name</th>			
			<th class='text-left' >Progress</th>
			<th class='text-center' style='padding-left:5px;max-width:60px;width:100px;'>Rejs</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$err = 0;
		for($i=0;$i<count($hDetails);$i++){
			$v = $hDetails[$i];	
			if($v->val != "person"){
				$INP = $v->total-($v->WQ+$v->WD);
				$WQO = $v->WQ - ($v->R1Q + $v->R1D);
				$R1QO = $v->R1Q - ($v->R2Q + $v->R2D);
				$R2QO = $v->R2Q - ($v->R3Q + $v->R3D);
				$R3QO = $v->R3Q - ($v->R4Q + $v->R4D);
				$R4QO = $v->R4Q - ($v->ONQ + $v->OND);
				$ONQO = $v->ONQ - ($v->HQ + $v->HD);
				$HRQO = $v->HQ - ($v->FQ + $v->FD);
				$WD = $v->WD;
				$R1D = $v->R1D;
				$R2D = $v->R2D;
				$R3D = $v->R3D;
				$R4D = $v->R4D;
				$OND = $v->OND;
				$HRD = $v->HD;
				$R4Q = $v->R4Q;
				$FQ = $v->FQ;
				$FD = $v->FD;
				$rtotal = $WD + $R1D + $R2D + $R3D + $R4D + $OND + $HRD + $FD;
				$total = $v->total;
				$name =$v->name;
			}
			else{
				$INP = 0;
				$WQO = $v->WQ;
				$R1QO = $v->R1Q ;
				$R2QO = $v->R2Q ;
				$R3QO = $v->R3Q ;
				$R4QO = $v->R4Q;
				$ONQO = $v->ONQ;
				$HRQO = $v->HQ ;
				$WD = $v->WD;
				$R1D = $v->R1D;
				$R2D = $v->R2D;
				$R3D = $v->R3D;
				$R4D = $v->R4D;
				$OND = $v->OND;
				$HRD = $v->HD;
				$R4Q = $v->R4Q;
				$FQ = $v->FQ;
				$FD = $v->FD;
				$rtotal = $WD + $R1D + $R2D + $R3D + $R4D + $OND + $HRD + $FD;
				$total = $rtotal+$WQO + $R1QO + $R2QO + $R3QO + $R4QO + $ONQO+ $HRQO + $FQ;
				$name =$v->oname;
			}
		?>
		<tr id= 'tempTableRow<?php echo $i ?>' style="cursor:pointer"; onclick='getContactBySelection(<?php echo '"'.$v->search.'"'.','.'"'.$v->name.'"'?>)'>
			<td id='tempTableIdCol<?php echo $i?>'>
				<?php echo $name ?>
			</td>
			<td id='tempTableIdCol<?php echo $i?>'>
				<div class="text-center"style="font-size:14px;font-weight:bold">
				<?php echo $total;?>
				</div>
				<!-- DisQualified -->
				<div class="progress" >
					<div class="progress-bar progress-bar-success" style="background-color:#660000;width:<?php $WDX = ($WD/$total)*100;echo $WDX ?>%"><?php if($err == 1 ){echo "#WR ".$WD;}else{if($WD !=0){echo $WD;}}?>
						<span class="sr-only">35% Complete </span>
					</div>
					<div class="progress-bar progress-bar-success" style="background-color:#990000;width:<?php $R1DX = ($R1D/$total)*100;echo $R1DX ?>%"><?php  if($err == 1 ){echo "#R1 ".$R1D;}else{if($R1D !=0){echo $R1D;}}?>
						<span class="sr-only">35% Complete </span>
					</div>
					<div class="progress-bar progress-bar-success" style="background-color:#CC0000;width:<?php $R2DX = ($R2D/$total)*100;echo $R2DX ?>%"><?php if($err == 1){echo "#R2 ".$R2D;}else{if($R2D !=0){echo $R2D;}}?>
						<span class="sr-only">35% Complete </span>
					</div>
					<div class="progress-bar progress-bar-success" style="background-color:#FF0000;width:<?php $R3DX = ($R3D/$total)*100;echo $R3DX ?>%"><?php if($err == 1){echo "#R3 ".$R3D;}else{if($R3D !=0){echo $R3D;}}?>
						<span class="sr-only">35% Complete </span>
					</div>
					<div class="progress-bar progress-bar-success" style="background-color:#FF3232;width:<?php $R4DX = ($R4D/$total)*100;echo $R4DX ?>%"><?php if($err == 1){echo "#R4 ".$R4D;}else{if($R4D !=0){echo $R4D;}}?>
						<span class="sr-only">35% Complete </span>
					</div>
					<div class="progress-bar progress-bar-success" style="background-color:#FF6666;width:<?php $ONDX = ($OND/$total)*100;echo $ONDX ?>%"><?php if($err == 1){echo "#Onsite ".$OND;}else{if($ONDX !=0){echo $OND;}}?>
						<span class="sr-only">35% Complete </span>
					</div>
					<div class="progress-bar progress-bar-success" style="background-color:#FF9999;width:<?php $HRDX = ($HRD/$total)*100;echo $HRDX ?>%"><?php if($err == 1){echo "#HR ".$HRD;}else{if($HRD !=0){echo $HRD;}} ?>
						<span class="sr-only">35% Complete </span>
					</div>
					<div class="progress-bar progress-bar-success" style="background-color:#FFCCCC;width:<?php $FDX = ($FD/$total)*100;echo $FDX ?>%"><?php  if($err == 1){echo "#Final ".$FD;}else{if($FD !=0){echo $FD;}} ?>
						<span class="sr-only">35% Complete </span>
					</div>
					<!-- Qualified -->
					<div class="progress-bar progress-bar-success" style="background-color:#ADDFAD;color:#1e1e1e;width:<?php $WQOX = ($WQO/$total)*100;echo $WQOX  ?>%"><?php if($err == 1){ echo "#WR ".$WQO;}else{if($WQO !=0){echo $WQO;}}?>
						<span class="sr-only">35% Complete </span>
					</div>
					<div class="progress-bar progress-bar-success" style="background-color:#90EE90;color:#1e1e1e;width:<?php $R1QOX = ($R1QO/$total)*100;echo $R1QOX  ?>%"><?php if($err == 1){echo "#R1 ".$R1QO;}else{if($R1QO !=0){echo $R1QO;}}?>
						<span class="sr-only">35% Complete </span>
					</div>
					<div class="progress-bar progress-bar-success" style="background-color:#77DD77;color:#1e1e1e;width:<?php $R2QOX = ($R2QO/$total)*100;echo $R2QOX  ?>%"><?php if($err == 1){  echo "#R2 ".$R2QO;}else{if($R2QO !=0){echo $R2QO;}}?>
						<span class="sr-only">35% Complete </span>
					</div>
					<div class="progress-bar progress-bar-success" style="background-color:#3CD070;color:#1e1e1e;width:<?php $R3QOX = ($R3QO/$total)*100;echo $R3QOX  ?>%"><?php if($err == 1){ echo "#R3 ".$R3QO;}else{if($R3QO !=0){echo $R3QO;}} ?>
						<span class="sr-only">35% Complete </span>
					</div>
					<div class="progress-bar progress-bar-success" style="background-color:#00CC99;color:#1e1e1e;width:<?php $R4QX = ($R4QO/$total)*100;echo $R4QX  ?>%"><?php  if($err == 1){ echo "#R4 ".$R4QO;}else{if($R4QO !=0){echo $R4QO;}}?>
						<span class="sr-only">35% Complete </span>
					</div>
					<div class="progress-bar progress-bar-success" style="background-color:#1CAC78;color:#1e1e1e;width:<?php $ONQX = ($ONQO/$total)*100;echo $ONQX  ?>%"><?php  if($err == 1){ echo "#Onsite ".$ONQO;}else{if($ONQO !=0){echo $ONQO;}}?>
						<span class="sr-only">PINE GREEN </span>
					</div>
					<div class="progress-bar progress-bar-success" style="background-color:#009F6B;color:#1e1e1e;width:<?php $HRQX = ($HRQO/$total)*100;echo $HRQX  ?>%"><?php if($err == 1){ echo "#HR ".$HRQO;}else{if($HRQO !=0){echo $HRQO;}} ?>
						<span class="sr-only">35% Complete </span>
					</div>
					<div class="progress-bar progress-bar-success" style="background-color:#00703C;color:#1e1e1e;width:<?php $FQX = ($FQ/$total)*100;echo $FQX  ?>%"><?php  if($err == 1){ echo "#Final ".$FQ;}else{if($FQ !=0){echo $FQ;}}?>
						<span class="sr-only">35% Complete</span>
					</div>
					<div class="progress-bar progress-bar-success" style="background-color:#ffc200;color:#1e1e1e;width:<?php $INPX = ($INP/$total)*100;echo $INPX  ?>%"><?php  if($err == 1){ echo "#InP ".$INP;}else{if($INP !=0){echo $INP;}}?>
						<span class="sr-only">35% Complete </span>
					</div>
				</div> 
			</td>
			<td class='text-right'style='padding-right:20px' id='tempTableIdCol<?php echo $i?>'>
				<?php echo $rtotal ?>
			</td>
		</tr>
		<?php
		}?>
	</tbody>
</table>