<?php
/* @var $this CallerResultController */
/* @var $data CallerResult */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('caller_res_id')); ?>:</b>
	<?php echo CHtml::encode($data->caller_res_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_res_id')); ?>:</b>
	<?php echo CHtml::encode($data->status_res_id); ?>
	<br />


</div>