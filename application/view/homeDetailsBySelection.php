<?php 
//echo "<pre>";
//print_r($hDetails);
$colors=array("#1e1e1e","#d9edf7","#1e1e1e","#660000","#ADDFAD","#990000","#90EE90","#cc0000","#77DD77","#ff0000","#3CD070","#ff3232","#00CC99","#ff6666","#1CAC78","#ff9999","#009F6B","#ffcccc","#00703C");
$k="<table id='example-datatable1' class='table table-vcenter table-hover table-condensed table-bordered'>
    <thead>
		<tr>
			<th class='text-left' style='padding-left:5px' >Reg ID</th>
			<th class='text-left' style='padding-left:5px'>Name</th>
			<th class='text-left' style='padding-left:5px'>Email</th>
			<th class='text-left' style='padding-left:5px'>Phone</th>						
			<th class='text-left' style='padding-left:5px'>Status</th>
			
		</tr>
	</thead>
	<tbody>";
for($i=0;$i<count($hDetails)-1;$i++){
	$v = $hDetails[$i];
	$id1 = $v->statusID;
	$bcolor = $v->bg;
	$fcolor = '#fff';
	if($id1%2 ==0){
		$fcolor = '#000';
	}
	if($id1 == 1 ){
		$fcolor = '#000';
	}
	elseif($id1 == 2){
		$fcolor = '#fff';
	}
	if($v->evtID == $hDetails['val'])
	{
		$k=$k."<tr style='background-color:$bcolor;color:$fcolor' onclick='getContactDetails(\"".$v->id1."\",\"".$v->statusID."\",\"".$v->regId."\");'; id='tempTableRow".$i."'><td id='tempTableIdCol".$i."'>".$v->regId."</td><td id='tempTableNameCol".$i."'>".$v->fname." ".$v->lname."</td><td id='tempTableMailCol".$i."'>".$v->email."</td><td id='tempTableScoreCol".$i."'>".$v->mobile."</td><td id='tempTableStatusCol".$i."'>".$v->status."</td></tr>";
	}
	else
	{
		$k=$k."<tr style='background-color:$bcolor;color:$fcolor' id='tempTableRow".$i."'><td id='tempTableIdCol".$i."'>".$v->regId."</td><td id='tempTableNameCol".$i."'>".$v->fname." ".$v->lname."</td><td id='tempTableMailCol".$i."'>".$v->email."</td><td id='tempTableScoreCol".$i."'>".$v->mobile."</td><td id='tempTableStatusCol".$i."'>".$v->status."</td></tr>";
	}
}
$k = $k."</tbody></table>";
echo $k;
?>