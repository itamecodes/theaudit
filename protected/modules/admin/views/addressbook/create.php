<?php
/* @var $this AddressbookController */
/* @var $model Addressbook */

$this->breadcrumbs=array(
	'Addressbooks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Addressbook', 'url'=>array('index')),
	array('label'=>'Manage Addressbook', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>Create Address :<?php echo $model->institution->institutionnametxt->text; ?></h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>