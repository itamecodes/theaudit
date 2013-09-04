<?php
/* @var $this QuestionmasterController */
/* @var $model Questionmaster */

$this->breadcrumbs=array(
	'Questionmasters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Questionmaster', 'url'=>array('index')),
	array('label'=>'Manage Questionmaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Create Question</h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>