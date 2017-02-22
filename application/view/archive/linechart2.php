<?php 
$count = count($panels2);
print_r($panels2);
/*$total = $panels2[0]->total;
$wtD = $panels2[0]->isWT;
$wtP = $panels2[0]->isWTProgress;
$r1P = $panels2[0]->R1Progress;
$r1D = $panels2[0]->isR1;
$r2P = $panels2[0]->R2Progress;
$r2D = $panels2[0]->isR2;
$r3P = $panels2[0]->R3Progress;
$r3D = $panels2[0]->isR3;
$r4P = $panels2[0]->R4Progress;
$r4D = $panels2[0]->isR4;
$onsiteP = $panels2[0]->onsiteProgress;
$onsiteD = $panels2[0]->isOnsite;
$hrP = $panels2[0]->hrProgress;
$hrD = $panels2[0]->isHR;
$finalP = $panels2[0]->finalProgress;
$finalD = $panels2[0]->isFinal;
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