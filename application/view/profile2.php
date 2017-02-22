<ul class="timeline-list timeline-hover">
<?php		
$colors=array("#1e1e1e","#d9edf7","#1e1e1e","#660000","#ADDFAD","#990000","#90EE90","#cc0000","#77DD77","#ff0000","#3CD070","#ff3232","#00CC99","#ff6666","#1CAC78","#ff9999","#009F6B","#ffcccc","#00703C");									
function ago($time)			
{		
   date_default_timezone_set("Asia/Kolkata"); 
   $time = strtotime($time);   
   $periods = array("sec", "min", "hr", "day", "wk", "mon", "yr", "decade");
   $lengths = array("60","60","24","7","4.35","12","10");
   $now = date('Y-m-d H:i:s');	  
   $now = strtotime($now);
   $difference     = $now - $time;
   $tense         = "ago";
   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
	   $difference /= $lengths[$j];
   }
   $difference = round($difference);
   if($difference != 1) {
	   $periods[$j].= "s";
   }
   return "$difference $periods[$j] ago ";
}									
foreach($myActivities as $activity){
	$fColor = $colors[$activity->status];
?>
	<li class="active">
		<div class="timeline-icon"><i class="fa fa-file-text"></i></div>
		<div class="timeline-time" ><?php echo ago($activity->stime)?></div>
		<div class="timeline-content">
			<p class="push-bit"><strong><?php echo $activity->regId.' ( '.$activity->fname.' '.$activity->lname.' )'?> is <em style="color:<?php echo $fColor;?>"> <?php echo $activity->statusName.' ('.$activity->score.'/10)'?></em></p></strong>
			<?php echo $activity->comment?>
		</div>
	</li>
<?php
}
?>
</ul>