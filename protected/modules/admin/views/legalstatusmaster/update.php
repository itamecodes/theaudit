<?php
/* @var $this LegalstatusmasterController */
/* @var $model Legalstatusmaster */

$this->breadcrumbs=array(
	'Legalstatusmasters'=>array('index'),
	$model->legalstatusid=>array('view','id'=>$model->legalstatusid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Legalstatusmaster', 'url'=>array('index')),
	array('label'=>'Create Legalstatusmaster', 'url'=>array('create')),
	array('label'=>'View Legalstatusmaster', 'url'=>array('view', 'id'=>$model->legalstatusid)),
	array('label'=>'Manage Legalstatusmaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Update Legal Status : <?php echo $model->legalstatusid; ?></h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>