<?php
$collegeArray = '';
$i=0;$c=count($colleges);
foreach($colleges as $college){
	if($i==$c-1){
	$collegeArray=$collegeArray.''.$college->college;
	}
	else{
	$collegeArray=$collegeArray.''.$college->college.'-----';
	}
	$i=$i+1;
}
echo $collegeArray;
?>