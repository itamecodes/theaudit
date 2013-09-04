<?php
/* @var $this AnswermasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Answermasters',
);

$this->menu=array(
	array('label'=>'Create Answermaster', 'url'=>array('create')),
	array('label'=>'Manage Answermaster', 'url'=>array('admin')),
);
?>

<h1>Answermasters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
