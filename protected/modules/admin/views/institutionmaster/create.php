<?php
/* @var $this InstitutionmasterController */
/* @var $model Institutionmaster */

$this->breadcrumbs=array(
	'Institutionmasters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Institutionmaster', 'url'=>array('index')),
	array('label'=>'Manage Institutionmaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Create Institution</h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>