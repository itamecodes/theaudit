<?php
/* @var $this CppanswermasterController */
/* @var $model Cppanswermaster */

$this->breadcrumbs=array(
	'Cppanswermasters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Cppanswermaster', 'url'=>array('index')),
	array('label'=>'Create Cppanswermaster', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cppanswermaster-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="title">
<h2>Manage Cpp Answers</h2>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cppanswermaster-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		array(               
        'name'=>'cppanswertxtid',
		'type'=>'raw',
        'value'=>'($data->cppanswertxt->text)'
        ),
        array(               
        'name'=>'cppanswertxtid',
        'type'=>'raw',
        'value'=>'($data->cppquestion->cppquestiontxt->text)'
        ),	
		/*		array(               
        'name'=>'isactive',
        'header'=>'Activation Status',
        'value'=>'($data["isactive"] ? "Active" : "In Active")'
        ),

		'lasteditedon',
		'isactive',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
	'itemsCssClass'=>'hastable',	
)); ?>
