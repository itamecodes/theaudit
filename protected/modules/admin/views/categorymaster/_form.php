<?php
/* @var $this CategorymasterController */
/* @var $model Categorymaster */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'categorymaster-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'text_categoryname'); ?>
		<?php echo $form->textField($model,'text_categoryname',array('size'=>100)); ?>
		<?php echo $form->error($model,'text_categoryname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'catscore'); ?>
		<?php echo $form->textField($model,'catscore',array('size'=>100)); ?>
		<?php echo $form->error($model,'catscore'); ?>
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
<br/>
</div><!-- form -->
<!--  Just For Reference -->

<div class="title">
<h2>Category List</h2>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'categorymaster-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'categorynametxtid',
			'type'=>'raw',
			'value'=>'$data->categorynametxt->text',
		),
		'catscore',
/*		array(
			'name'=>'createdby',
			'value'=>'$data->createdby0->username',
		),
		array(
			'name'=>'createdon',
			'value'=>'Datacomponent::dateformat($data->createdon)',
		),*/
		array(
			'class'=>'CButtonColumn',
		),
	),
	'itemsCssClass'=>'hastable',
)); 

?>