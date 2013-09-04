<?php
/* @var $this CountrymasterController */
/* @var $model Countrymaster */

$this->breadcrumbs=array(
	'Countrymasters'=>array('index'),
	$model->countryid=>array('view','id'=>$model->countryid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Countrymaster', 'url'=>array('index')),
	array('label'=>'Create Countrymaster', 'url'=>array('create')),
	array('label'=>'View Countrymaster', 'url'=>array('view', 'id'=>$model->countryid)),
	array('label'=>'Manage Countrymaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Update Countrymaster <?php echo $model->countryid; ?></h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>