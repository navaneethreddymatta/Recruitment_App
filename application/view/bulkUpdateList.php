<?php 
$k='<table id="example-datatable" class="table table-vcenter table-hover table-condensed table-bordered">
	<thead>
		<tr>
			<th>Reg ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Current Status</th>
			<th>Score</th>									
			<th style="opacity:0 !important"></th>
		</tr>
	</thead>
	<tbody>';
	$tblCnt=count($bulkList);
	for($i=0;$i<$tblCnt;$i++)
	{
		$v = $bulkList[$i];
		$k=$k."<tr id='tempTableRow".$i."'><td id='tempTableIdCol".$i."'>".$v->regIdNum."</td><td id='tempTableNameCol".$i."'>".$v->name."</td><td id='tempTableMailCol".$i."'>".$v->mail."</td><td id='tempTableStatusCol".$i."'>".$v->currStatus."</td><td id='tempTableScoreCol".$i."'>".$v->score."</td><td style='text-align:center'><span id='tempTableRemoveCol".$i."' class='fa fa-times fa-2x text-danger' onclick=deleteRow(".$i.",'".$v->regIdNum."')></span></td></tr>";
	}
	$k = $k."</tbody></table>";
	echo $k;
?>