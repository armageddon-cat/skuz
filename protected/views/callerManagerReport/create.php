<?php
/* @var $this CallerManagerReportController */
/* @var $model CallerManagerReport */

$this->breadcrumbs=array(
	'Caller Manager Reports'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CallerManagerReport', 'url'=>array('index')),
	array('label'=>'Manage CallerManagerReport', 'url'=>array('admin')),
);
?>

<h1>Create CallerManagerReport</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>