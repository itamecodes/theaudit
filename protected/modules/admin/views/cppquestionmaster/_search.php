<?php
/* @var $this CppquestionmasterController */
/* @var $model Cppquestionmaster */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'cppqid'); ?>
		<?php echo $form->textField($model,'cppqid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cppquestiontxtid'); ?>
		<?php echo $form->textField($model,'cppquestiontxtid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cppdecriptiontxtid'); ?>
		<?php echo $form->textField($model,'cppdecriptiontxtid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cppcatid'); ?>
		<?php echo $form->textField($model,'cppcatid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'createdby'); ?>
		<?php echo $form->textField($model,'createdby'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'createdon'); ?>
		<?php echo $form->textField($model,'createdon'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lasteditedby'); ?>
		<?php echo $form->textField($model,'lasteditedby'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lasteditedon'); ?>
		<?php echo $form->textField($model,'lasteditedon'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isactive'); ?>
		<?php echo $form->textField($model,'isactive'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->