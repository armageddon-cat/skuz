<?php
/* @var $this CommOfferContextController */
/* @var $data CommOfferContext */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bussiness_theme')); ?>:</b>
	<?php echo CHtml::encode($data->bussiness_theme); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('adv_budget')); ?>:</b>
	<?php echo CHtml::encode($data->adv_budget); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seo_systems')); ?>:</b>
	<?php echo CHtml::encode($data->seo_systems); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('geo_time_targeting')); ?>:</b>
	<?php echo CHtml::encode($data->geo_time_targeting); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('theme_priority')); ?>:</b>
	<?php echo CHtml::encode($data->theme_priority); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price_wanted')); ?>:</b>
	<?php echo CHtml::encode($data->price_wanted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	*/ ?>

</div>