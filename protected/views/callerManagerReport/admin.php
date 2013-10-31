<?php
/* @var $this CallerManagerReportController */
/* @var $model CallerManagerReport */

$this->breadcrumbs=array(
	'Caller Manager Reports'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CallerManagerReport', 'url'=>array('index')),
	array('label'=>'Create CallerManagerReport', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#caller-manager-report-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Caller Manager Reports</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'caller-manager-report-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'time',
		'company',
		'phone_number',
		'company_address',
		'email',
		/*
		'contact_person',
		'business_type',
		'service_type',
		'next_call',
		'contact_type',
		'comment',
		'caller_id',
		'call_status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
