<?php
/* @var $this SubcategorymasterController */
/* @var $model Subcategorymaster */

$this->breadcrumbs=array(
	'Subcategorymasters'=>array('index'),
	$model->subcatid,
);

$this->menu=array(
	array('label'=>'List Subcategorymaster', 'url'=>array('index')),
	array('label'=>'Create Subcategorymaster', 'url'=>array('create')),
	array('label'=>'Update Subcategorymaster', 'url'=>array('update', 'id'=>$model->subcatid)),
	array('label'=>'Delete Subcategorymaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->subcatid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Subcategorymaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>View Subcategory :<?php echo $model->subcategorynametxt->text; ?></h2>
</div>

<?php 
	echo CHtml::link('Update',array("subcategorymaster/update/id/$model->subcatid"))." | ";
	echo CHtml::link('Questions',array("questionmaster/admin/id/$model->subcatid"));
?>
<br/><br/>
<?php $this->widget('zii.widgets.CDetailView', array(
'cssFile' => Yii::app()->theme->baseUrl .'/css/main.css',
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'subcategorynametxtid',
		'type'=>'raw',
			'value'=>$model->subcategorynametxt->text,
		),
		//'subcategoryscore',
		'subcategoryweight',
		array(
			'name'=>'catid',
		'type'=>'raw',
			'value'=>$model->cat->categorynametxt->text,
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
			'value'=>$model->isactive==1?'Active':'Inactive',
		),*/
	),
)); ?>
