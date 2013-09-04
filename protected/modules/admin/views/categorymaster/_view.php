<?php
/* @var $this CategorymasterController */
/* @var $data Categorymaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('catid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->catid), array('view', 'id'=>$data->catid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categorynametxtid')); ?>:</b>
	<?php echo CHtml::encode($data->categorynametxtid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('catscore')); ?>:</b>
	<?php echo CHtml::encode($data->catscore); ?>
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