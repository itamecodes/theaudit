<?php
/* @var $this SubcategorymasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Subcategorymasters',
);

$this->menu=array(
	array('label'=>'Create Subcategorymaster', 'url'=>array('create')),
	array('label'=>'Manage Subcategorymaster', 'url'=>array('admin')),
);
?>

<h1>Subcategory</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
