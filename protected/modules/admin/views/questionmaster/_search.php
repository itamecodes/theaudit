<?php
/* @var $this QuestionmasterController */
/* @var $model Questionmaster */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'questid'); ?>
		<?php echo $form->textField($model,'questid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'questiontxtid'); ?>
		<?php echo $form->textField($model,'questiontxtid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'questionscore'); ?>
		<?php echo $form->textField($model,'questionscore'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'questweight'); ?>
		<?php echo $form->textField($model,'questweight'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iscpp'); ?>
		<?php echo $form->textField($model,'iscpp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cppcatid'); ?>
		<?php echo $form->textField($model,'cppcatid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subcatid'); ?>
		<?php echo $form->textField($model,'subcatid'); ?>
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