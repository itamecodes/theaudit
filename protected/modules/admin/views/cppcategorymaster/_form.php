<?php
/* @var $this CppcategorymasterController */
/* @var $model Cppcategorymaster */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cppcategorymaster-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'categoryname'); ?>
		<?php echo $form->textField($model,'categoryname'); ?>
		<?php echo $form->error($model,'categoryname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'categorydesc'); ?>
		<?php echo $form->textArea($model,'categorydesc',array('cols'=>100)); ?>
		<?php echo $form->error($model,'categorydesc'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->