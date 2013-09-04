<?php
/* @var $this AnswermasterController */
/* @var $model Answermaster */

$this->breadcrumbs=array(
	'Answermasters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Answermaster', 'url'=>array('index')),
	array('label'=>'Create Answermaster', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('answermaster-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="title">
<h2>Manage Answermasters</h2>
</div>
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
/*		array(
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
			'name'=>'isactive',
			'value'=>'$data->isactive==1?"Active":"Inactive"',
		),		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
	'itemsCssClass'=>'hastable',
)); ?>
