<?php
/* @var $this ProjectManagerReportController */
/* @var $dataProvider CActiveDataProvider */

/* $this->breadcrumbs=array(
	'Project Manager Reports',
);

$this->menu=array(
	array('label'=>'Create ProjectManagerReport', 'url'=>array('create')),
	array('label'=>'Manage ProjectManagerReport', 'url'=>array('admin')),
); */
?>

<h1>Отчеты по всем Менеджерам</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
