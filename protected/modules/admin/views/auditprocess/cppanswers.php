
	<div class='questionrow'>
		<h4>Q: <?php echo $value;  ?>	</h4>
	<div>
	<table style="margin-left: 57px; margin-top: 7px;">
<?php 
foreach ($cppanswers as $key=>$value) {
	$isselected='';
	if(isset($cppanswers_result[$cppquestionid]) && $cppanswers_result[$cppquestionid]==$key){		
		$isselected="checked='checked'";
	}
	?>		
			 <tr>
			 	<td><input type='radio' class="auditcppquestionsanswer" name="cppans<?php echo $cppquestionid; ?>" id=<?php echo $numbercpp.".".$key; ?>  <?php echo $isselected; ?>></td>
			 	<td><?php echo $value; ?></td>
			 </tr>
<?php } ?>			
	</table>
		</div>
	</div>	