<?php
/* @var $this UserdetailsController */
/* @var $model Userdetails */

$this->breadcrumbs=array(
	'Userdetails'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Userdetails', 'url'=>array('index')),
	array('label'=>'Create Userdetails', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('userdetails-grid', {
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
	'id'=>'userdetails-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'userid',
			'value'=>'$data->user->username',
		),
		'firstname',
		'lastname',
		'email',
		'phoneno',	
		'mobileno',
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
