<?php
/* @var $this UserdetailsController */
/* @var $data Userdetails */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('userdetailsid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->userdetailsid), array('view', 'id'=>$data->userdetailsid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userid')); ?>:</b>
	<?php echo CHtml::encode($data->userid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firstname')); ?>:</b>
	<?php echo CHtml::encode($data->firstname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastname')); ?>:</b>
	<?php echo CHtml::encode($data->lastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phoneno')); ?>:</b>
	<?php echo CHtml::encode($data->phoneno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobileno')); ?>:</b>
	<?php echo CHtml::encode($data->mobileno); ?>
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