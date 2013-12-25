<?php
/* @var $this CallerManagerReportController */
/* @var $data CallerManagerReport */

?>
<?php //if($data->manager_id == Yii::app()->user->id) {?>
	<?php $call = CHtml::encode($data->call_status); ?>
<?php if($call != 0 && $call != 5){ ?>
<div class="inline_report">

	<?php echo CHtml::link('Детали и изменение отчета №'.CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company')); ?>:</b>
	<?php echo CHtml::encode($data->company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_number')); ?>:</b>
	<?php echo CHtml::encode($data->phone_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_address')); ?>:</b>
	<?php echo CHtml::encode($data->company_address); ?>
	<br />
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />
*/ ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_person')); ?>:</b>
	<?php echo CHtml::encode($data->contact_person); ?>
	<br />

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

	<b><?php echo CHtml::encode($data->getAttributeLabel('caller_id')); ?>:</b>
	<?php echo CHtml::encode($data->caller_id); ?>
	<br />
*/ ?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('call_status')); ?>:</b>
	<?php echo CHtml::encode($data->StatusOfCall->status); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('comm_proposal')); ?>:</b>
	<?php $comm_proposal=CHtml::encode($data->CommProposal->res); 
		
			switch ($comm_proposal) {
				case "Не Отправлено":
					echo "<span class=\"red\">$comm_proposal</span>";
					break;
				case "Отправлено":
					echo "<span class=\"green\">$comm_proposal</span>";
					break;
			}
	?>
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
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('contract')); ?>:</b>
	<?php $contractStatus=CHtml::encode($data->Contract->contract_status); 
		
			switch ($contractStatus) {
				case "Нет":
					echo "<span class=\"red\">$contractStatus</span>";
					break;
				case "Да":
					echo "<span class=\"green\">$contractStatus</span>";
					break;
			}
	?>


</div><?php } ?>
<?//}?>