<?php
/* @var $this CallerReportController */
/* @var $model CallerReport */
/*
$this->breadcrumbs=array(
	'Caller Reports'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CallerReport', 'url'=>array('index')),
	array('label'=>'Create CallerReport', 'url'=>array('create')),
	array('label'=>'View CallerReport', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CallerReport', 'url'=>array('admin')),
);*/
?>

<h1>Исправление ошибок в отчете № <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>