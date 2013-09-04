<?php
/* @var $this InstitutionmasterController */
/* @var $data Institutionmaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('institutionid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->institutionid), array('view', 'id'=>$data->institutionid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institutionnametxtid')); ?>:</b>
	<?php echo CHtml::encode($data->institutionnametxtid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('legalstatusid')); ?>:</b>
	<?php echo CHtml::encode($data->legalstatusid); ?>
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