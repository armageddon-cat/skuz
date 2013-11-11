<?php
/* @var $this SeoCompaniesController */
/* @var $model SeoCompanies */
/*
$this->breadcrumbs=array(
	'Seo Companies'=>array('index'),
	$model->id,
);*/

$this->menu=array(
	/*array('label'=>'Список компаний', 'url'=>array('index')),*/
	array('label'=>'Добавление компании', 'url'=>array('create')),
	array('label'=>'Внесение изменений', 'url'=>array('update', 'id'=>$model->id)),
	/*array('label'=>'Delete SeoCompanies', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),*/
	array('label'=>'Список компаний', 'url'=>array('admin')),
);
?>

<h1>Клиент №<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'company_name',
		'comment',
	),
)); ?>
