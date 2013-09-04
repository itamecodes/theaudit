<?php
/* @var $this UserdetailsController */
/* @var $model Userdetails */

$this->breadcrumbs=array(
	'Userdetails'=>array('admin'),
	$model->user->username,
);

$this->menu=array(
	array('label'=>'List Userdetails', 'url'=>array('index')),
	array('label'=>'Create Userdetails', 'url'=>array('create')),
	array('label'=>'Update Userdetails', 'url'=>array('update', 'id'=>$model->userdetailsid)),
	array('label'=>'Delete Userdetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->userdetailsid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Userdetails', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>View User Details : <?php echo $model->user->username; ?></h2>
</div>
<br/>
<?php 
$lable=($model->userid==Yii::app()->user->getId())?"Update Profile":"Update User";
echo CHtml::link($lable,array("usermaster/update/id/$model->userdetailsid"));
?>
<br/><br/>
<?php $this->widget('zii.widgets.CDetailView', array(
'cssFile' => Yii::app()->theme->baseUrl .'/css/main.css',
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'userid',
			'value'=>$model->user->username,
		),		
		'firstname',
		'lastname',
		'email',
		'phoneno',
		'mobileno',
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
		),*/
//		'isactive',
	),
)); ?>
