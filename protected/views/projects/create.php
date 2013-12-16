<?php
/* @var $this ProjectsController */
/* @var $model Projects */
/*
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	'Create',
);
*/
$this->menu=array(
	/*array('label'=>'List Projects', 'url'=>array('index')),*/
	array('label'=>'Перечень проектов', 'url'=>array('admin')),
);
?>

<h1>Создать проект</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>