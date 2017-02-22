<?php 
$count = count($panels);
//print_r($panels);
$total = $panels[0]->total;
$wd = $panels[0]->isWT;
$r1d = $panels[0]->isR1;
$r2d = $panels[0]->isR2;
$r3d = $panels[0]->isR3;
$r4d = $panels[0]->isR4;
$onsited = $panels[0]->isOnsite;
$hrd = $panels[0]->isHR;
$finald = $panels[0]->isFinal;
?>
[{"legendLabel": "Written","color":"#660000", "magnitude": <?php echo $wd;?>, "link": "index.php?op=showByStatus&status1=4&status2=3&type=WrittenTest"},{"legendLabel": "Round1","color":"#990000", "magnitude": <?php echo $r1d;?>, "link": "index.php?op=showByStatus&status1=6&status2=5&type=Round1"},{"legendLabel": "Round2", "color":"#cc0000","magnitude": <?php echo $r2d;?>, "link": "index.php?op=showByStatus&status1=8&status2=7&type=Round2"},{"legendLabel": "Round3", "color":"#ff0000","magnitude": <?php echo $r3d;?>, "link": "index.php?op=showByStatus&status1=10&status2=9&type=Round3"},{"legendLabel": "Round4","color":"#ff3232", "magnitude": <?php echo $r4d;?>, "link": "index.php?op=showByStatus&status1=12&status2=11&type=Round4"},{"legendLabel": "Onsite", "color":"#ff6666","magnitude": <?php echo $onsited;?>, "link": "index.php?op=showByStatus&status1=14&status2=13&type=Onsite"},{"legendLabel": "HR","color":"#ff9999", "magnitude": <?php echo $hrd;?>, "link": "index.php?op=showByStatus&status1=16&status2=15&type=MD"},{"legendLabel": "Final","color":"#ffcccc", "magnitude": <?php echo $finald;?>, "link": "index.php?op=showByStatus&status1=18&status2=17&type=Final"}]