<?php
/* @var $this CppanswermasterController */
/* @var $model Cppanswermaster */

$this->breadcrumbs=array(
	'Cppanswermasters'=>array('index'),
	$model->cppanswerid,
);

$this->menu=array(
	array('label'=>'List Cppanswermaster', 'url'=>array('index')),
	array('label'=>'Create Cppanswermaster', 'url'=>array('create')),
	array('label'=>'Update Cppanswermaster', 'url'=>array('update', 'id'=>$model->cppanswerid)),
	array('label'=>'Delete Cppanswermaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cppanswerid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cppanswermaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>View Cppanswer :<?php echo $model->cppanswertxt->text; ?></h2>
</div>
<?php 
echo CHtml::link('Update Answers',array("cppanswermaster/update/id/$model->cppanswerid"))." | ";
echo CHtml::link('Cpp Answers List',array("cppanswermaster/create"));
?>
<br/><br/>
<?php $this->widget('zii.widgets.CDetailView', array(
'cssFile' => Yii::app()->theme->baseUrl .'/css/main.css',
	'data'=>$model,
	'attributes'=>array(
	
		array(
            'label'=>'CPP Answer',
		'type'=>'raw',
            'value'=>$model->cppanswertxt->text
        ),
       'score',
/*		array(
            
            'label'=>'Created By',
            'value'=>$model->createdby0->username
        ),
			array(
            
            'label'=>'Created On',
            'value'=>DataComponent::dateformat($model->createdon)
        ),
		array(
            
            'label'=>'Last Edited By',
            'value'=>$model->lasteditedby0->username
        ),
	
		array(
            
            'label'=>'Last Edited On',
            'value'=>DataComponent::dateformat($model->lasteditedon)
        ),
		array(
            
            'label'=>'Activation Status',
            'value'=>($model->isactive==1 ? 'Active' : 'In Active')
        ),*/
	),
)); ?>
