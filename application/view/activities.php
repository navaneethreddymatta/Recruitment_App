<?php 
function ago($time){
	date_default_timezone_set("Asia/Kolkata"); 
	$time = strtotime($time);   
	$periods = array("sec", "min", "hr", "day", "wk", "mon", "yr", "decade");
	$lengths = array("60","60","24","7","4.35","12","10");
	$now = date('Y-m-d H:i:s');	  
	$now = strtotime($now);
	$difference = $now - $time;
	$tense = "ago";
	for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
		$difference /= $lengths[$j];
	}
	$difference = round($difference);
	if($difference != 1) {
		$periods[$j].= "s";
	}
	return "$difference $periods[$j] ago ";
}
?>
<div class="sidebar-section">
<?php 
foreach($contactactivites as $activity){
	$cid=urlencode($activity->cid);
	$status=urlencode($activity->status);	
	$cid=preg_replace('/\s+/', '', $cid);
	$status=preg_replace('/\s+/', '', $status);
	$regId=$activity->regId;
	if($activity->status == 1 || $activity->status == 2){
	?>
		<div class="alert alert-alt">		
			<i class="fa fa-thumbs-up fa-fw"></i> <?php echo $activity->staff;?><small class="pull-right"><?php echo ago($activity->stime);?></small><br>
			<a href="<?php echo 'index.php?op=showDetails&id='.$regId?>"><strong><?php echo $activity->regId;?></strong></a>  <?php echo $activity->statusName;?>
		</div>	
	<?php 
	}
	else{?>
		<div class="alert alert-alt">
			<?php if($activity->state == 2){?><i class="fa fa-thumbs-down fa-fw"></i> <?php }else
			{?><i class="fa fa-thumbs-up fa-fw"></i><?php }echo $activity->staff;?><small class="pull-right"><?php echo ago($activity->stime);?></small><br>
			<a href="<?php echo 'index.php?op=showDetails&id='.$regId?>"><strong><?php echo $activity->regId;?></strong></a>  is <?php echo $activity->statusName;?> <strong> (<?php echo $activity->score;?>/10)</strong>
		</div>	
	<?php 
	}
}?>	
</div>