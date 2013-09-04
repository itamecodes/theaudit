<?php
/* @var $this AuditmasterController */
/* @var $model Auditmaster */

$this->breadcrumbs=array(
	'Auditmasters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Auditmaster', 'url'=>array('index')),
	array('label'=>'Manage Auditmaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Create Auditmaster</h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>