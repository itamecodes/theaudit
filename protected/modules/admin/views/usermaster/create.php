<?php
/* @var $this UsermasterController */
/* @var $model Usermaster */

$this->breadcrumbs=array(
	'Usermasters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Usermaster', 'url'=>array('index')),
	array('label'=>'Manage Usermaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Create User</h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>