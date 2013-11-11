<?php
/* @var $this SeoCompaniesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Seo Companies',
);

$this->menu=array(
	array('label'=>'Create SeoCompanies', 'url'=>array('create')),
	array('label'=>'Manage SeoCompanies', 'url'=>array('admin')),
);
?>

<h1>Seo Companies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
