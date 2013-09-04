<?php
/* @var $this SubcategorymasterController */
/* @var $model Subcategorymaster */

$this->breadcrumbs=array(
	'Subcategorymasters'=>array('index'),
	$model->subcatid=>array('view','id'=>$model->subcatid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Subcategorymaster', 'url'=>array('index')),
	array('label'=>'Create Subcategorymaster', 'url'=>array('create')),
	array('label'=>'View Subcategorymaster', 'url'=>array('view', 'id'=>$model->subcatid)),
	array('label'=>'Manage Subcategorymaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Update Sub Category :<?php echo $model->subcategorynametxt->text; ?></h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>