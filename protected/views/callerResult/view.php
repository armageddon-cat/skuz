<?php
/* @var $this CallerResultController */
/* @var $model CallerResult */

$this->breadcrumbs=array(
	'Caller Results'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CallerResult', 'url'=>array('index')),
	array('label'=>'Create CallerResult', 'url'=>array('create')),
	array('label'=>'Update CallerResult', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CallerResult', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CallerResult', 'url'=>array('admin')),
);
?>

<h1>View CallerResult #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'caller_res_id',
		'date',
		'status_res_id',
	),
)); ?>
