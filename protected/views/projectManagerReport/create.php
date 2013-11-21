<?php
/* @var $this ProjectManagerReportController */
/* @var $model ProjectManagerReport */
/*
$this->breadcrumbs=array(
	'Project Manager Reports'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProjectManagerReport', 'url'=>array('index')),
	array('label'=>'Manage ProjectManagerReport', 'url'=>array('admin')),
);*/
?>

<h1>Создание отчета о клиенте</h1>

<p><b>Важно!</b> Пользуйтесь этой функцией только если данный клиент еще <b>не был добавлен</b> Диспетчером.</p>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>