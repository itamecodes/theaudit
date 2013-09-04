<?php
/* @var $this LegalstatusmasterController */
/* @var $data Legalstatusmaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('legalstatusid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->legalstatusid), array('view', 'id'=>$data->legalstatusid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('legalstatustxtid')); ?>:</b>
	<?php echo CHtml::encode($data->legalstatustxtid); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('isactive')); ?>:</b>
	<?php echo CHtml::encode($data->isactive); ?>
	<br />


</div>