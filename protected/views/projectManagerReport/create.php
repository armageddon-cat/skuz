<?php
/* @var $this ProjectManagerReportController */
/* @var $model ProjectManagerReport */

$this->breadcrumbs=array(
	'Project Manager Reports'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProjectManagerReport', 'url'=>array('index')),
	array('label'=>'Manage ProjectManagerReport', 'url'=>array('admin')),
);
?>

<h1>Create ProjectManagerReport</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>