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

<h1>Мои отчеты</h1>
<p>Все Ваши отчеты, кроме <b>Недозвонов</b>. Недозвоны находятся в меню "<b>Перезвоны по недозвонам</b>".</p>
<p>Отчеты со статусом "<b>Думает созвонится позже</b>" попадают в меню "<b>Мое расписание</b>".</p>
<?php echo CHtml::link('Выберите критерий поиска','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>
<?php echo CHtml::link('Назад к общему списку отчетов','Myreport'); ?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
		 /*'filter' => $model,*/
	'itemView'=>'_view2',
	'sortableAttributes'=>array(
        'time'=>'По дате',
    ),
	
)); ?>
