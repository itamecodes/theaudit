<?php
/* @var $this TextmasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Textmasters',
);

$this->menu=array(
	array('label'=>'Create Textmaster', 'url'=>array('create')),
	array('label'=>'Manage Textmaster', 'url'=>array('admin')),
);
?>

<h1>Textmasters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
