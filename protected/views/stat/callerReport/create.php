<?php
/* @var $this CallerReportController */
/* @var $model CallerReport */

$this->breadcrumbs=array(
	'Caller Reports'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CallerReport', 'url'=>array('index')),
	array('label'=>'Manage CallerReport', 'url'=>array('admin')),
);
?>

<h1>Create CallerReport</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>