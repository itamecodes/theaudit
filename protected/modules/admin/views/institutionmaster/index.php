<?php
/* @var $this InstitutionmasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Institutionmasters',
);

$this->menu=array(
	array('label'=>'Create Institutionmaster', 'url'=>array('create')),
	array('label'=>'Manage Institutionmaster', 'url'=>array('admin')),
);
?>

<h1>Institutionmasters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
