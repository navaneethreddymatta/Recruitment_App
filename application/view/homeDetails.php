<?php 
$rounds=$hDetails['rounds'];
//echo "<pre>";print_r($rounds);
$k="<table id='example-datatable3' class='table table-vcenter table-hover table-bordered'>
    <thead>
		<tr><th class='text-left' style='padding-left:5px;'>Name</th>
		<th class='text-right' style='padding-left:5px;width:80px'>Total</th>";
		for($i=2;$i<=sizeOf($rounds)-1;$i++)
		{	
			
			$k=$k."<th class='text-right' style='padding-left:5px;width:80px' >".$rounds[$i]->shortName."</th>";
			
		}
		$k=$k."<th class='text-right' style='padding-left:5px;width:80px'>Rejs</th>
		</tr>
	</thead>
	<tbody>";
	$rCount=$hDetails['count'];
	
    $rtotal=0;
    $total=0;
	//echo "<pre>";print_r($hDetails);
for($i=0;$i<count($hDetails)-2;$i++){
			$v = $hDetails[$i];				
			$search=$v->val;											
			$total = $v->total;
			$name =$v->name;								
			
			
			
	$k=$k."<tr id='tempTableRow".$i."' onclick='getContactBySelection(\"".$search."\",\"".$name."\");'><td id='tempTableIdCol".$i."'>".$name."</td>
	<td class='text-right' style='padding-right:20px' id='tempTableIdCol".$i."'>".$total."</td>";
	for($j=0;$j<$rCount-1;$j++)
	{ $bColor="R".$j."bg";
	  $temp="R".$j;
	
		$k=$k."<td class='text-right' style='padding-right:20px' id='tempTableMailCol".$j."'>".$v->$temp."</td>
		";
	}
	$k=$k."<td class='text-right' style='padding-right:20px' id='tempTableIdCol".$i."'>".$v->rejs."</td></tr>";
}
$k = $k."</tbody></table>";
echo $k;
?>
