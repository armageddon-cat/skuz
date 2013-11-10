<?php
/* @var $this CommersialOfferController */
/* @var $model CommersialOffer */
/*
$this->breadcrumbs=array(
	'Commersial Offers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CommersialOffer', 'url'=>array('index')),
	array('label'=>'Manage CommersialOffer', 'url'=>array('admin')),
);*/
?>
<div class="stripe"></div>
<h1>Заполнение коммерческого предложения</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>