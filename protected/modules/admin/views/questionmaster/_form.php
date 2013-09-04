
<?php 
	$requesturl=Yii::app()->createAbsoluteUrl('admin/default/subcatlistbycatid');
	Yii::app()->clientScript->registerScript('csdropdownchange1','
		iscppchange();	
		$("#Questionmaster_categoryid").live("change",function(){
			var categoryid=$(this).val();
			if(categoryid==""){
				$("#Questionmaster_subcatid").html("<option value=\"\">Select Subcategory</option>");			
			}else{
				$.ajax({
					"url":"'.$requesturl.'",
					"type":"POST",
					"data":"catid="+categoryid,
					"success":function(data){
						$("#Questionmaster_subcatid").html(data);
					}
				});
			}
		});
		$("#Questionmaster_iscpp").live("change",function(){
			iscppchange();			
		});		
		function iscppchange(){
			var iscpp=$("#Questionmaster_iscpp").val();
			if(iscpp==1){
				$(".cppcatclass").css("display","block");
			}else{
				$(".cppcatclass").css("display","none");
			}		
		}
			
	');
?>
<?php
/* @var $this QuestionmasterController */
/* @var $model Questionmaster */
/* @var $form CActiveForm */
$category_list=Datacomponent::list_category();
$cppcategory_list=Datacomponent::cppcategorylist();
$subcategory_list=array();
if($model->subcatid=='empty' || $model->subcatid ==""){
		
}else{
	$model->categoryid=$model->subcat->catid;
}

if(isset($model->categoryid) && ($model->categoryid!='empty' || $model->categoryid!='')){
	$subcategory_list=Datacomponent::list_subcategory($model->categoryid);
}
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'questionmaster-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'text_question'); ?>
		<?php echo $form->textArea($model,'text_question',array('cols'=>'60')); ?>
		<?php echo $form->error($model,'text_question'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'questionscore'); ?>
		<?php echo $form->textField($model,'questionscore'); ?>
		<?php echo $form->error($model,'questionscore'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'categoryid'); ?>
		<?php echo $form->dropDownList($model,'categoryid',$category_list,array('empty'=>'Select Category')); ?>
		<?php echo $form->error($model,'categoryid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subcatid'); ?>
		<?php echo $form->dropDownList($model,'subcatid',$subcategory_list,array('empty'=>'Select Subcategory')); ?>
		<?php echo $form->error($model,'subcatid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iscpp'); ?>
		<?php echo $form->dropDownList($model,'iscpp',array('0'=>'No','1'=>'Yes')); ?>
		<?php echo $form->error($model,'iscpp'); ?>
	</div>

	<div class="row cppcatclass">
		<?php echo $form->labelEx($model,'cppcatid'); ?>
		<?php echo $form->dropDownList($model,'cppcatid',$cppcategory_list,array('empty'=>'Select Category')); ?>
		<?php echo $form->error($model,'cppcatid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isactive'); ?>
		<?php echo $form->dropDownList($model,'isactive',array('1'=>'Active','0'=>'Inactive')); ?>
		<?php echo $form->error($model,'isactive'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

