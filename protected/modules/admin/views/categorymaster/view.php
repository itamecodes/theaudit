<?php
/* @var $this CategorymasterController */
/* @var $model Categorymaster */

$this->breadcrumbs=array(
	'Categorymasters'=>array('index'),
	$model->catid,
);

$this->menu=array(
	array('label'=>'List Categorymaster', 'url'=>array('index')),
	array('label'=>'Create Categorymaster', 'url'=>array('create')),
	array('label'=>'Update Categorymaster', 'url'=>array('update', 'id'=>$model->catid)),
	array('label'=>'Delete Categorymaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->catid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Categorymaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>View Category :<?php echo $model->categorynametxt->text; ?></h2>
</div>
<?php 
	echo CHtml::link('Update',array("categorymaster/update/id/$model->catid"))." | ";
	echo CHtml::link('Sub-Category',array("subcategorymaster/admin/id/$model->catid"));
?>

<?php $this->widget('zii.widgets.CDetailView', array(
'cssFile' => Yii::app()->theme->baseUrl .'/css/main.css',
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'categorynametxtid',
		'type'=>'raw',
			'value'=>$model->categorynametxt->text,
		),
		'catscore',
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
			'value'=>$model->isactive==1?'Active':'Inactive',
		),*/
	),
)); ?>
