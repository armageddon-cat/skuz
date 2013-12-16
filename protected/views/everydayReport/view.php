<?php
/* @var $this EverydayReportController */
/* @var $model EverydayReport */
/*
$this->breadcrumbs=array(
	'Everyday Reports'=>array('index'),
	$model->id,
);*/

$this->menu=array(
	/*array('label'=>'List EverydayReport', 'url'=>array('index')),
	array('label'=>'Create EverydayReport', 'url'=>array('create')),
	array('label'=>'Update EverydayReport', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EverydayReport', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	*/array('label'=>'Просмотр ежедневных отчетов', 'url'=>array('admin')),
);
?>

<h1>Просмотр ежедневного отчета №<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		/*'id',
		'create_time',*/
		'date',
		'user_id',
		'department',
		/*'tasks',
		'file',*/
		'comment',
	),
)); ?>
