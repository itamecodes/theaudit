<?php
/* @var $this TextmasterController */
/* @var $model Textmaster */

$this->breadcrumbs=array(
	'Textmasters'=>array('index'),
	$model->textid,
);

$this->menu=array(
	array('label'=>'List Textmaster', 'url'=>array('index')),
	array('label'=>'Create Textmaster', 'url'=>array('create')),
	array('label'=>'Update Textmaster', 'url'=>array('update', 'id'=>$model->textid)),
	array('label'=>'Delete Textmaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->textid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Textmaster', 'url'=>array('admin')),
);
?>

<h1>View Textmaster #<?php echo $model->textid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'textid',
		'text',
		'createdby',
		'createdon',
		'lasteditedby',
		'lasteditedon',
		'isactive',
	),
)); ?>
