<?php 
//print_r($panels);
//$ini_array = parse_ini_file("assets/ini/events.ini");
//print_r($ini_array['event']);
?>
<div class="row text-center">
<?php 
$count = count($panels);
$i=-1;
$t =0;
$wq=0;
$wd=0;
$r1q = 0;
$r1d = 0;
$r2q = 0;
$r2d = 0;
$r3q = 0;
$r3d = 0;
$r4q = 0;
$r4d = 0;
for($j=0;$j<$count;$j++)
{
	if($i==-1)
	{
?> 
		<a href="index.php?op=list">
			<div class="col-xs-4 col-sm-2">
				<h2 class="animation-hatch">
					<strong><?php $t=$panels[$j]->t1; echo $panels[$j]->t1;?></strong><br>
					<small><i class="fa fa-people"></i> Total</small>
				</h2>
			</div>	
		</a>	
<?php
	}
	else if($i==0)
	{?>		
		<a href="index.php?op=showByStatus&status1=4&status2=3&type=<?php echo "Written Test";?>">
			<div class="col-xs-4 col-sm-2" style="cursor:pointer" >
					<h2 class="animation-hatch">
						<strong><?php $wq=$panels[$j]->t1;$wd=$panels[$j-1]->t1-$r1q; echo $panels[$j]->t1.'/'.$panels[$j-1]->t1?></strong><br>
						<small><i class="fa fa-thumbs-o-up"></i> Written</small>						
					</h2>
			</div>
		</a>
	<?php
	}
	else
	{
		if($i==1){$newStatus=6;}else if($i==2){$newStatus=8;}else if($i==3){$newStatus=10;}else{$newStatus=12;}		
	?>
	<a href="index.php?op=showByStatus&status1=<?php echo $newStatus;?>&status2=<?php echo $newStatus-1;?>&type=<?php echo "Round ".$i;?>">
		<div class="col-xs-4 col-sm-2">
				<h2 class="animation-hatch">
					<strong><?php $num=$i; echo $panels[$j]->t1.'/'.$panels[$j-1]->t1?></strong><br>
					<small><i class="fa fa-thumbs-o-up"></i> Round <?php echo $i;?></small>
					<?php 
					if($i== 1)
					{
						$r1q = $panels[$j]->t1;
						$r1d = $panels[$j-1]->t1 - $r1q;						
					}
					elseif($i ==2)
					{
						$r2q = $panels[$j]->t1;
						$r2d = $panels[$j-1]->t1 - $r1q;
					}
					elseif($i ==3)
					{
						$r3q = $panels[$j]->t1;
						$r3d = $panels[$j-1]->t1 - $r1q;
					}
					else
					{
						$r4q = $panels[$j]->t1;
						$r4d = $panels[$j-1]->t1 - $r1q;
					}
						
					?>
				</h2>
		</div>
	</a>
<?php
	}
	$i++;
}
?>
 </div>
 