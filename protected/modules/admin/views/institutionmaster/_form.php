<?php
/* @var $this InstitutionmasterController */
/* @var $model Institutionmaster */
/* @var $form CActiveForm */
$institute_list=Datacomponent::list_legalstatus();

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'institutionmaster-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'text_institutename'); ?>
		<?php echo $form->textField($model,'text_institutename'); ?>
		<?php echo $form->error($model,'text_institutename'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'legalstatusid'); ?>
		<?php echo $form->dropDownList($model,'legalstatusid',$institute_list,array('empty'=>'Select Legalstatus')); ?>
		<?php echo $form->error($model,'legalstatusid'); ?>
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