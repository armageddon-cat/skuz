<?php
/* @var $this CommOfferShortController */
/* @var $model CommOfferShort */
/*
$this->breadcrumbs=array(
	'Comm Offer Shorts'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CommOfferShort', 'url'=>array('index')),
	array('label'=>'Create CommOfferShort', 'url'=>array('create')),
	array('label'=>'Update CommOfferShort', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CommOfferShort', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CommOfferShort', 'url'=>array('admin')),
);*/
?>


<h1>Все прошло успешно. Спасибо. </h1>
<h4>Просмотр заявки</h4>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'name',
		'phone',
		'email',
		'product_type',
		'comment',
	),
)); ?>
