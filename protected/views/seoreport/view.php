<?php
/* @var $this SeoreportController */
/* @var $model Seoreport */

$this->breadcrumbs=array(
	'Seoreports'=>array('index'),
	$model->keyword_id,
);

$this->menu=array(
	array('label'=>'List Seoreport', 'url'=>array('index')),
	array('label'=>'Create Seoreport', 'url'=>array('create')),
	array('label'=>'Update Seoreport', 'url'=>array('update', 'id'=>$model->keyword_id)),
	array('label'=>'Delete Seoreport', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->keyword_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Seoreport', 'url'=>array('admin')),
);
?>

<h1>View Seoreport #<?php echo $model->keyword_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'keyword_id',
		'spent_seopult',
		'spent_sape',
		'spent_seopult_client',
		'spent_sape_client',
	),
)); ?>
