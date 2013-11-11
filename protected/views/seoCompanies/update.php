<?php
/* @var $this SeoCompaniesController */
/* @var $model SeoCompanies */
/*
$this->breadcrumbs=array(
	'Seo Companies'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SeoCompanies', 'url'=>array('index')),
	array('label'=>'Create SeoCompanies', 'url'=>array('create')),
	array('label'=>'View SeoCompanies', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SeoCompanies', 'url'=>array('admin')),
);*/
?>

<h1>Изменение информации о клиенте № <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>