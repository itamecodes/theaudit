<?php
/* @var $this QuestionmasterController */
/* @var $model Questionmaster */

$this->breadcrumbs=array(
	'Questionmasters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Questionmaster', 'url'=>array('index')),
	array('label'=>'Create Questionmaster', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('questionmaster-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="title">
<h2>Manage Questions</h2><br/>
<?php if($catsubcatname!=''){ ?>
<h3>Category : <?php echo $catsubcatname['category']['name']; ?> </h3>
<h3>Sub-Category : <?php echo $catsubcatname['subcategory']['name']; ?></h3>
<?php } ?>
</div>
<?php 
	if($subcategoryid!='')
	echo CHtml::link('Add Questions',array("questionmaster/create/id/$subcategoryid"));
?>
<br/><br/>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'questionmaster-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'questiontxtid',
			'type'=>'raw',
			'value'=>'$data->questiontxt->text',
		),
		'questionscore',
//		'questweight',
		array(
			'name'=>'cppcatid',
			'type'=>'raw',
			'value'=>'$data->cppcatid==""?"Not Set":$data->cppcat->ccpcatnametxt->text',
		),		
		array(
			'name'=>'categoryid',
			'type'=>'raw',
			'value'=>'$data->subcat->cat->categorynametxt->text',
		),			
		array(
			'name'=>'subcatid',
			'type'=>'raw',
			'value'=>'$data->subcat->subcategorynametxt->text',
		),
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
