<?php
/* @var $this CppcategorymasterController */
/* @var $model Cppcategorymaster */

$this->breadcrumbs=array(
	'Cppcategorymasters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cppcategorymaster', 'url'=>array('index')),
	array('label'=>'Manage Cppcategorymaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Create Cpp Category</h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>