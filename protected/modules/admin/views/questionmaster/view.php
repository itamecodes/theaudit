<?php
/* @var $this QuestionmasterController */
/* @var $model Questionmaster */

$this->breadcrumbs=array(
	'Questionmasters'=>array('index'),
	$model->questid,
);

$this->menu=array(
	array('label'=>'List Questionmaster', 'url'=>array('index')),
	array('label'=>'Create Questionmaster', 'url'=>array('create')),
	array('label'=>'Update Questionmaster', 'url'=>array('update', 'id'=>$model->questid)),
	array('label'=>'Delete Questionmaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->questid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Questionmaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>View Questions</h2>
</div>

<?php 
echo CHtml::link('Answer',array("answermaster/create/id/$model->questid"))." | ";
echo CHtml::link('Update Question',array("questionmaster/update/id/$model->questid"));
?>
<br/><br/>
<?php $this->widget('zii.widgets.CDetailView', array(
    'cssFile' => Yii::app()->theme->baseUrl .'/css/main.css',
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'questiontxtid',
		'type'=>'raw',
			'value'=>$model->questiontxt->text,
		),
		'questionscore',
		'questweight',
		array(
			'name'=>'iscpp',
		
			'value'=>$model->iscpp==1?"Yes":"No",
		),
		array(
			'label'=>'Dimension Name',
		'type'=>'raw',
			'value'=>$model->subcat->cat->categorynametxt->text,
		),		
		array(
			'name'=>'subcatid',
		'type'=>'raw',
			'value'=>$model->subcat->subcategorynametxt->text,
		),
		
		array(
			'name'=>'cppcatid',
		'type'=>'raw',
			'value'=>$model->cppcatid==""?"Not Set":$model->cppcat->ccpcatnametxt->text,
		),
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
