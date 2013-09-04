<?php
/* @var $this AuditmasterController */
/* @var $model Auditmaster */

$this->breadcrumbs=array(
	'Auditmasters'=>array('index'),
	$model->auditid=>array('view','id'=>$model->auditid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Auditmaster', 'url'=>array('index')),
	array('label'=>'Create Auditmaster', 'url'=>array('create')),
	array('label'=>'View Auditmaster', 'url'=>array('view', 'id'=>$model->auditid)),
	array('label'=>'Manage Auditmaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Update Auditmaster <?php echo $model->auditid; ?></h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>