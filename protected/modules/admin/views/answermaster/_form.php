<?php
/* @var $this AnswermasterController */
/* @var $model Answermaster */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'answermaster-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
	<h2>Q: <?php echo $model->quest->questiontxt->text; ?></h2>

	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'text_answer'); ?>
		<?php echo $form->textArea($model,'text_answer',array('cols'=>'60')); ?>
		<?php echo $form->error($model,'text_answer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answerscore'); ?>
		<?php echo $form->textField($model,'answerscore'); ?>
		<?php echo $form->error($model,'answerscore'); ?>
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
<!--  Answers -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'answermaster-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'questid',
			'value'=>'$data->quest->questiontxt->text',
		),
		array(
			'name'=>'answertxtid',
			'value'=>'$data->answertxt->text',
		),		
		'answerscore',
		array(
			'name'=>'createdby',
			'value'=>'$data->createdby0->username',
		),
		array(
			'name'=>'createdon',
			'value'=>'Datacomponent::dateformat($data->createdon)',
		),		
		array(
			'name'=>'lasteditedby',
			'value'=>'$data->lasteditedby0->username',
		),
		array(
			'name'=>'lasteditedon',
			'value'=>'Datacomponent::dateformat($data->lasteditedon)',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
	'itemsCssClass'=>'hastable',
)); ?>