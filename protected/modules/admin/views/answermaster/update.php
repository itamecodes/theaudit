<?php
/* @var $this AnswermasterController */
/* @var $model Answermaster */

$this->breadcrumbs=array(
	'Answermasters'=>array('index'),
	$model->answerid=>array('view','id'=>$model->answerid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Answermaster', 'url'=>array('index')),
	array('label'=>'Create Answermaster', 'url'=>array('create')),
	array('label'=>'View Answermaster', 'url'=>array('view', 'id'=>$model->answerid)),
	array('label'=>'Manage Answermaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Update Answermaster</h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>