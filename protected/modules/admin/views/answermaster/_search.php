<?php
/* @var $this AnswermasterController */
/* @var $model Answermaster */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'answerid'); ?>
		<?php echo $form->textField($model,'answerid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'answertxtid'); ?>
		<?php echo $form->textField($model,'answertxtid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'answerscore'); ?>
		<?php echo $form->textField($model,'answerscore'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'questid'); ?>
		<?php echo $form->textField($model,'questid'); ?>
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