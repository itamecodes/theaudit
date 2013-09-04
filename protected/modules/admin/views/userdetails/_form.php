<?php
/* @var $this UserdetailsController */
/* @var $model Userdetails */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'userdetails-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'userid'); ?>
		<?php echo $form->textField($model,'userid'); ?>
		<?php echo $form->error($model,'userid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phoneno'); ?>
		<?php echo $form->textField($model,'phoneno',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'phoneno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobileno'); ?>
		<?php echo $form->textField($model,'mobileno',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'mobileno'); ?>
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