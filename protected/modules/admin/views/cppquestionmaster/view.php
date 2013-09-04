<?php
/* @var $this CppquestionmasterController */
/* @var $model Cppquestionmaster */

$this->breadcrumbs=array(
	'Cppquestionmasters'=>array('index'),
	$model->cppqid,
);

$this->menu=array(
	array('label'=>'List Cppquestionmaster', 'url'=>array('index')),
	array('label'=>'Create Cppquestionmaster', 'url'=>array('create')),
	array('label'=>'Update Cppquestionmaster', 'url'=>array('update', 'id'=>$model->cppqid)),
	array('label'=>'Delete Cppquestionmaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cppqid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cppquestionmaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>View Cppquestion</h2>
</div>
<?php 
echo CHtml::link('Update Question',array("cppquestionmaster/update/id/$model->cppqid"));
?>
<br/><br/>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
			array(
            'label'=>'CPP Question Text',
			'type'=>'raw',
            'value'=>$model->cppquestiontxt->text
        ),
        	array(
            'label'=>'CPP Question Description',
        	'type'=>'raw',
            'value'=>$model->cppdecriptiontxt->text
        ),
        	array(
            'label'=>'CPP Category',
        	'type'=>'raw',
            'value'=>$model->cppcat->ccpcatnametxt->text
        ),
/*		array(
            'label'=>'Created By',
            'value'=>$model->createdby0->username
        ),
        	array(
            'label'=>'Created On',
            'value'=>DataComponent::dateFormat($model->createdon)
        ),
	   array(
            'label'=>'Last Edited By',
            'value'=>$model->lasteditedby0->username
        ),
			array(
            'label'=>'Last Edited On',
            'value'=>DataComponent::dateFormat($model->lasteditedon)
        ),
		array(
            
            'label'=>'Activation Status',
            'value'=>($model->isactive==1 ? 'Active' : 'In Active')
        ),*/
	),
)); ?>
