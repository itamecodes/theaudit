<?php
/* @var $this UsermasterController */
/* @var $model Usermaster */

$this->breadcrumbs=array(
	'Usermasters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Usermaster', 'url'=>array('index')),
	array('label'=>'Create Usermaster', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('usermaster-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="title">
<h2>Manage Usermasters</h2>
</div>
<br/>
<?php 
echo CHtml::link('Create User',array("usermaster/create"));
?>
<br/><br/>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usermaster-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'userid',
		'username',
		'password',
		'usertype',
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
