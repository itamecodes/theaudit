<?php
/* @var $this CppanswermasterController */
/* @var $model Cppanswermaster */

$this->breadcrumbs=array(
	'Cppanswermasters'=>array('index'),
	$model->cppanswerid=>array('view','id'=>$model->cppanswerid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cppanswermaster', 'url'=>array('index')),
	array('label'=>'Create Cppanswermaster', 'url'=>array('create')),
	array('label'=>'View Cppanswermaster', 'url'=>array('view', 'id'=>$model->cppanswerid)),
	array('label'=>'Manage Cppanswermaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Update Cppanswer :<?php echo $model->cppanswertxt->text; ?></h2>
</div>
<?php echo CHtml::link('New Answer',array("cppanswermaster/create/id/$model->cppanswerid"));?>
<br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>