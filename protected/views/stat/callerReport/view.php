<?php
/* @var $this CallerReportController */
/* @var $model CallerReport */

$this->breadcrumbs=array(
	'Caller Reports'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CallerReport', 'url'=>array('index')),
	array('label'=>'Create CallerReport', 'url'=>array('create')),
	array('label'=>'Update CallerReport', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CallerReport', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CallerReport', 'url'=>array('admin')),
);
?>

<h1>View CallerReport #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'time',
		'company',
		'phone_number',
		'company_address',
		'email',
		'contact_person',
		'business_type',
		'service_type',
		'next_call',
		'contact_type',
		'comment',
		'caller_id',
		'call_status',
	),
)); ?>
