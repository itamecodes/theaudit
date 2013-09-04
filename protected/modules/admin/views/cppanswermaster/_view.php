<?php
/* @var $this CppanswermasterController */
/* @var $data Cppanswermaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cppanswerid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cppanswerid), array('view', 'id'=>$data->cppanswerid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cppanswertxtid')); ?>:</b>
	<?php echo CHtml::encode($data->cppanswertxtid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cppquestionid')); ?>:</b>
	<?php echo CHtml::encode($data->cppquestionid); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('lasteditedon')); ?>:</b>
	<?php echo CHtml::encode($data->lasteditedon); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('isactive')); ?>:</b>
	<?php echo CHtml::encode($data->isactive); ?>
	<br />

	*/ ?>

</div>