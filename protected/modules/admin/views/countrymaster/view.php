<?php
/* @var $this CountrymasterController */
/* @var $model Countrymaster */

$this->breadcrumbs=array(
	'Countrymasters'=>array('index'),
	$model->countryid,
);

$this->menu=array(
	array('label'=>'List Countrymaster', 'url'=>array('index')),
	array('label'=>'Create Countrymaster', 'url'=>array('create')),
	array('label'=>'Update Countrymaster', 'url'=>array('update', 'id'=>$model->countryid)),
	array('label'=>'Delete Countrymaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->countryid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Countrymaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>View Country :<?php echo $model->countryid; ?></h2>
</div>

<?php 
	echo CHtml::link('Update',array("countrymaster/update/id/$model->countryid"));
?>
<?php $this->widget('zii.widgets.CDetailView', array(
'cssFile' => Yii::app()->theme->baseUrl .'/css/main.css',
	'data'=>$model,
	'attributes'=>array(
		'countryname',
/*		'createdby',
		'createdon',
		'lasteditedby',
		'lasteditedon',
		'isactive',*/
	),
)); ?>
