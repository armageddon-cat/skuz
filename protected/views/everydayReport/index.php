<?php
/* @var $this EverydayReportController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Everyday Reports',
);

$this->menu=array(
	array('label'=>'Create EverydayReport', 'url'=>array('create')),
	array('label'=>'Manage EverydayReport', 'url'=>array('admin')),
);
?>

<h1>Everyday Reports</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
