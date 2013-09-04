<?php
/* @var $this AddressbookController */
/* @var $data Addressbook */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('addressid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->addressid), array('view', 'id'=>$data->addressid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titletxtid')); ?>:</b>
	<?php echo CHtml::encode($data->titletxtid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contactpersonnametxtid')); ?>:</b>
	<?php echo CHtml::encode($data->contactpersonnametxtid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addresstxtid')); ?>:</b>
	<?php echo CHtml::encode($data->addresstxtid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countryid')); ?>:</b>
	<?php echo CHtml::encode($data->countryid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contactnumber')); ?>:</b>
	<?php echo CHtml::encode($data->contactnumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institutionid')); ?>:</b>
	<?php echo CHtml::encode($data->institutionid); ?>
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