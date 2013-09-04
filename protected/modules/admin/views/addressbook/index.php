<?php
/* @var $this AddressbookController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Addressbooks',
);

$this->menu=array(
	array('label'=>'Create Addressbook', 'url'=>array('create')),
	array('label'=>'Manage Addressbook', 'url'=>array('admin')),
);
?>

<h1>Addressbooks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
