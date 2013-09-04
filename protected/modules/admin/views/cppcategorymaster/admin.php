<?php
/* @var $this CppcategorymasterController */
/* @var $model Cppcategorymaster */

$this->breadcrumbs=array(
	'Cppcategorymasters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Cppcategorymaster', 'url'=>array('index')),
	array('label'=>'Create Cppcategorymaster', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cppcategorymaster-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="title">
<h2>Manage Cpp Category</h2>
</div>
<br/>
<?php 
echo CHtml::link('Create CPP Category',array("cppcategorymaster/create"));
?>
<br/><br/>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cppcategorymaster-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
			array(               
        'name'=>'ccpcatnametxtid',
			'type'=>'raw',
        'value'=>'($data->ccpcatnametxt->text)'
        ),
        	array(               
        'name'=>'cppcatdesctxtid',
        	'type'=>'raw',
        'value'=>'($data->cppcatdesctxt->text)'
        ),
		
/*		array(               
        'name'=>'isactive',
        'header'=>'Activation Status',
        'value'=>'($data["isactive"] ? "Active" : "In Active")'
        ),
        
		array(               
        'name'=>'createdby',
        'header'=>'Created By',
        'value'=>'($data->createdby0->username)'
        ),
	
		
		
		'lasteditedby',
		'lasteditedon',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
  'itemsCssClass'=>'hastable',	
)); ?>
