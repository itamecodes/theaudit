<?php
/* @var $this CountrymasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Countrymasters',
);

$this->menu=array(
	array('label'=>'Create Countrymaster', 'url'=>array('create')),
	array('label'=>'Manage Countrymaster', 'url'=>array('admin')),
);
?>

<h1>Countrymasters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
