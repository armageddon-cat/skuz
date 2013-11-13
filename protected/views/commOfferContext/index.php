<?php
/* @var $this CommOfferContextController */
/* @var $dataProvider CActiveDataProvider */
/*
$this->breadcrumbs=array(
	'Comm Offer Contexts',
);

$this->menu=array(
	array('label'=>'Create CommOfferContext', 'url'=>array('create')),
	array('label'=>'Manage CommOfferContext', 'url'=>array('admin')),
);*/
?>

<h1>Онлайн заявки на продвижение/раскрутку</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
