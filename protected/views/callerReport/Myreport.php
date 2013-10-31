<?php
/* @var $this CallerReportController */
/* @var $dataProvider CActiveDataProvider */

/* $this->breadcrumbs=array(
	'Caller Reports',
);

$this->menu=array(
	array('label'=>'Create CallerReport', 'url'=>array('create')),
	array('label'=>'Manage CallerReport', 'url'=>array('admin')),
); */
/* Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiListView.update('randId', {
		data: $(this).serialize()
	});
	return false;
});
"); */
?>

<h1>Мои отчеты</h1>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view2',
	'sortableAttributes'=>array(
        'time'=>'По дате',
    ),
	
)); ?>
