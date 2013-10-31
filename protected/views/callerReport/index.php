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
Yii::app()->clientScript->registerScript('search', "
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
");
?>

<h1>Все отчеты</h1>

<?php echo CHtml::link('Выберите критерий поиска','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'id'=>'randId',
	'sortableAttributes'=>array(
        //'caller_id'=>'Диспетчер',
        'time'=>'Сортировка по дате',
    ),
)); ?>
