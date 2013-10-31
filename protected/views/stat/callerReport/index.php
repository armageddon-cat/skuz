<?php
/* @var $this CallerReportController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Caller Reports',
);

$this->menu=array(
	array('label'=>'Create CallerReport', 'url'=>array('create')),
	array('label'=>'Manage CallerReport', 'url'=>array('admin')),
);
?>

<h1>Caller Reports</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
