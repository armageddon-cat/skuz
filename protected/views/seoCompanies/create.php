<?php
/* @var $this SeoCompaniesController */
/* @var $model SeoCompanies 

$this->breadcrumbs=array(
	'Seo Companies'=>array('index'),
	'Create',
);*/

$this->menu=array(
	/*array('label'=>'Список компаний', 'url'=>array('index')),*/
	array('label'=>'Список компаний', 'url'=>array('admin')),
);
?>

<h1>Добавление нового клиента</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>