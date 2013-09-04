<?php
/* @var $this UsermasterController */
/* @var $model Usermaster */

$this->breadcrumbs=array(
	'Usermasters'=>array('index'),
	$model->userid,
);

$this->menu=array(
	array('label'=>'List Usermaster', 'url'=>array('index')),
	array('label'=>'Create Usermaster', 'url'=>array('create')),
	array('label'=>'Update Usermaster', 'url'=>array('update', 'id'=>$model->userid)),
	array('label'=>'Delete Usermaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->userid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usermaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>View User Details :<?php echo $model->username; ?></h2>
</div>
<?php 
	echo CHtml::link('Update',array("usermaster/update/id/$model->userid"));
?>
<?php $this->widget('zii.widgets.CDetailView', array(
'cssFile' => Yii::app()->theme->baseUrl .'/css/main.css',
	'data'=>$model,
	'attributes'=>array(
		'username',
		'password',
		'usertype',
/*		'createdby',
		'createdon',
		'lasteditedby',
		'lasteditedon',
		'isactive',*/
	),
)); ?>
