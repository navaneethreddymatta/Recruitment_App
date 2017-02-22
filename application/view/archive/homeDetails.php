<?php 
$k="<table id='example-datatable3' class='table table-vcenter table-hover table-bordered'>
    <thead>
		<tr>
		
			<th class='text-left' style='padding-left:5px;'>Name</th>
			<th class='text-right' style='padding-left:5px;width:80px'>Total</th>
			<th class='text-right' style='padding-left:5px;width:80px' >WT</th>
			<th class='text-right' style='padding-left:5px;width:80px' >GD</th>
			<th class='text-right' style='padding-left:5px;width:80px'>TR1</th>						
			<th class='text-right' style='padding-left:5px;width:80px'>TR2</th>
			<th class='text-right' style='padding-left:5px;width:80px'>Comm</th>
			<th class='text-right' style='padding-left:5px;width:80px'>Onsite</th>
			<th class='text-right' style='padding-left:5px;width:80px'>M.D</th>
			<th class='text-right' style='padding-left:5px;width:80px'>HR</th>
			<th class='text-right' style='padding-left:5px;width:80px'>Rejs</th>
		</tr>
	</thead>
	<tbody>";
for($i=0;$i<count($hDetails);$i++){
	$v = $hDetails[$i];
	if($v->val != "person"){
		$name = $v->name;
		$oname = $v->name;		
		$WQ = $v->Written;		
		$R1Q = $v->R1;
		$R2Q = $v->R2;
		$R3Q = $v->R3;
		$R4Q = $v->R4;
		$ONQ = $v->Onsite;
		$HRQ = $v->MD;
		$FQ = $v->HR;
		$rejs = $v->rejs;
		$total = $v->total;
		$search =$v->search;
	}
	else{
		$oname = $v->oname;
		$WQ = $v->WQ;	
		$R1Q = $v->R1Q ;
		$R2Q = $v->R2Q ;
		$R3Q = $v->R3Q ;
		$R4Q = $v->R4Q ;
		$ONQ = $v->ONQ;
		$HRQ = $v->HQ;
		$FQ = $v->FQ;		
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
		$rejs = $WD + $R1D + $R2D + $R3D + $R4D + $OND + $HRD + $FD;
		$total = $rejs+$WQ + $R1Q+ $R2Q + $R3Q + $R4Q + $ONQ+ $HRQ + $FQ;
		$name =$v->name;
		$search =$v->search;
	}
	$k=$k."<tr id='tempTableRow".$i."' onclick='getContactBySelection(\"".$search."\",\"".$name."\");'><td id='tempTableIdCol".$i."'>".$oname."</td>
	<td class='text-right' style='padding-right:20px' id='tempTableIdCol".$i."'>".$total."</td>
	<td class='text-right' style='padding-right:20px' id='tempTableNameCol".$i."'>".$WQ."</td><td class='text-right' style='padding-right:20px' id='tempTableMailCol".$i."'>".$R1Q."</td><td  class='text-right' style='padding-right:20px' id='tempTableScoreCol".$i."'>".$R2Q."</td><td class='text-right' style='padding-right:20px' id='tempTableStatusCol".$i."'>".$R3Q."</td>
	<td class='text-right' style='padding-right:20px' id='tempTableStatusCol".$i."'>".$R4Q."</td>
	<td class='text-right' style='padding-right:20px' id='tempTableStatusCol".$i."'>".$ONQ."</td>
	<td class='text-right' style='padding-right:20px' id='tempTableStatusCol".$i."'>".$HRQ."</td>
	<td class='text-right' style='padding-right:20px' id='tempTableStatusCol".$i."'>".$FQ."</td>
	<td class='text-right' style='padding-right:20px' id='tempTableStatusCol".$i."'>".$rejs."</td>
	</tr>";
}
$k = $k."</tbody></table>";
echo $k;
?>
