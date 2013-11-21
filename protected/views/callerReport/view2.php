<?php
/* @var $this CallerReportController */
/* @var $model CallerReport */

/* $this->breadcrumbs=array(
	'Caller Reports'=>array('index'),
	$model->id,
);
*/
if(Yii::app()->user->role==1) {
$this->menu=array(
	/*array('label'=>'List CallerReport', 'url'=>array('index')),
	array('label'=>'Create CallerReport', 'url'=>array('create')),*/
	array('label'=>'Исправление ошибок', 'url'=>array('update', 'id'=>$model->id)),
	/*array('label'=>'Delete CallerReport', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CallerReport', 'url'=>array('admin')),*/
); }
?>

<h1>Просмотр отчета<?php //echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'order_code',
		'time',
		'company',
		'phone_number',
		'company_address',
		'site_address',
		'email',
		'contact_person',
		'business_type',
		'service_type'=>array(
			'name'=>'service_type',
			'value'=>$model->product->product,
		),
		'next_call',
		/*'contact_type'=>array('name'=>'contact_type','value'=>$model->contact->contact_type),*/
		'comment',
		'caller_id'=>array(
			'name'=>'caller_id',
			'value'=>$model->caller->realname ." ". $model->caller->surname,
		),
		'call_status'=>array(
			'name'=>'call_status',
			'value'=>$model->StatusOfCall->status,
		),
		'manager_id'=>array(
			'name'=>'manager_id',
			'value'=>$model->manager->realname ." ". $model->manager->surname,),
		'comm_proposal'=>array(
			'name'=>'comm_proposal',
			'value'=>$model->CommProposal->res,),
		'importancy'=>array(
			'name'=>'importancy',
			'value'=>$model->Importancy->importancy,),
	),
)); ?>
