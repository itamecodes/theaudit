<?php
/* @var $this CppquestionmasterController */
/* @var $model Cppquestionmaster */

$this->breadcrumbs=array(
	'Cppquestionmasters'=>array('index'),
	$model->cppqid=>array('view','id'=>$model->cppqid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cppquestionmaster', 'url'=>array('index')),
	array('label'=>'Create Cppquestionmaster', 'url'=>array('create')),
	array('label'=>'View Cppquestionmaster', 'url'=>array('view', 'id'=>$model->cppqid)),
	array('label'=>'Manage Cppquestionmaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Update Cpp Question</h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>