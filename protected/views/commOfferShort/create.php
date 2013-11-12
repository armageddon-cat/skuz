<?php
/* @var $this CommOfferShortController */
/* @var $model CommOfferShort */
/*
$this->breadcrumbs=array(
	'Comm Offer Shorts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CommOfferShort', 'url'=>array('index')),
	array('label'=>'Manage CommOfferShort', 'url'=>array('admin')),
);*/
?>

<h1>Создание новой заявки</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>