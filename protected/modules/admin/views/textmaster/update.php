<?php
/* @var $this TextmasterController */
/* @var $model Textmaster */

$this->breadcrumbs=array(
	'Textmasters'=>array('index'),
	$model->textid=>array('view','id'=>$model->textid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Textmaster', 'url'=>array('index')),
	array('label'=>'Create Textmaster', 'url'=>array('create')),
	array('label'=>'View Textmaster', 'url'=>array('view', 'id'=>$model->textid)),
	array('label'=>'Manage Textmaster', 'url'=>array('admin')),
);
?>

<h1>Update Textmaster <?php echo $model->textid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>