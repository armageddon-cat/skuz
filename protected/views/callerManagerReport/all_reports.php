<?php
/* @var $this CallerManagerReportController */
/* @var $data CallerManagerReport */

?>
<h1>Список отчетов от Диспетчеров</h1>

<?php foreach($allReports as $report) { ?>
<?php if($data->id == Yii::app()->user->id) {?>
<div class="view inline_report">

	<?php echo CHtml::link('Детали и изменение данного отчета', array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo 'time'; ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo 'company'; ?>:</b>
	<?php echo CHtml::encode($data->company); ?>
	<br />

	<b><?php echo 'phone_number'; ?>:</b>
	<?php echo CHtml::encode($data->phone_number); ?>
	<br />

	<b><?php echo 'company_address'; ?>:</b>
	<?php echo CHtml::encode($data->company_address); ?>
	<br />

	<b><?php echo 'email'; ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo 'contact_person'; ?>:</b>
	<?php echo CHtml::encode($data->contact_person); ?>
	<br />
<?}} ?>
	<?php /*
	<b><?php echo 'business_type'; ?>:</b>
	<?php echo CHtml::encode($data->business_type); ?>
	<br />

	<b><?php echo 'service_type'; ?>:</b>
	<?php echo CHtml::encode($data->service_type); ?>
	<br />

	<b><?php echo 'next_call'; ?>:</b>
	<?php echo CHtml::encode($data->next_call); ?>
	<br />

	<b><?php echo 'contact_type'; ?>:</b>
	<?php echo CHtml::encode($data->contact_type); ?>
	<br />

	<b><?php echo 'comment'; ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	<b><?php echo 'caller_id'; ?>:</b>
	<?php echo CHtml::encode($data->caller_id); ?>
	<br />

	<b><?php echo 'call_status'; ?>:</b>
	<?php echo CHtml::encode($data->call_status); ?>
	<br />

	*/ ?>

</div>