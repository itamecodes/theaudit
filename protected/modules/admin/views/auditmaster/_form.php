<?php
/* @var $this AuditmasterController */
/* @var $model Auditmaster */
/* @var $form CActiveForm */
?>

<?php 
	$legalstatusurl=Yii::app()->createAbsoluteUrl('admin/default/legalstatusbycountry');
	$instituteurl=Yii::app()->createAbsoluteUrl('admin/default/institutebylegalstatus');
	Yii::app()->clientScript->registerScript('auditjs','
		$("#Auditmaster_countryid").live("change",function(){
			var id=$(this).val();
			$("#Auditmaster_institutionid").html("<option value=\'\'>Select Institute</option>");
			$("#Auditmaster_legalstatus").html("<option value=\'\'>Select Legal Status</option>");
			if(id=="" || id=="empty"){}
			else{
				$.ajax({
					"url":"'.$legalstatusurl.'",
					"type":"POST",
					"data":"id="+id,
					"success":function(data){
						$("#Auditmaster_legalstatus").html(data);
					}
				});
				}
			});
			
		$("#Auditmaster_legalstatus").live("change",function(){
			var id=$(this).val();
			$("#Auditmaster_institutionid").html("<option value=\'\'>Select Institute</option>");
			if(id=="" || id=="empty"){}
			else{
				$.ajax({
					"url":"'.$instituteurl.'",
					"type":"POST",
					"data":"id="+id,
					"success":function(data){
						$("#Auditmaster_institutionid").html(data);
					}
				});
				}
			});			
	');
?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'auditmaster-form',
	'enableAjaxValidation'=>false,
)); 
$country_list=Datacomponent::list_country();
$legalstatus_list=array();$institute_list=array();
if(isset($model->countryid) && $model->countryid!='')
	$legalstatus_list=Datacomponent::list_legalstatusbycountry($model->countryid);
if(isset($model->legalstatus) && $model->legalstatus!='')
	$institute_list=Datacomponent::list_institutebylegalstatusid($model->legalstatus);
?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'countryid'); ?>
		<?php echo $form->dropDownList($model,'countryid',$country_list,array('empty'=>'Select Country')); ?>
		<?php echo $form->error($model,'countryid'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'legalstatus'); ?>
		<?php echo $form->dropDownList($model,'legalstatus',$legalstatus_list,array('empty'=>'Select Legal Status')); ?>
		<?php echo $form->error($model,'legalstatus'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'institutionid'); ?>
		<?php echo $form->dropDownList($model,'institutionid',$institute_list,array('empty'=>'Select Institute')); ?>
		<?php echo $form->error($model,'institutionid'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<!--  Recent Audits -->

<div class="title">
<h2>Recent Audits</h2>
</div>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'auditmaster-grid',
	'dataProvider'=>$model->recentauditsearch(),
//	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'analystid',
			'value'=>'$data->analyst->username',
		),
		array(
			'name'=>'institutionid',
			'value'=>'$data->institution->institutionnametxt->text',
		),
		array(
			'name'=>'countryid',
			'value'=>'$data->country->countryname',
		),
		array(
			'name'=>'createdby',
			'value'=>'$data->createdby0->username',
		),
		array(
			'name'=>'createdon',
			'value'=>'Datacomponent::dateformat($data->createdon)',
		),
		'status',
		array(
			'class'=>'CButtonColumn',
		),
	),
	 'itemsCssClass'=>'hastable',
)); ?>

