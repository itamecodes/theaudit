<?php
/* @var $this SubcategorymasterController */
/* @var $model Subcategorymaster */

$this->breadcrumbs=array(
	'Subcategorymasters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Subcategorymaster', 'url'=>array('index')),
	array('label'=>'Create Subcategorymaster', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('subcategorymaster-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="title">
<h2>Manage Subcategory <?php echo $categoryname!=''?" : ".$categoryname:"";?></h2>
</div>
<br/>
<?php 
echo CHtml::link('Create Sub-Category',array("subcategorymaster/create"));
?>
<br/><br/>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'subcategorymaster-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
	//	'subcatid',
		array(
			'name'=>'subcategorynametxtid',
			'type'=>'raw',
			'value'=>'$data->subcategorynametxt->text',
		),
//		'subcategoryscore',
		'subcategoryweight',
		array(
			'name'=>'catid',
			'type'=>'raw',
			'value'=>'$data->cat->categorynametxt->text',
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
		),		*/
		
		array(
			'class'=>'CButtonColumn',
		),
	),
	 'itemsCssClass'=>'hastable',
)); ?>
