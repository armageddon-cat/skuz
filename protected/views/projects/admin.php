<?php
/* @var $this ProjectsController */
/* @var $model Projects */
/*
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	/*array('label'=>'List Projects', 'url'=>array('index')),*/
	array('label'=>'Создать проект', 'url'=>array('create')),
);
/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#projects-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");*/
?>

<h1>Перечень проектов</h1>

<?php /* echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); */?>
<!--</div> search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'projects-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		/*'created_by',
		'create_time',*/
		'project_name',
		/*'comment',*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}'
		),
	),
)); ?>
