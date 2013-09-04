<?php
/* @var $this CppcategorymasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cppcategorymasters',
);

$this->menu=array(
	array('label'=>'Create Cppcategorymaster', 'url'=>array('create')),
	array('label'=>'Manage Cppcategorymaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Cppcategorymasters</h2>
</div>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
