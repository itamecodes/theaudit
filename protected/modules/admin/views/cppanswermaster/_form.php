<?php
/* @var $this CppanswermasterController */
/* @var $model Cppanswermaster */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cppanswermaster-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cppanswer'); ?>
		<?php echo $form->textField($model,'cppanswer'); ?>
		<?php echo $form->error($model,'cppanswer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'score'); ?>
		<?php echo $form->textField($model,'score'); ?>
		<?php echo $form->error($model,'score'); ?>
	</div>	
<!-- 
	<div class="row">
		<?php //echo $form->labelEx($model,'cppquestionid'); ?>
        <?php
         /*$ccpcat=Datacomponent::cppquestionlist();
        echo $form->dropDownList($model,'cppquestionid',$ccpcat);
		 echo $form->error($model,'cppquestionid');*/
        ?>	
	</div>
-->


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<div class="title">
<h2>Manage Cpp Answers</h2>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cppanswermaster-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		array(               
        'name'=>'cppanswertxtid',
        'value'=>'($data->cppanswertxt->text)'
        ),
        'score',	
		/*		array(               
        'name'=>'isactive',
        'header'=>'Activation Status',
        'value'=>'($data["isactive"] ? "Active" : "In Active")'
        ),

		'lasteditedon',
		'isactive',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
	'itemsCssClass'=>'hastable',	
)); ?>