<?php
/* @var $this CppquestionmasterController */
/* @var $model Cppquestionmaster */

$this->breadcrumbs=array(
	'Cppquestionmasters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cppquestionmaster', 'url'=>array('index')),
	array('label'=>'Manage Cppquestionmaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Create Cpp Questions</h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>