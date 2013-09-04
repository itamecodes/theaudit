<?php
/* @var $this LegalstatusmasterController */
/* @var $model Legalstatusmaster */

$this->breadcrumbs=array(
	'Legalstatusmasters'=>array('index'),
	$model->legalstatusid,
);

$this->menu=array(
	array('label'=>'List Legalstatusmaster', 'url'=>array('index')),
	array('label'=>'Create Legalstatusmaster', 'url'=>array('create')),
	array('label'=>'Update Legalstatusmaster', 'url'=>array('update', 'id'=>$model->legalstatusid)),
	array('label'=>'Delete Legalstatusmaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->legalstatusid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Legalstatusmaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>View Legalstatusmaster :<?php echo $model->legalstatustxt->text; ?></h2>
</div>

<?php 
	echo CHtml::link('Update',array("legalstatusmaster/update/id/$model->legalstatusid"));
?>
<?php $this->widget('zii.widgets.CDetailView', array(
'cssFile' => Yii::app()->theme->baseUrl .'/css/main.css',
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'legalstatustxtid',
			'value'=>$model->legalstatustxt->text,
		),
/*		array(
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
