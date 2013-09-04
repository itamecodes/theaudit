<?php
/* @var $this LegalstatusmasterController */
/* @var $model Legalstatusmaster */

$this->breadcrumbs=array(
	'Legalstatusmasters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Legalstatusmaster', 'url'=>array('index')),
	array('label'=>'Create Legalstatusmaster', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('legalstatusmaster-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="title">
<h2>Manage Legalstatusmasters</h2>
</div>
<br/>
<?php 
echo CHtml::link('Create Legal Status',array("legalstatusmaster/create"));
?>
<br/><br/>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'legalstatusmaster-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		'legalstatusid',
		array(
			'name'=>'legalstatustxtid',
			'value'=>'$data->legalstatustxt->text',
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
