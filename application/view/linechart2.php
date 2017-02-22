<?php 
//echo "<pre>";
//print_r($panels2);
$rounds=$panels2[0];
$labels=$panels2[1];
$count = $panels2[2];
$count1 = $rounds->total;
$newCount=$rounds->total;
for($j=1;$j<$count;$j++)
{
	$newTemp="isR".$j;
	$newTemp1="R".$j."Progress";
	$newCount=$newCount-($rounds->$newTemp+$rounds->$newTemp1);
}
$stats='[{"x": 0,"y":'.$count1.',"w":'.$count.',"r":'.$count1.',"j":""},';
$stats=$stats.'{"x": 1,"y":'.$count1.',"w":'.$newCount.',"r":'.$rounds->isR1.',"j":"'.$labels[1]->shortName.'"},';

for($i=1;$i<$count;$i++)
{
	$temp="R".$i."Progress";
	$temp1="isR".($i+1);
	$t = $rounds->$temp;
	$t1=$rounds->$temp1;
	$pVal = "P".$i;
	$pVal1="P".($i-1);	
	if($i==1)
	{
		${"P".$i}=$count1-$t1;
	}
	else
	{
		${"P".$i}=${"P".($i-1)}-$t1;
	}
	
	if($i != $count-1)
	{		
		$stats=$stats.'{"x": '.($i+1).',"y":'.${"P".$i}.',"w":'.$t.',"r":'.$t1.',"j":"'.$labels[$i+1]->shortName.'"},';		
	}
	else
	{
		$stats=$stats.'{"x": '.($i+1).',"y":'.${"P".$i}.',"w":'.$t.',"r":'.$t1.',"j":"'.$labels[$i+1]->shortName.'"}]';
	}	
}
print_r($stats);
/*
$total = 100;
$wtD = 20;
$wtP = 22;
$r1P = 7;
$r1D = 9;
$r2P = 14;
$r2D = 12;
$r3P = 16;
$r3D = 23;
$r4P = 22;
$r4D = 12;
$onsiteP = 23;
$onsiteD = 7;
$hrP = 4;
$hrD = 3;
$finalP = 2;
$finalD = 1;
$p1 = $total-$wtD;
$p2 = $p1-$r1D;
$p3 = $p2-$r2D;
$p4 = $p3-$r3D;
$p5 = $p4-$r4D;
$p6 = $p5-$onsiteD;
$p7 = $p6-$hrD;
$p8 = $p7-$finalD;
?>
[{"x": 0,"y":<?php echo $total?>,"w":0,"r":<?php echo $wtD;?>},{"x": 1,"y":<?php if($p1==0){echo 1;}else{echo $p1;}?>,"w":<?php echo $wtP?>,"r":<?php echo $wtD;?>},{"x": 2,"y": <?php if($p2==0){echo 1;}else{echo $p2;}?>,"w":<?php echo $r1P;?>,"r":<?php echo $r1D?>},{"x": 3,"y": <?php if($p3==0){echo 1;}else{echo $p3;}?>,"w":<?php echo $r2P;?>,"r":<?php echo $r2D;?>},{"x": 4,"y": <?php if($p4==0){echo 1;}else{echo $p4;}?>,"w":<?php echo $r3P;?>,"r":<?php echo $r3D;?>},{"x": 5,"y": <?php if($p5==0){echo 1;}else{echo $p5;}?>,"w":<?php echo $r4P;?>,"r":<?php echo $r4D;?>},{"x": 6,"y": <?php if($p6==0){echo 1;}else{echo $p6;}?>,"w":<?php echo $onsiteP;?>,"r":<?php echo $onsiteD;?>},{"x": 7,"y": <?php if($p7==0){echo 1;}else{echo $p7;}?>,"w":<?php echo $hrP;?>,"r":<?php echo $hrD;?>},{"x": 8,"y": <?php if($p8==0){echo 1;}else{echo $p8;}?>,"w":<?php echo $finalP;?>,"r":<?php echo $finalD;?>}]*/
?>