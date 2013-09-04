<?php
/* @var $this UsermasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usermasters',
);

$this->menu=array(
	array('label'=>'Create Usermaster', 'url'=>array('create')),
	array('label'=>'Manage Usermaster', 'url'=>array('admin')),
);
?>

<h1>Usermasters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
