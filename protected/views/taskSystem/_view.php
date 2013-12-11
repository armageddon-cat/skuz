<?php
/* @var $this TaskSystemController */
/* @var $data TaskSystem */

?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::encode($data->id); ?>
	<i><?php echo CHtml::link('Подробненько', array('view', 'id'=>$data->id)); ?></i>
	<i><?php echo CHtml::link('Изменить', array('update', 'id'=>$data->id)); ?></i>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->Creator->realname." ".$data->Creator->surname); ?>
	
	<? if($data->modified_by!=0){?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_by')); ?>:</b>
	<?php echo CHtml::encode($data->Modifier->realname." ".$data->Modifier->surname); ?>
	<?}?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	
	<? if($data->modify_time!=$data->create_time){?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('modify_time')); ?>:</b>
	<?php echo CHtml::encode($data->modify_time); ?>
	<br /><?}?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('deadline')); ?>:</b>
	<?php echo CHtml::encode($data->deadline); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php $status=CHtml::encode($data->StatusOfStatus->result);
			switch ($status) {
				case "Нет":
					echo "<span class=\"red\">$status</span>";
					break;
				case "Да":
					echo "<span class=\"green\">$status</span>";
					break;
			}
	?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('task')); ?>:</b>
	<?php echo CHtml::encode($data->task); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('priority')); ?>:</b>
	<?php echo CHtml::encode($data->priority); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('executor_comment')); ?>:</b>
	<?php echo CHtml::encode($data->executor_comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('executor')); ?>:</b>
	<?php echo CHtml::encode($data->Executor->realname." ".$data->Executor->surname); ?>
	<br />

	<?php /*
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('first_deadline')); ?>:</b>
	<?php echo CHtml::encode($data->first_deadline); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deadline_change_time')); ?>:</b>
	<?php echo CHtml::encode($data->deadline_change_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deadline_change_by')); ?>:</b>
	<?php echo CHtml::encode($data->deadline_change_by); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('task_change_time')); ?>:</b>
	<?php echo CHtml::encode($data->task_change_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('task_change_by')); ?>:</b>
	<?php echo CHtml::encode($data->task_change_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_executor')); ?>:</b>
	<?php echo CHtml::encode($data->first_executor); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('executor_change_time')); ?>:</b>
	<?php echo CHtml::encode($data->executor_change_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('executor_change_by')); ?>:</b>
	<?php echo CHtml::encode($data->executor_change_by); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('executor_comment_change_time')); ?>:</b>
	<?php echo CHtml::encode($data->executor_comment_change_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('executor_comment_change_by')); ?>:</b>
	<?php echo CHtml::encode($data->executor_comment_change_by); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('status_change_time')); ?>:</b>
	<?php echo CHtml::encode($data->status_change_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_change_by')); ?>:</b>
	<?php echo CHtml::encode($data->status_change_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('task_file')); ?>:</b>
	<?php echo CHtml::encode($data->task_file); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('executor_file')); ?>:</b>
	<?php echo CHtml::encode($data->executor_file); ?>
	<br />


	*/ ?>

</div>