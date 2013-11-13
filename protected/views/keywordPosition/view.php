<?php
/* @var $this KeywordPositionController */
/* @var $model KeywordPosition */

$this->breadcrumbs=array(
	'Keyword Positions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List KeywordPosition', 'url'=>array('index')),
	array('label'=>'Create KeywordPosition', 'url'=>array('create')),
	array('label'=>'Update KeywordPosition', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KeywordPosition', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KeywordPosition', 'url'=>array('admin')),
);
?>

<h1>View KeywordPosition #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'keyword_id',
		'keyword_position',
		'engine',
	),
)); ?>
