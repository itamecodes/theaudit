<?php
/* @var $this CppcategorymasterController */
/* @var $data Cppcategorymaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cppcatid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cppcatid), array('view', 'id'=>$data->cppcatid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ccpcatnametxtid')); ?>:</b>
	<?php echo CHtml::encode($data->ccpcatnametxtid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cppcatdesctxtid')); ?>:</b>
	<?php echo CHtml::encode($data->cppcatdesctxtid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isactive')); ?>:</b>
	<?php echo CHtml::encode($data->isactive); ?>
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

	*/ ?>

</div>