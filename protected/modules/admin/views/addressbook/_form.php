<?php
/* @var $this AddressbookController */
/* @var $model Addressbook */
/* @var $form CActiveForm */

$country_list=Datacomponent::list_country();
$institute_list=Datacomponent::list_institute();
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'addressbook-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'text_title'); ?>
		<?php echo $form->textField($model,'text_title'); ?>
		<?php echo $form->error($model,'text_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text_contactpersonname'); ?>
		<?php echo $form->textField($model,'text_contactpersonname'); ?>
		<?php echo $form->error($model,'text_contactpersonname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text_address'); ?>
		<?php echo $form->textField($model,'text_address'); ?>
		<?php echo $form->error($model,'text_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'countryid'); ?>
		<?php echo $form->dropDownList($model,'countryid',$country_list,array('empty'=>'Select Countrt')); ?>
		<?php echo $form->error($model,'countryid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contactnumber'); ?>
		<?php echo $form->textField($model,'contactnumber',array('size'=>60,'maxlength'=>1024)); ?>
		<?php echo $form->error($model,'contactnumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isactive'); ?>
		<?php echo $form->dropDownList($model,'isactive',array("1"=>'Active',"0"=>"Inactive")); ?>
		<?php echo $form->error($model,'isactive'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->