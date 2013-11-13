<?php
/* @var $this KeywordPositionController */
/* @var $data KeywordPosition */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keyword_id')); ?>:</b>
	<?php echo CHtml::encode($data->keyword_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keyword_position')); ?>:</b>
	<?php echo CHtml::encode($data->keyword_position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('engine')); ?>:</b>
	<?php echo CHtml::encode($data->engine); ?>
	<br />


</div>