<?php
/* @var $this TextmasterController */
/* @var $model Textmaster */

$this->breadcrumbs=array(
	'Textmasters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Textmaster', 'url'=>array('index')),
	array('label'=>'Manage Textmaster', 'url'=>array('admin')),
);
?>

<h1>Create Textmaster</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>