<?php
/* @var $this AnswermasterController */
/* @var $model Answermaster */

$this->breadcrumbs=array(
	'Answermasters'=>array('index'),
	$model->answerid,
);

$this->menu=array(
	array('label'=>'List Answermaster', 'url'=>array('index')),
	array('label'=>'Create Answermaster', 'url'=>array('create')),
	array('label'=>'Update Answermaster', 'url'=>array('update', 'id'=>$model->answerid)),
	array('label'=>'Delete Answermaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->answerid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Answermaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>View Answermaster #<?php echo $model->answerid; ?></h2>
</div>
<br/>
<?php 
	echo CHtml::link('Update This',array("answermaster/update/id/$model->answerid"))." | ";
	echo CHtml::link('Answers',array("answermaster/create/id/$model->questid"));
?>
<br/><br/>
<?php $this->widget('zii.widgets.CDetailView', array(
'cssFile' => Yii::app()->theme->baseUrl .'/css/main.css',
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'questid',
		'type'=>'raw',
			'value'=>$model->quest->questiontxt->text,
		),
		array(
			'name'=>'answertxtid',
		'type'=>'raw',
			'value'=>$model->answertxt->text,
		),
		'answerscore',		
/*		array(
			'name'=>'createdby',
			'value'=>$model->createdby0->username,
		),
		array(
			'name'=>'createdon',
			'value'=>Datacomponent::dateformat($model->createdon),
		),
		array(
			'name'=>'lasteditedby',
			'value'=>$model->lasteditedby0->username,
		),
		array(
			'name'=>'lasteditedon',
			'value'=>Datacomponent::dateformat($model->lasteditedon),
		),
		array(
			'name'=>'isactive',
			'value'=>$model->isactive==1?"Active":"Inactive",
		),*/
	),
)); ?>
