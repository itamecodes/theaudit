<?php
/* @var $this CountrymasterController */
/* @var $data Countrymaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('countryid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->countryid), array('view', 'id'=>$data->countryid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countryname')); ?>:</b>
	<?php echo CHtml::encode($data->countryname); ?>
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