<?php
/* @var $this AuditmasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Auditmasters',
);

$this->menu=array(
	array('label'=>'Create Auditmaster', 'url'=>array('create')),
	array('label'=>'Manage Auditmaster', 'url'=>array('admin')),
);
?>

<h1>Auditmasters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
