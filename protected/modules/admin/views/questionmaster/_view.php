<?php
/* @var $this QuestionmasterController */
/* @var $data Questionmaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('questid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->questid), array('view', 'id'=>$data->questid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('questiontxtid')); ?>:</b>
	<?php echo CHtml::encode($data->questiontxtid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('questionscore')); ?>:</b>
	<?php echo CHtml::encode($data->questionscore); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('questweight')); ?>:</b>
	<?php echo CHtml::encode($data->questweight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iscpp')); ?>:</b>
	<?php echo CHtml::encode($data->iscpp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cppcatid')); ?>:</b>
	<?php echo CHtml::encode($data->cppcatid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subcatid')); ?>:</b>
	<?php echo CHtml::encode($data->subcatid); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('createdby')); ?>:</b>
	<?php echo CHtml::encode($data->createdby); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdon')); ?>:</b>
	<?php echo CHtml::encode($data->createdon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lasteditedby')); ?>:</b>
	<?php echo CHtml::encode($data->lasteditedby); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lasteditedon')); ?>:</b>
	<?php echo CHtml::encode($data->lasteditedon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isactive')); ?>:</b>
	<?php echo CHtml::encode($data->isactive); ?>
	<br />

	*/ ?>

</div>