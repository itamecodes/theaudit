<?php
/* @var $this SubcategorymasterController */
/* @var $model Subcategorymaster */

$this->breadcrumbs=array(
	'Subcategorymasters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Subcategorymaster', 'url'=>array('index')),
	array('label'=>'Manage Subcategorymaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Create Sub Category</h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>