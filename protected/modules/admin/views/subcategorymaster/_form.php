<?php
/* @var $this SubcategorymasterController */
/* @var $model Subcategorymaster */
/* @var $form CActiveForm */
$category_list=Datacomponent::list_category();

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subcategorymaster-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'catid'); ?>
		<?php echo $form->dropDownList($model,'catid',$category_list,array('empty'=>'Select Category')); ?>
		<?php echo $form->error($model,'catid'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'text_subcategory'); ?>
		<?php echo $form->textField($model,'text_subcategory'); ?>
		<?php echo $form->error($model,'text_subcategory'); ?>
	</div>
<!--  
	<div class="row">
		<?php //echo $form->labelEx($model,'subcategoryscore'); ?>
		<?php //echo $form->textField($model,'subcategoryscore'); ?>
		<?php //echo $form->error($model,'subcategoryscore'); ?>
	</div>
	-->
	<div class="row">
		<?php echo $form->labelEx($model,'subcategoryweight'); ?>
		<?php echo $form->textField($model,'subcategoryweight'); ?>
		<?php echo $form->error($model,'subcategoryweight'); ?>
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