<?php
/* @var $this SeoCompaniesController */
/* @var $model SeoCompanies */
/*
$this->breadcrumbs=array(
	'Seo Companies'=>array('index'),
	'Manage',
);*/

$this->menu=array(
	/*array('label'=>'List SeoCompanies', 'url'=>array('index')),*/
	array('label'=>'Добавление компании', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#seo-companies-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Список всех компаний</h1>
<?php /*
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->*/?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'seo-companies-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'date',
		'company_name',
		'comment',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view} {update}',
		),
	),
)); ?>
