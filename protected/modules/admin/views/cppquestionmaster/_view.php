<?php
/* @var $this CppquestionmasterController */
/* @var $data Cppquestionmaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cppqid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cppqid), array('view', 'id'=>$data->cppqid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cppquestiontxtid')); ?>:</b>
	<?php echo CHtml::encode($data->cppquestiontxtid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cppdecriptiontxtid')); ?>:</b>
	<?php echo CHtml::encode($data->cppdecriptiontxtid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cppcatid')); ?>:</b>
	<?php echo CHtml::encode($data->cppcatid); ?>
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