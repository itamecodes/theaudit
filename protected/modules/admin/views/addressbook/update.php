<?php
/* @var $this AddressbookController */
/* @var $model Addressbook */

$this->breadcrumbs=array(
	'Addressbooks'=>array('index'),
	$model->addressid=>array('view','id'=>$model->addressid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Addressbook', 'url'=>array('index')),
	array('label'=>'Create Addressbook', 'url'=>array('create')),
	array('label'=>'View Addressbook', 'url'=>array('view', 'id'=>$model->addressid)),
	array('label'=>'Manage Addressbook', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Update Addressbook <?php echo $model->titletxt->text; ?></h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>