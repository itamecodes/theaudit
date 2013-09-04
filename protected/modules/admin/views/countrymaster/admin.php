<?php
/* @var $this CountrymasterController */
/* @var $model Countrymaster */

$this->breadcrumbs=array(
	'Countrymasters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Countrymaster', 'url'=>array('index')),
	array('label'=>'Create Countrymaster', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('countrymaster-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="title">
<h2>Manage Countrymasters</h2>
</div>
<br/>
<?php 
echo CHtml::link('Create Country',array("countrymaster/create"));
?>
<br/><br/>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'countrymaster-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'countryid',
		'countryname',
	/*		'createdby',
		'createdon',
		'lasteditedby',
		'lasteditedon',
	
		'isactive',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
	'itemsCssClass'=>'hastable',
)); ?>
