<?php
/* @var $this CommersialOfferController */
/* @var $dataProvider CActiveDataProvider */
/*
$this->breadcrumbs=array(
	'Commersial Offers',
);

$this->menu=array(
	array('label'=>'Create CommersialOffer', 'url'=>array('create')),
	array('label'=>'Manage CommersialOffer', 'url'=>array('admin')),
);*/
?>

<h1>Просмотр Онлайн заявок</h1>
<p><a href="http://test.dr-intellectus.ru/commersialOffer/TestExport">Загрузка всех онлайн заявок в Excel</a></p>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
