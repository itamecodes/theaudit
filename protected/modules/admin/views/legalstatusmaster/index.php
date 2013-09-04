<?php
/* @var $this LegalstatusmasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Legalstatusmasters',
);

$this->menu=array(
	array('label'=>'Create Legalstatusmaster', 'url'=>array('create')),
	array('label'=>'Manage Legalstatusmaster', 'url'=>array('admin')),
);
?>

<h1>Legalstatusmasters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
