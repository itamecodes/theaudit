<?php
/* @var $this InstitutionmasterController */
/* @var $model Institutionmaster */

$this->breadcrumbs=array(
	'Institutionmasters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Institutionmaster', 'url'=>array('index')),
	array('label'=>'Create Institutionmaster', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('institutionmaster-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="title">
<h2>Manage Institutions</h2>
</div>
<br/>
<?php 
echo CHtml::link('Create Institute',array("institutionmaster/create"));
?>
<br/><br/>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'institutionmaster-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
	//	'institutionid',
		array(
			'name'=>'institutionnametxtid',
		'type'=>'raw',
			'value'=>'$data->institutionnametxt->text',
		),
		array(
			'name'=>'legalstatusid',
		'type'=>'raw',
			'value'=>'$data->legalstatus->legalstatustxt->text',
		),
	/*	array(
			'name'=>'createdby',
			'value'=>'$data->createdby0->username',
		),
		array(
			'name'=>'createdon',
			'value'=>'Datacomponent::dateformat($data->createdon)',
		),
		array(
			'name'=>'lasteditedby',
			'value'=>'$data->lasteditedby0->username',
		),		
		array(
			'name'=>'lasteditedon',
			'value'=>'Datacomponent::dateformat($data->lasteditedon)',
		),
		array(
			'name'=>'isactive',
			'value'=>'$data->isactive==1?"Active":"Inactive"',
		),*/
		
		array(
			'class'=>'CButtonColumn',
		),
	),
	 'itemsCssClass'=>'hastable',
)); ?>
