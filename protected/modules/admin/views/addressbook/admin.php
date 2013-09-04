<?php
/* @var $this AddressbookController */
/* @var $model Addressbook */

$this->breadcrumbs=array(
	'Addressbooks'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Addressbook', 'url'=>array('index')),
	array('label'=>'Create Addressbook', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('addressbook-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="title">
<h2>Manage Addressbooks</h2>
</div>
<?php 
	echo CHtml::link('Create',array("addressbook/create/id/$instituteid"))." | ";
	echo CHtml::link('View Institute',array("institutionmaster/view/id/$instituteid"));
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'addressbook-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		'addressid',
		array(
			'name'=>'titletxtid',
			'value'=>'$data->titletxt->text',
		),
		array(
			'name'=>'contactpersonnametxtid',
			'value'=>'$data->contactpersonnametxt->text',
		),		
		array(
			'name'=>'addresstxtid',
			'value'=>'$data->addresstxt->text',
		),		
		array(
			'name'=>'countryid',
			'value'=>'$data->country->countryname',
		),
		'contactnumber',		
		array(
			'name'=>'institutionid',
			'value'=>'$data->institution->institutionnametxt->text',
		),
/*		array(
			'name'=>'createdby',
			'value'=>'$data->createdby0->username',
		),
		array(
			'name'=>'createdon',
			'value'=>'Datacomponent::Dateformat($data->createdon)',
		),
		array(
			'name'=>'lasteditedby',
			'value'=>'$data->lasteditedby0->username',
		),
		array(
			'name'=>'lasteditedon',
			'value'=>'Datacomponent::dateformat($data->lasteditedon)',
		),*/
				
		array(
			'class'=>'CButtonColumn',
		),
	),
	  'itemsCssClass'=>'hastable',
)); ?>
