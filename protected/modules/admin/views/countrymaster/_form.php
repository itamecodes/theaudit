<?php
/* @var $this CountrymasterController */
/* @var $model Countrymaster */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'countrymaster-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'countryname'); ?>
		<?php echo $form->textField($model,'countryname',array('size'=>60,'maxlength'=>75)); ?>
		<?php echo $form->error($model,'countryname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createdby'); ?>
		<?php echo $form->textField($model,'createdby'); ?>
		<?php echo $form->error($model,'createdby'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createdon'); ?>
		<?php echo $form->textField($model,'createdon'); ?>
		<?php echo $form->error($model,'createdon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lasteditedby'); ?>
		<?php echo $form->textField($model,'lasteditedby'); ?>
		<?php echo $form->error($model,'lasteditedby'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lasteditedon'); ?>
		<?php echo $form->textField($model,'lasteditedon'); ?>
		<?php echo $form->error($model,'lasteditedon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isactive'); ?>
		<?php echo $form->textField($model,'isactive'); ?>
		<?php echo $form->error($model,'isactive'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->