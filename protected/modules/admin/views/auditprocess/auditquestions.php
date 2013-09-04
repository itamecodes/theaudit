<?php
$questions_model=Datacomponent::model_questionsbysubcatid($subcategoryid);
$k=1;
if($questions_model){
foreach ($questions_model as $questions){ ?>
	
	<div class='questionrow'>
		<h4><?php echo $number2.".".$k.".  ".$questions->questiontxt->text; ?></h4> 
<?php 	if ($questions->iscpp==1){
		$resultvalue=Datacomponent::cppvalueByQuestion_ansscoresheetid($auditmodel->auditid, $subcategoryid, $questions->questid);
?>		
		<a id="<?php echo $questions->questid; ?>" href="#" class="btn_no_text btn ui-state-default ui-corner-all tooltip showcppquestions" title="Click Here to Answer CPP" style="padding:5px;">Answer CPP</a>
<?php if(is_array($resultvalue)){ echo "<div class='cppresult'>".$resultvalue['valuetext']."</div>";}else{ echo "<br/>";}?>		
<br/>
<?php }else { ?>				
		<div>
		<table style="margin-left: 57px; margin-top: 7px;">
<?php
	$answersarray=array();
	foreach ($questions->answercoresheets as $resultaray){
		if ($resultaray->scoresheet->auditid==$auditmodel->auditid){
			$answersarray[$resultaray['questid']]=$resultaray['answerid'];
		}
	}

	foreach ($questions->answermasters as $answers){
	if($answers->isactive==1){
		$ischecked='';
		if(isset($answersarray[$questions->questid]) && $answersarray[$questions->questid]==$answers->answerid){
			$ischecked='checked="checkd"';	
		}
?>
			 <tr>
			 	<td><input type='radio' class='auditquestionsanswer' name="<?php echo $questions->questid; ?>" id='<?php echo "$subcategoryid.$questions->questid.".$answers->answerid; ?>' <?php echo $ischecked;?> /></td>
			 	<td><?php echo $answers->answertxt->text; ?></td>
			 </tr>
<?php }} ?>			
		</table>
		</div>
<?php  } ?>		
	</div>	
<?php $k++; }
}else{
	echo "No data found";
}
?>