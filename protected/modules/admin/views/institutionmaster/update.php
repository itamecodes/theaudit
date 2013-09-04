<?php
/* @var $this InstitutionmasterController */
/* @var $model Institutionmaster */

$this->breadcrumbs=array(
	'Institutionmasters'=>array('index'),
	$model->institutionid=>array('view','id'=>$model->institutionid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Institutionmaster', 'url'=>array('index')),
	array('label'=>'Create Institutionmaster', 'url'=>array('create')),
	array('label'=>'View Institutionmaster', 'url'=>array('view', 'id'=>$model->institutionid)),
	array('label'=>'Manage Institutionmaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Update Institution :<?php echo $model->institutionnametxt->text; ?></h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>