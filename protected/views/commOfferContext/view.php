<?php
/* @var $this CommOfferContextController */
/* @var $model CommOfferContext */
/*
$this->breadcrumbs=array(
	'Comm Offer Contexts'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CommOfferContext', 'url'=>array('index')),
	array('label'=>'Create CommOfferContext', 'url'=>array('create')),
	array('label'=>'Update CommOfferContext', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CommOfferContext', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CommOfferContext', 'url'=>array('admin')),
);*/
?>
	<div class="row buttons">
		<a href="http://dr-intellectus.com/"><p>Главная</p></a>
		<p class="required">   //   Просмотр заявки</p>
	</div>
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
		'bussiness_theme',
		'url',
		'adv_budget',
		'seo_systems',
		'geo_time_targeting',
		'theme_priority',
		'price_wanted',
		'comments',
	),
)); ?>
<div class="row buttons back-to-site">
		<a href="http://dr-intellectus.com/"><p>Вернутся на Сайт</p></a>
</div>
