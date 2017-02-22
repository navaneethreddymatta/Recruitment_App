<table id='example-datatable3'  class='table table-vcenter table-hover table-condensed table-bordered'>
    <thead>
		<tr>
			<th class='text-left' style='padding-left:5px;width:10%'>Name</th>			
			<th class='text-left' >Progress</th>
			<th class='text-center' style='padding-left:5px;max-width:60px;width:100px;'>Rejs</th>
		</tr>
	</thead>
	<tbody>
		<?php
		/*echo "<pre>";
		print_r($hDetails);*/
		$rCount=$hDetails['count'];
		/*echo $hDetails[$i];*/
		$err = 0;
		$rtotal = 0;
		$total = 0;
		for($i=0;$i<count($hDetails)-2;$i++){
			$v = $hDetails[$i];
			if($v->val!="null")
			{		
			
			?>
				<tr id= 'tempTableRow<?php echo $i ?>' style="cursor:pointer"; onclick='getContactBySelection(<?php echo '"'.$v->val.'"'.','.'"'.$v->name.'"'?>)'>
					<td id='tempTableIdCol<?php echo $i?>'>
						<?php echo $v->name ?>
					</td>
					<td id='tempTableIdCol<?php echo $i?>'>
						<div class="text-center"style="font-size:14px;font-weight:bold">
						<?php echo $v->total;?>
						</div>
						<!-- DisQualified -->
						<div class="progress" >	
							<?php
							for($j=0;$j<$rCount;$j++)
							{$bColor="R".$j."bg";
							$temp="R".$j ?>
								<div class="progress-bar progress-bar-success" style="background-color:<?php echo $v->$bColor;?>;width:<?php ${"R".$j."DX"} = ($v->$temp/$v->total)*100;echo ${"R".$j."DX"}; ?>%">
								<span class="sr-only">35% Complete </span>
								</div>			
							
							<?php }	
							?>
							
						</div> 
					</td>
					<td class='text-right'style='padding-right:20px' id='tempTableIdCol<?php echo $i?>'>
						<?php echo $v->rejs ?>
					</td>
				</tr>
			<?php
			}
			else
			{
				/*echo "<pre>";
				print_r($v);*/
			}
		}?>
	</tbody>
</table>