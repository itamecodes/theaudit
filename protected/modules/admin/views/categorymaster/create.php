<?php
/* @var $this CategorymasterController */
/* @var $model Categorymaster */

$this->breadcrumbs=array(
	'Categorymasters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Categorymaster', 'url'=>array('index')),
	array('label'=>'Manage Categorymaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Create Category</h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>