<?php
/* @var $this AnswermasterController */
/* @var $model Answermaster */

$this->breadcrumbs=array(
	'Answermasters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Answermaster', 'url'=>array('index')),
	array('label'=>'Manage Answermaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Add Answer</h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>