<?php
/* @var $this InstitutionmasterController */
/* @var $model Institutionmaster */

$this->breadcrumbs=array(
	'Institutionmasters'=>array('index'),
	$model->institutionid,
);

$this->menu=array(
	array('label'=>'List Institutionmaster', 'url'=>array('index')),
	array('label'=>'Create Institutionmaster', 'url'=>array('create')),
	array('label'=>'Update Institutionmaster', 'url'=>array('update', 'id'=>$model->institutionid)),
	array('label'=>'Delete Institutionmaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->institutionid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Institutionmaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>View Institutionmaster :<?php echo $model->institutionnametxt->text; ?></h2>
</div>

<?php 
	echo CHtml::link('Update',array("institutionmaster/update/id/$model->institutionid"))." | ";
	echo CHtml::link('Address',array("addressbook/admin/id/$model->institutionid"))." | ";
?>
<?php $this->widget('zii.widgets.CDetailView', array(
'cssFile' => Yii::app()->theme->baseUrl .'/css/main.css',
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'institutionnametxtid',
		'type'=>'raw',
			'value'=>$model->institutionnametxt->text,
		),
		array(
			'name'=>'legalstatusid',
		'type'=>'raw',
			'value'=>$model->legalstatus->legalstatustxt->text,
		),
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
		),
		array(
			'name'=>'isactive',
			'value'=>$model->isactive==1?"Active":"Inactive",
		),*/
	),
)); ?>
