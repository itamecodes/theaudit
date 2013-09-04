<?php
/* @var $this AddressbookController */
/* @var $model Addressbook */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'addressid'); ?>
		<?php echo $form->textField($model,'addressid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'titletxtid'); ?>
		<?php echo $form->textField($model,'titletxtid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contactpersonnametxtid'); ?>
		<?php echo $form->textField($model,'contactpersonnametxtid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'addresstxtid'); ?>
		<?php echo $form->textField($model,'addresstxtid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'countryid'); ?>
		<?php echo $form->textField($model,'countryid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contactnumber'); ?>
		<?php echo $form->textField($model,'contactnumber',array('size'=>60,'maxlength'=>1024)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'institutionid'); ?>
		<?php echo $form->textField($model,'institutionid'); ?>
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