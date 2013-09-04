<?php
/* @var $this AuditmasterController */
/* @var $model Auditmaster */

$this->breadcrumbs=array(
	'Auditmasters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Auditmaster', 'url'=>array('index')),
	array('label'=>'Create Auditmaster', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('auditmaster-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="title">
<h2>Manage Audits</h2>
</div>
<br/>
<?php 
echo CHtml::link('Create Audit',array("auditmaster/create"));
?>
<br/><br/>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'auditmaster-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'analystid',
			'value'=>'$data->analyst->username',
		),
		array(
			'name'=>'institutionid',
			'value'=>'$data->institution->institutionnametxt->text',
		),
		array(
			'name'=>'countryid',
			'value'=>'$data->country->countryname',
		),
		'status',
/*		array(
			'name'=>'createdby',
			'value'=>'$data->createdby0->username',
		),
		array(
			'name'=>'createdon',
			'value'=>'Datacomponent::dateformat($data->createdon)',
		),
		'status',
		'lasteditedby',
		'lasteditedon',		
		'isactive',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete} | {Reports}',
			'buttons'=>array(
				'view'=>array(				
					'url'=>'Yii::app()->createAbsoluteUrl("admin/auditprocess/audit",array("id"=>$data->auditid))',
				),
				'Reports'=>array(
					'url'=>'Yii::app()->createAbsoluteUrl("report/index",array("id"=>$data->auditid))',
				),
			),
		),
	),
	 'itemsCssClass'=>'hastable',
)); ?>

