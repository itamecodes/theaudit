<?php
/* @var $this UsermasterController */
/* @var $model Usermaster */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usermaster-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'confirmpassword'); ?>
		<?php echo $form->passwordField($model,'confirmpassword',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'confirmpassword'); ?>
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
		<?php echo $form->labelEx($model,'usertype'); ?>
		<?php echo $form->textField($model,'usertype'); ?>
		<?php echo $form->error($model,'usertype'); ?>
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