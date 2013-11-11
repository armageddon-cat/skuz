<?php
/* @var $this KeywordController */
/* @var $model Keyword 

$this->breadcrumbs=array(
	'Keywords'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	/*array('label'=>'List Keyword', 'url'=>array('index')),*/
	array('label'=>'Добавление ключевого слова', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#keyword-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление ключевыми словами</h1>
<?php /*
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form --> */?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'keyword-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'company_id'=>array('name'=>'company_id','value'=>'$data->company->company_name',),
		'keyword',
		/*'id',
		'search_engine',
		'status',*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update} {delete}',
		),
	),
)); ?>
