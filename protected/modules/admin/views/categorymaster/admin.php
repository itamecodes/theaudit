<?php
/* @var $this CategorymasterController */
/* @var $model Categorymaster */

$this->breadcrumbs=array(
	'Categorymasters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Categorymaster', 'url'=>array('index')),
	array('label'=>'Create Categorymaster', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('categorymaster-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="title">
<h2>Manage Category</h2>
</div>
<br/>
<?php 
echo CHtml::link('Create Category',array("categorymaster/create"));
?>
<br/><br/>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'categorymaster-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
	//	'catid',
		array(
			'name'=>'categorynametxtid',
			'type'=>'raw',
			'value'=>'$data->categorynametxt->text',
		),
		'catscore',
/*		array(
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
			'name'=>'isactive',
			'value'=>'$data->isactive==1?"Active":"Inactive"',
		),
		array(
			'name'=>'lasteditedon',
			'value'=>'Datacomponent::dateformat($data->lasteditedon)',
		),		*/		
		array(
			'class'=>'CButtonColumn',
		),
	),
	'itemsCssClass'=>'hastable',
)); 

?>
