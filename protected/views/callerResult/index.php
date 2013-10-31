<?php
/* @var $this CallerResultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Caller Results',
);

$this->menu=array(
	array('label'=>'Create CallerResult', 'url'=>array('create')),
	array('label'=>'Manage CallerResult', 'url'=>array('admin')),
);
?>

<h1>Caller Results</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'sortableAttributes'=>array(
        'time'=>'По дате',
    ),
)); ?>
