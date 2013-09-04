<?php
/* @var $this SubcategorymasterController */
/* @var $data Subcategorymaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('subcatid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->subcatid), array('view', 'id'=>$data->subcatid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subcategorynametxtid')); ?>:</b>
	<?php echo CHtml::encode($data->subcategorynametxtid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subcategoryweight')); ?>:</b>
	<?php echo CHtml::encode($data->subcategoryweight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('catid')); ?>:</b>
	<?php echo CHtml::encode($data->catid); ?>
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