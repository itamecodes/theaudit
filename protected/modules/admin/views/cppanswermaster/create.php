<?php
/* @var $this CppanswermasterController */
/* @var $model Cppanswermaster */

$this->breadcrumbs=array(
	'Cppanswermasters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cppanswermaster', 'url'=>array('index')),
	array('label'=>'Manage Cppanswermaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Add Answer</h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>