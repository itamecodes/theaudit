<?php
/* @var $this CppcategorymasterController */
/* @var $model Cppcategorymaster */

$this->breadcrumbs=array(
	'Cppcategorymasters'=>array('index'),
	$model->cppcatid,
);

$this->menu=array(
	array('label'=>'List Cppcategorymaster', 'url'=>array('index')),
	array('label'=>'Create Cppcategorymaster', 'url'=>array('create')),
	array('label'=>'Update Cppcategorymaster', 'url'=>array('update', 'id'=>$model->cppcatid)),
	array('label'=>'Delete Cppcategorymaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cppcatid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cppcategorymaster', 'url'=>array('admin')),
);
?>
<div class="title">
<h2>View Cpp Category :<?php echo $model->ccpcatnametxt->text; ?></h2>
</div>

<?php 
	echo CHtml::link('Update',array("cppcategorymaster/update/id/$model->cppcatid"))." | ";
	echo CHtml::link('Questions',array("cppquestionmaster/create/id/$model->cppcatid"));
?>
<br/><br/>
<?php $this->widget('zii.widgets.CDetailView', array(
'cssFile' => Yii::app()->theme->baseUrl .'/css/main.css',
	'data'=>$model,
	'attributes'=>array(
			array(
            'label'=>'CPP Category Name',
			'type'=>'raw',
            'value'=>$model->ccpcatnametxt->text
        ),
        	array(
            'label'=>'CPP Category Description',
        	'type'=>'raw',
            'value'=>$model->cppcatdesctxt->text
        ),
/*		 array(
            
            'label'=>'Activation Status',
            'value'=>($model->isactive==1 ? 'Active' : 'In Active')
        ),
			array(
            
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
        ),*/
	),
)); ?>
