<?php 
$rounds=$panels[0];
$labels=$panels[1];
$count = $panels[2];
$stats='[';
for($i=1;$i<=$count;$i++)
{
	$temp1="isR".$i;
	$t1=$rounds->$temp1;
	$pVal = "P".$i;
	$pVal1="P".($i-1);	
	if($i==1)
	{
		$pVal=$count-$t1;
	}
	else
	{
		$pVal=$pVal1-$t1;
	}
	//echo "--->".$pVal;
	if($i != $count)
	{		
		$stats=$stats.'{"legendLabel": "'.$labels[$i]->shortName.'", "color":"#cc0000","magnitude":'.$t1.', "link": "#"},';		
	}
	else
	{
		$stats=$stats.'{"legendLabel": "'.$labels[$i]->shortName.'", "color":"#cc0000","magnitude": '.$t1.', "link": "#"}]';
	}	
}
print_r($stats);
?>