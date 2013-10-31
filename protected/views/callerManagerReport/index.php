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

?>

<h1>Список заказов от Диспетчеров для Вас</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'sortableAttributes'=>array(
        'time'=>'По дате',
    ),
	
)); ?>
