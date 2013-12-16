<?php
/* @var $this EverydayReportController */
/* @var $model EverydayReport */
/*
$this->breadcrumbs=array(
	'Everyday Reports'=>array('index'),
	'Create',
);*/

$this->menu=array(
	/*array('label'=>'List EverydayReport', 'url'=>array('index')),*/
	array('label'=>'Список отчетов', 'url'=>array('admin')),
);
?>

<h1>Создать ежедневный отчет</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>