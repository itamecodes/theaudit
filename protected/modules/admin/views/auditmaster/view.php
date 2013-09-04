<?php
/* @var $this AuditmasterController */
/* @var $model Auditmaster */

$this->breadcrumbs=array(
	'Auditmasters'=>array('index'),
	$model->auditid,
);

$this->menu=array(
	array('label'=>'List Auditmaster', 'url'=>array('index')),
	array('label'=>'Create Auditmaster', 'url'=>array('create')),
	array('label'=>'Update Auditmaster', 'url'=>array('update', 'id'=>$model->auditid)),
	array('label'=>'Delete Auditmaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->auditid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Auditmaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>View Auditmaster <?php //echo $model->auditid; ?></h2>
</div>
<?php 
	echo CHtml::link('Audit Score',array("auditprocess/audit/id/$model->auditid"))." | ";
	echo CHtml::link('Audit List',array("auditmaster/admin"));
?>
<br/>
<br/>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'analystid',
			'value'=>$model->analyst->username,
		),
		array(
			'name'=>'institutionid',
			'value'=>$model->institution->institutionnametxt->text,
		),
		array(
			'name'=>'countryid',
			'value'=>$model->country->countryname,
		),
		'status',
	/*	array(
			'name'=>'createdby',
			'value'=>$model->createdby0->username,
		),
		array(
			'name'=>'createdon',
			'value'=>Datacomponent::dateformat($model->createdon),
		),		
		array(
			'name'=>'lasteditedby',
			'value'=>$model->lasteditedby0->username,
		),
		array(
			'name'=>'lasteditedon',
			'value'=>Datacomponent::dateformat($model->lasteditedon),
		),*/
		//'isactive',		
	),
)); ?>
