<?php
/* @var $this UsermasterController */
/* @var $model Usermaster */

$this->breadcrumbs=array(
	'Usermasters'=>array('admin'),
	$model->username=>array('view','id'=>$model->userid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Usermaster', 'url'=>array('index')),
	array('label'=>'Create Usermaster', 'url'=>array('create')),
	array('label'=>'View Usermaster', 'url'=>array('view', 'id'=>$model->userid)),
	array('label'=>'Manage Usermaster', 'url'=>array('admin')),
);
?>
<div class="title">
<?php 
$lable=($model->userid==Yii::app()->user->getId())?"Update Profile":"Update User";
?>
<h2><?php echo $lable." : ".$model->username; ?></h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>