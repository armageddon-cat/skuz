<?php
/* @var $this OrdersHistoryController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Orders Histories',
);

$this->menu=array(
	array('label'=>'Create OrdersHistory', 'url'=>array('create')),
	array('label'=>'Manage OrdersHistory', 'url'=>array('admin')),
);*/
?>
<br>
<h1>История заказа</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'application.views.ordersHistory._view',
)); ?>
