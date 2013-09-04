<?php
/* @var $this LegalstatusmasterController */
/* @var $model Legalstatusmaster */

$this->breadcrumbs=array(
	'Legalstatusmasters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Legalstatusmaster', 'url'=>array('index')),
	array('label'=>'Manage Legalstatusmaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Create Legalstatusmaster</h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>