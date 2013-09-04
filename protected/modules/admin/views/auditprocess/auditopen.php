<?php 
$cppquestionurl=Yii::app()->createAbsoluteUrl("admin/auditprocess/cppquestions");
$answerquestions=Yii::app()->createAbsoluteUrl("admin/auditprocess/answerquestions");
$answercppquestions=Yii::app()->createAbsoluteUrl("admin/auditprocess/answercppquestions");
$publishaudit=Yii::app()->createAbsoluteUrl("admin/auditprocess/Publishaudit");
$auditlist=Yii::app()->createAbsoluteUrl("admin/auditmaster/admin");

$auditid=$auditmodel->auditid;
Yii::app()->clientScript->registerScript('lightboxcss','
	$("#hidecppquestions").live("click",function(){
		$("#hideshow").css("display","none");
	});
	$(".showcppquestions").live("click",function(){
		var questionid=$(this).attr("id");
		$.ajax({
			"url":"'.$cppquestionurl.'",
			"type":"POST",
			"data":"auditid='.$auditmodel->auditid.'&questid="+questionid,
			"success":function(data){
				$(".popup-content").html(data);
			}
		});
		$("#hideshow").css("display","block");
	});
	
	$(".auditquestionsanswer").live("click",function(){
		var auditanswer=$(this).attr("id");
		$.ajax({
				"url":"'.$answerquestions.'",
				"type":"POST",
				"data":"auditid='.$auditid.'&auditanswer="+auditanswer,
				"success":function(data){					
				}		
		});
	});
	/**  questions.cppcategoryid.cppquestion.cppanswer **/
	$(".auditcppquestionsanswer").live("click",function(){
		var auditcppanswer=$(this).attr("id");
		$.ajax({
				"url":"'.$answercppquestions.'",
				"type":"POST",
				"data":"auditid='.$auditid.'&auditcppanswer="+auditcppanswer,
				"success":function(data){					
				}		
		});
	});
	$("#publish-btn").live("click",function(){
		$.ajax({
			"url":"'.$publishaudit.'",
			"type":"POST",
			"data":"auditid='.$auditid.'",
			"success":function(data){
				window.location.replace("'.$auditlist.'");				
			}
		});
	});
	
	
');
?>
<div class="title">
<!--<h2>SOCIAL PERFORMANCE SCORE RESULTS</h2>-->
<!--<h2>CPP QUESTIONNAIRE RESULTS</h2>-->
<h2>SOCIAL PERFORMANCE </h2>
<div>
    <span style="font-weight: bold;">NAME OF INSTITUTION&nbsp;:</span>&nbsp;<span><?php echo $auditmodel->institution->institutionnametxt->text; ?></span>&nbsp;|&nbsp;
    <span style="font-weight: bold;">LEGAL STATUS&nbsp;:</span>&nbsp;<span style=""> <?php echo $auditmodel->institution->legalstatus->legalstatustxt->text; ?> </span>&nbsp;|&nbsp;  
    <span style="font-weight: bold;">COUNTRY&nbsp;:</span>&nbsp;<span style=""><?php echo $auditmodel->country->countryname; ?></span>&nbsp;|&nbsp;
    <span style="font-weight: bold;">NAME OF THE ANALYST&nbsp;:</span>&nbsp;<span style=""><?php echo $auditmodel->analyst->username; ?> </span>&nbsp;|&nbsp;
    <span style="font-weight: bold;">DATE OF ASSESSMENT&nbsp;:</span>&nbsp;<span style=""><?php echo Datacomponent::dateformat($auditmodel->createdon); ?></span>     
</div>
</div>
<div style="text-align: right;margin-bottom: 4px;color: #999;">
                            		                              			
             <span class='completeaudit'>Complete</span>&nbsp;|&nbsp;
             <span class='incompleteaudit'>In-Complete</span>&nbsp;|&nbsp;
             <span class='notstartedaudit'>NotStarted</span>&nbsp;|&nbsp;
</div>
<?php
$category_list=Datacomponent::list_category();
$catarray=array();
$i=1;
$COMPLETE=array();
foreach ($category_list as $key=>$value){	
	$iscomplete=Datacomponent::iscomplete_category($key, $auditmodel->auditid);
	$COMPLETE[]=$iscomplete;
	$css='';
	if($iscomplete==0){$css='notstarted-audit';}
	else if($iscomplete==1){$css='incomplete-audit';}
	else if($iscomplete==2){$css='complete-audit';}
	$catarray["<span id='dimension$i' class='$css'>DIMENSION $i</span>"]=array('id'=>$i,'content'=>$this->renderPartial(
										'auditsubcategory',
										array('auditmodel'=>$auditmodel,'value'=>$value,'categoryid'=>$key,'number'=>$i),TRUE
										));
	$i++;
}
$catarray["<span id='dimension' class='$css'>Responsible Pricing</span>"]=array('id'=>'ResponsiblePricing','content'=>$this->renderPartial("responsiblepricing",array('auditmodel'=>$auditmodel),TRUE));

$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>
		$catarray,
    'options'=>array(
        'collapsible'=>false,
    ),
    'id'=>'categorytabs',
));

?>
<!--  this is for CPP Questions -->
<div id="hideshow" style="display:none;" >
    	        <div id="fade"></div>
    	        <div class="popup_block" style="min-height: 300px;top: 170px;">
                
                    <a href="#" id='hidecppquestions'><img src="<?php echo Yii::app()->baseUrl."/images/close_icon.gif"; ?>" align="right" title="Close" /></a>
                    <div class="popup">
                    <div class="popup-content">               
                    </div>                    
                    <div class="clearfix"></div>
                    
                    </div>
                </div>
</div>
<br/>
<?php 
if (min($COMPLETE)==2){
echo "<input type='button' value='Publish Audit' id='publish-btn'  />";	
}
?>