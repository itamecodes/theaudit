<?php
/* @var $this CppcategorymasterController */
/* @var $model Cppcategorymaster */

$this->breadcrumbs=array(
	'Cppcategorymasters'=>array('index'),
	$model->cppcatid=>array('view','id'=>$model->cppcatid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cppcategorymaster', 'url'=>array('index')),
	array('label'=>'Create Cppcategorymaster', 'url'=>array('create')),
	array('label'=>'View Cppcategorymaster', 'url'=>array('view', 'id'=>$model->cppcatid)),
	array('label'=>'Manage Cppcategorymaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Update Cpp Category :<?php echo $model->ccpcatnametxt->text; ?></h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>