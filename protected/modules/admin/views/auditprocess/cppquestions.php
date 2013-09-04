<?php $cppquestions=Datacomponent::cppquestionsBycppcat($cppcategory->cppcatid);
	$cppanswers_result=Datacomponent::cppanswers_auditquestions($cppcategory,$questionid,$auditid); 
	$cppanswers=Datacomponent::cppanswersdetails();
?>
<div class="title">
<h2>&nbsp;&nbsp;<?php echo  $cppcategory->cppcat->ccpcatnametxt->text; ?></h2>
</div>
&nbsp;&nbsp; <?php echo  $cppcategory->cppcat->cppcatdesctxt->text; ?>
<br/><br/>
<?php
$i=1;
$cpptabs=array();
foreach ($cppquestions as $key=>$value){
	$numbercpp=$questionid.".".$cppcategory->cppcatid.".".$key;	
	$cpptabs["Question-$i"]=array('id'=>"cpp$i",
	'content'=>$this->renderPartial('cppanswers',array('cppanswers_result'=>$cppanswers_result,'value'=>$value,'cppquestionid'=>$key,'cppanswers'=>$cppanswers,'numbercpp'=>$numbercpp),true));
	$i++;
}
if(count($cpptabs)>0){
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>
		$cpptabs,
    'options'=>array(
        'collapsible'=>false,
    ),
    'id'=>'cppquestionstab',
));
}else{
	echo "No data found";
}

?>