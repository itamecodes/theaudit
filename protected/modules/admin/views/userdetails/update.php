<?php
/* @var $this UserdetailsController */
/* @var $model Userdetails */

$this->breadcrumbs=array(
	'Userdetails'=>array('index'),
	$model->userdetailsid=>array('view','id'=>$model->userdetailsid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Userdetails', 'url'=>array('index')),
	array('label'=>'Create Userdetails', 'url'=>array('create')),
	array('label'=>'View Userdetails', 'url'=>array('view', 'id'=>$model->userdetailsid)),
	array('label'=>'Manage Userdetails', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Update User Details <?php echo $model->userdetailsid; ?></h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>