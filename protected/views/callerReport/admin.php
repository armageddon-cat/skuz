<?php
/* @var $this CallerReportController */
/* @var $model CallerReport */
/*
$this->breadcrumbs=array(
	'Caller Reports'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CallerReport', 'url'=>array('index')),
	array('label'=>'Create CallerReport', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#caller-report-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");*/
?>

<h1>Тут вы можете скачать отчет в Ексель</h1>

<?php/* echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); */?>
<!--</div> search-form -->
<div style="display:none;">
<?php $gridWidget=$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'caller-report-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'caller_id'=>array(
			'name'=>'caller_id',
			'value'=>'$data->caller->realname ." ". $data->caller->surname',
		),
		'time',
		'company',
		'phone_number',
		'company_address',
		'email',
		'contact_person',
		'business_type',
		'service_type'=>array(
			'name'=>'service_type',
			'value'=>'$data->product->product',
		),
		'next_call',
		'contact_type'=>array(
			'name'=>'contact_type',
			'value'=>'$data->contact->contact_type',
		),
		'call_status',
		'comment',
		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}'
		),
	),
));
?>
</div>
<p>
<?php
$this->renderExportGridButton($gridWidget,'Експорт отчета',array('class'=>'btn btn-info pull-right'));
?>
</p>