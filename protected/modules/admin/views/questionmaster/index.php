<?php
/* @var $this QuestionmasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Questionmasters',
);

$this->menu=array(
	array('label'=>'Create Questionmaster', 'url'=>array('create')),
	array('label'=>'Manage Questionmaster', 'url'=>array('admin')),
);
?>

<h1>Questionmasters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
