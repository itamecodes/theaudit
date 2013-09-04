<?php
/* @var $this CategorymasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categorymasters',
);

$this->menu=array(
	array('label'=>'Create Categorymaster', 'url'=>array('create')),
	array('label'=>'Manage Categorymaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Category</h2>
</div>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
