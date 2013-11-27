<?php
/* @var $this OrdersHistoryController */
/* @var $model OrdersHistory */
/*
$this->breadcrumbs=array(
	'Orders Histories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrdersHistory', 'url'=>array('index')),
	array('label'=>'Manage OrdersHistory', 'url'=>array('admin')),
);*/
?>
<br>
<h1>Добавление комментария</h1>

<?php $this->renderPartial('application.views.ordersHistory._form', array('model'=>$model)); ?>