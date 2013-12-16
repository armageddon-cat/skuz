<?php
/* @var $this EverydayReportController */
/* @var $model EverydayReport */
/*
$this->breadcrumbs=array(
	'Everyday Reports'=>array('index'),
	'Manage',
);*/

$this->menu=array(
	/*array('label'=>'List EverydayReport', 'url'=>array('index')),*/
	array('label'=>'Создать ежедневный отчет', 'url'=>array('create')),
);
/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#everyday-report-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");*/
?>

<h1>Ежедневные отчеты</h1>

<?php/* echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); */?>
<!-- </div>search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'everyday-report-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		/*'id',
		'create_time',*/
		'date',
		'user_id',
		'department',
		/*'tasks',*/
		/*
		'file',
		'comment',*/
		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}'
		),
	),
)); ?>
