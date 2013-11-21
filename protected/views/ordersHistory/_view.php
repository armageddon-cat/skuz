<?php
/* @var $this OrdersHistoryController */
/* @var $data OrdersHistory */
?>

<div class="view">
<div class="history_comment_head">
	<?/*<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::encode($data->id); ?> */?>

	<b><?php echo CHtml::encode('Комментарий создан'); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<?php echo CHtml::encode($data->creator->realname." ".$data->creator->surname); ?>
	<?php if ($data->create_time!=$data->modify_time) { ?>
		<b><?php echo CHtml::encode('Изменен'); ?>:</b>
		<?php echo CHtml::encode($data->modify_time); ?>
		<?php echo CHtml::encode($data->modifier->realname." ".$data->modifier->surname); ?>
	<?php } ?>


</div>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<? /**/?>	
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('next_contact_date')); ?>:</b>
	<?php echo CHtml::encode($data->next_contact_date); ?>
	<? /**/?>


</div>