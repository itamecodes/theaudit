<?php
/* @var $this CppquestionmasterController */
/* @var $model Cppquestionmaster */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cppquestionmaster-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'questiontext'); ?>
		<?php echo $form->textField($model,'questiontext'); ?>
		<?php echo $form->error($model,'questiontext'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'questiondesc'); ?>
		<?php echo $form->textArea($model,'questiondesc'); ?>
		<?php echo $form->error($model,'questiondesc'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'cppcatid');
        $ccpcat=Datacomponent::cppcategorylist();
        echo $form->dropDownList($model,'cppcatid',$ccpcat);
		 echo $form->error($model,'cppcatid');
         
          ?>
        
	</div>





	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->