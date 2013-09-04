<?php
/* @var $this QuestionmasterController */
/* @var $model Questionmaster */

$this->breadcrumbs=array(
	'Questionmasters'=>array('index'),
	$model->questid=>array('view','id'=>$model->questid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Questionmaster', 'url'=>array('index')),
	array('label'=>'Create Questionmaster', 'url'=>array('create')),
	array('label'=>'View Questionmaster', 'url'=>array('view', 'id'=>$model->questid)),
	array('label'=>'Manage Questionmaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Update Questions :<?php echo $model->text_question; ?></h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>