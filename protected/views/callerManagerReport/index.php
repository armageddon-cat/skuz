<?php
/* @var $this CallerManagerReportController */
/* @var $dataProvider CActiveDataProvider */

/* $this->breadcrumbs=array(
	'Caller Manager Reports',
);

$this->menu=array(
	array('label'=>'Create CallerManagerReport', 'url'=>array('create')),
	array('label'=>'Manage CallerManagerReport', 'url'=>array('admin')),
); 

echo '<pre>';
print_r($dataProvider);
echo '</pre>';
*/

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
<h1>Список заказов от Диспетчеров для Вас</h1>

<?php echo CHtml::link('Выберите критерий поиска','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>
<?php echo CHtml::link('Назад к общему списку отчетов','index'); ?>



<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'sortableAttributes'=>array(
        'time'=>'По дате',
    ),
	
)); ?>
