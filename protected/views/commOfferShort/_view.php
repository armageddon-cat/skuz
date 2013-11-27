<?php
/* @var $this CommOfferShortController */
/* @var $data CommOfferShort */
?>

<div class="view">

	<b><?php //echo CHtml::encode($data->getAttributeLabel('id')); ?></b>
	<?php echo CHtml::link(CHtml::encode('Подробности'), array('ViewSkyz', 'id'=>$data->id)); ?>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_type')); ?>:</b>
	<?php echo CHtml::encode($data->product_type); ?>
	<br />
<?php /*	*/ ?>

</div>