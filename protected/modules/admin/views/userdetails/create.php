<?php
/* @var $this UserdetailsController */
/* @var $model Userdetails */

$this->breadcrumbs=array(
	'Userdetails'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Userdetails', 'url'=>array('index')),
	array('label'=>'Manage Userdetails', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Create Userdetails</h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>