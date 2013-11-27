<?php
/* @var $this OrdersHistoryController */
/* @var $model OrdersHistory */
/*
$this->breadcrumbs=array(
	'Orders Histories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrdersHistory', 'url'=>array('index')),
	array('label'=>'Create OrdersHistory', 'url'=>array('create')),
	array('label'=>'View OrdersHistory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OrdersHistory', 'url'=>array('admin')),
);*/
?>

<h1>Изменение комментария</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>