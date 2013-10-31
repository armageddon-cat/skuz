<?php
/* @var $this ProjectManagerReportController */
/* @var $model ProjectManagerReport */

/* $this->breadcrumbs=array(
	'Project Manager Reports'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProjectManagerReport', 'url'=>array('index')),
	array('label'=>'Create ProjectManagerReport', 'url'=>array('create')),
	array('label'=>'Update ProjectManagerReport', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProjectManagerReport', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProjectManagerReport', 'url'=>array('admin')),
); */
?>

<h1>Просмотр деталей отчета #<?php echo $model->id; ?></h1>

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
		'manager_id',
	),
)); ?>
