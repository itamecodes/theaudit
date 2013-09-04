<?php
/* @var $this AnswermasterController */
/* @var $data Answermaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('answerid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->answerid), array('view', 'id'=>$data->answerid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answertxtid')); ?>:</b>
	<?php echo CHtml::encode($data->answertxtid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answerscore')); ?>:</b>
	<?php echo CHtml::encode($data->answerscore); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('questid')); ?>:</b>
	<?php echo CHtml::encode($data->questid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdby')); ?>:</b>
	<?php echo CHtml::encode($data->createdby); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdon')); ?>:</b>
	<?php echo CHtml::encode($data->createdon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lasteditedby')); ?>:</b>
	<?php echo CHtml::encode($data->lasteditedby); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('lasteditedon')); ?>:</b>
	<?php echo CHtml::encode($data->lasteditedon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isactive')); ?>:</b>
	<?php echo CHtml::encode($data->isactive); ?>
	<br />

	*/ ?>

</div>