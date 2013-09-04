<?php
/* @var $this CategorymasterController */
/* @var $model Categorymaster */

$this->breadcrumbs=array(
	'Categorymasters'=>array('index'),
	$model->catid=>array('view','id'=>$model->catid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Categorymaster', 'url'=>array('index')),
	array('label'=>'Create Categorymaster', 'url'=>array('create')),
	array('label'=>'View Categorymaster', 'url'=>array('view', 'id'=>$model->catid)),
	array('label'=>'Manage Categorymaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Update Category :<?php echo $model->categorynametxt->text; ?></h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>