<?php
/* @var $this CountrymasterController */
/* @var $model Countrymaster */

$this->breadcrumbs=array(
	'Countrymasters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Countrymaster', 'url'=>array('index')),
	array('label'=>'Manage Countrymaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Create Countrymaster</h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>