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

<p><?php echo CHtml::link(CHtml::encode('Скачать базу'), array('ExportDatabase'));
?></p>

<?php echo CHtml::link('Выберите критерий поиска','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>
<?php echo CHtml::link('Назад к общему списку отчетов','index'); ?>
<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'id'=>'randId',
	'sortableAttributes'=>array(
        //'caller_id'=>'Диспетчер',
        'manager_id'=>'Сортировка по менеджеру',
        'time'=>'Сортировка по дате',
    ),
)); */?>
<?php $this->widget('DSizerListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'template'=>"{sizer}\n{summary}\n{items}\n{pager}",
    'sizerVariants'=>array(10, 20, 50, 100),
    'sizerAttribute'=>'size',
    'sizerCssClass'=>'sorter',
    'sizerHeader'=>'Показывать на страницу: ',
)); ?>