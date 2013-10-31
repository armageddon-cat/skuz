<?php
/* @var $this CallerReportController */
/* @var $data CallerReport */
?>
<?php $call = CHtml::encode($data->call_status); ?>
<?php if($call != 0 && $call != 5){ ?>
<div class="inline_report">

<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />
	

	<?php echo CHtml::link('Полная информация о встрече №'.CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
	 
	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('company')); ?>:</b>
	<?php echo CHtml::encode($data->company); ?>
	<br />
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_number')); ?>:</b>
	<?php echo CHtml::encode($data->phone_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_address')); ?>:</b>
	<?php echo CHtml::encode($data->company_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_person')); ?>:</b>
	<?php echo CHtml::encode($data->contact_person); ?>
	<br />
*/ ?>
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('business_type')); ?>:</b>
	<?php echo CHtml::encode($data->business_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_type')); ?>:</b>
	<?php echo CHtml::encode($data->service_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('next_call')); ?>:</b>
	<?php echo CHtml::encode($data->next_call); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_type')); ?>:</b>
	<?php echo CHtml::encode($data->contact_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />
*/ ?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('caller_id')); ?>:</b>
	<?php echo CHtml::encode($data->caller->realname ." ". $data->caller->surname); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('call_status')); ?>:</b>
	<?php echo CHtml::encode($data->StatusOfCall->status); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('manager_id')); ?>:</b>
	<?php echo CHtml::encode($data->manager->realname ." ". $data->manager->surname); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('meeting_result')); ?>:</b>
	<?php $result=CHtml::encode($data->meeting->result);
			switch ($result) {
				case "отрицательно":
					echo "<span class=\"red\">$result</span>";
					break;
				case "положительно":
					echo "<span class=\"green\">$result</span>";
					break;
				case "В процессе..":
					echo "<span class=\"yellow\">$result</span>";
					break;
			}

	?>

</div><?php } ?>