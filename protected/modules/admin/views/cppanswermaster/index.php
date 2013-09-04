<?php
/* @var $this CppanswermasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cppanswermasters',
);

$this->menu=array(
	array('label'=>'Create Cppanswermaster', 'url'=>array('create')),
	array('label'=>'Manage Cppanswermaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Cppanswermasters</h2>
</div>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
