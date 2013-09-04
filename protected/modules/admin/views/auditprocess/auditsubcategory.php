<div class="title"><h2><?php echo $value; ?></h2></div>
<?php
	$subcategorylist=Datacomponent::list_subcategory($categoryid);
	$subcatarray=array();
	$j=1;
	foreach ($subcategorylist as $key=>$value){
		$iscomplete1=Datacomponent::iscomplete_subcategory($key, $auditmodel->auditid);
		$css='';
		if($iscomplete1==0){$css='notstarted-audit';}
		else if($iscomplete1==1){$css='incomplete-audit';}
		else if($iscomplete1==2){$css='complete-audit';}
			
		$subcatarray["<span class='$css'>$number.$j. $value</span>"]=$this->renderPartial(
								"auditquestions",
								array('auditmodel'=>$auditmodel,'subcategoryid'=>$key,'number2'=>$number.".".$j),true
								);
		$j++;
	}
	$this->widget('zii.widgets.jui.CJuiAccordion', array(
    'panels'=>$subcatarray,
	
	/*array(
        'panel 1'=>'content for panel 1',
        'panel 2'=>'content for panel 2',
    ),*/
    // additional javascript options for the accordion plugin
    'options'=>array(
     //   'animated'=>'bounceslide',
    ),
));
?>
