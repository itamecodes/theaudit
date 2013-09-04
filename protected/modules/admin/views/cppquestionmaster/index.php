<?php
/* @var $this CppquestionmasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cppquestionmasters',
);

$this->menu=array(
	array('label'=>'Create Cppquestionmaster', 'url'=>array('create')),
	array('label'=>'Manage Cppquestionmaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Cpp Question</h2>
</div>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
