<?php
/* @var $this SeoreportController */
/* @var $data Seoreport */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('keyword_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->keyword_id), array('view', 'id'=>$data->keyword_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spent_seopult')); ?>:</b>
	<?php echo CHtml::encode($data->spent_seopult); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spent_sape')); ?>:</b>
	<?php echo CHtml::encode($data->spent_sape); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spent_seopult_client')); ?>:</b>
	<?php echo CHtml::encode($data->spent_seopult_client); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spent_sape_client')); ?>:</b>
	<?php echo CHtml::encode($data->spent_sape_client); ?>
	<br />


</div>