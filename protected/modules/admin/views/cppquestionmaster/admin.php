<?php
/* @var $this CppquestionmasterController */
/* @var $model Cppquestionmaster */

$this->breadcrumbs=array(
	'Cppquestionmasters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Cppquestionmaster', 'url'=>array('index')),
	array('label'=>'Create Cppquestionmaster', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cppquestionmaster-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="title">
<h2>Manage Cpp Questions</h2>
</div>

<br/>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cppquestionmaster-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
			array(               
        'name'=>'cppquestiontxtid',
			'type'=>'raw',
        'value'=>'($data->cppquestiontxt->text)'
        ),
			array(               
        'name'=>'cppdecriptiontxtid',
			'type'=>'raw',
        'value'=>'($data->cppdecriptiontxt->text)'
        ),
			array(               
        'name'=>'cppcatid',
			'type'=>'raw',
        'value'=>'($data->cppcat->ccpcatnametxt->text)'
        ),
	/*		array(
            'name'=>'createdby',
            'value'=>'($data->createdby0->username)'
        ),				
	
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
