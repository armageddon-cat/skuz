<?php
/* @var $this TaskSystemController */
/* @var $model TaskSystem */


$this->menu=array(
	array('label'=>'List TaskSystem', 'url'=>array('index')),
	array('label'=>'Create TaskSystem', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#task-system-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Task Systems</h1>

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
	'id'=>'task-system-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'created_by',
		'modified_by',
		'create_time',
		'modify_time',
		'first_deadline',
		/*
		'deadline',
		'deadline_change_time',
		'deadline_change_by',
		'task',
		'task_change_time',
		'task_change_by',
		'first_executor',
		'executor',
		'executor_change_time',
		'executor_change_by',
		'executor_comment',
		'executor_comment_change_time',
		'executor_comment_change_by',
		'status',
		'status_change_time',
		'status_change_by',
		'task_file',
		'executor_file',
		'priority',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
