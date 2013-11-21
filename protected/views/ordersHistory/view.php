<?php
/* @var $this OrdersHistoryController */
/* @var $model OrdersHistory */

$this->breadcrumbs=array(
	'Orders Histories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OrdersHistory', 'url'=>array('index')),
	array('label'=>'Create OrdersHistory', 'url'=>array('create')),
	array('label'=>'Update OrdersHistory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OrdersHistory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrdersHistory', 'url'=>array('admin')),
);
?>

<h1>View OrdersHistory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'report_id',
		'create_time',
		'modify_time',
		'created_by',
		'modified_by',
		'description',
	),
)); ?>
