<?php
/* @var $this AddressbookController */
/* @var $model Addressbook */

$this->breadcrumbs=array(
	'Addressbooks'=>array('index'),
	$model->addressid,
);

$this->menu=array(
	array('label'=>'List Addressbook', 'url'=>array('index')),
	array('label'=>'Create Addressbook', 'url'=>array('create')),
	array('label'=>'Update Addressbook', 'url'=>array('update', 'id'=>$model->addressid)),
	array('label'=>'Delete Addressbook', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->addressid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Addressbook', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>View Addressbook :<?php echo $model->titletxt->text; ?></h2>
</div>
<?php 
	echo CHtml::link('Update',array("addressbook/update/id/$model->addressid"))." | ";
	echo CHtml::link('View Institute',array("institutionmaster/view/id/$model->institutionid"));
?>
<br/>
<br/>
<?php $this->widget('zii.widgets.CDetailView', array(
'cssFile' => Yii::app()->theme->baseUrl .'/css/main.css',
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'titletxtid',
			'value'=>$model->titletxt->text,
		),
		array(
			'name'=>'contactpersonnametxtid',
			'value'=> (isset($model->contactpersonnametxtid) && $model->contactpersonnametxtid!='')?$model->contactpersonnametxt->text:'Not Set',
		),
		array(
			'name'=>'addresstxtid',
			'value'=>isset($model->addresstxtid) && $model->addresstxtid!='' ?$model->addresstxt->text:'Not Set',
		),
		array(
			'name'=>'countryid',
			'value'=>isset($model->countryid) && $model->countryid!=''?$model->country->countryname:'Not Set',
		),
		'contactnumber',
		array(
			'name'=>'institutionid',
			'value'=>$model->institution->institutionnametxt->text,		
		),		
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
		),
		array(
			'name'=>'isactive',
			'value'=>$model->isactive==1?"Active":"Inactive",
		),*/
	),
)); ?>
