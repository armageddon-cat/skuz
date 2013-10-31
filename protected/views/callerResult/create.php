<?php
/* @var $this CallerResultController */
/* @var $model CallerResult */

/* $this->breadcrumbs=array(
	'Caller Results'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CallerResult', 'url'=>array('index')),
	array('label'=>'Manage CallerResult', 'url'=>array('admin')),
); */
?>

<h1>Создать отчет. Этап №1</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>