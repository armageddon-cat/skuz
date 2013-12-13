<?php
/* @var $this TaskSystemController */
/* @var $model TaskSystem */


$this->menu=array(
	array('label'=>'Все задания', 'url'=>array('index')),
	array('label'=>'Создание задания', 'url'=>array('create')),
);
/*
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
");*/
?>

<h1>Список заданий</h1>
<?/*
<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
*/?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'task-system-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		'id',
		'created_by'=>array(
            'name'=>'created_by',
            'filter'=>User::allNames(),
            'value'=>function($data){
                          return $data->Creator->realname ." ". $data->Creator->surname;
                        },
        ),
		//'modified_by',
		'create_time' => array(
            'name' => 'create_time',
            'filter' => $this->widget('application.extensions.timepicker.EJuiDateTimePicker',array(
                            'model'=>$model,
                            'attribute'=>'create_time',
                            'language' => 'ru',
                            'options'=>array(
                                'hourGrid' => 4,
                                'hourMin' => 0,
                                'hourMax' => 24,
                                'dateFormat' => 'yy-mm-dd',
                                'timeFormat' => 'hh:mm',
                                'changeMonth' => true,
                                'changeYear' => false,
                                ),
                            ),true), 
            'value' => function($data){
                    if ($data->create_time==0) {
                        return $data->create_time;
                    } else {
                    return Yii::app()->dateFormatter->format("dd-MM-yyyy, HH:mm:ss", $data->create_time);}
            },     
        ),
		//'modify_time',
		//'first_deadline',
		'deadline' => array(
            'name' => 'deadline',
            'filter' => $this->widget('application.extensions.timepicker.EJuiDateTimePicker',array(
                            'model'=>$model,
                            'attribute'=>'deadline',
                            'language' => 'ru',
                            'options'=>array(
                                'hourGrid' => 4,
                                'hourMin' => 0,
                                'hourMax' => 24,
                                'dateFormat' => 'yy-mm-dd',
                                'timeFormat' => 'hh:mm',
                                'changeMonth' => true,
                                'changeYear' => false,
                                ),
                            ),true), 
            'value' => function($data){
                    if ($data->deadline==0) {
                        return $data->deadline;
                    } else {
                    return Yii::app()->dateFormatter->format("dd-MM-yyyy, HH:mm:ss", $data->deadline);}
            },     
        ),
		// 'deadline_change_time',
		// 'deadline_change_by',
		// 'task',
		// 'task_change_time',
		// 'task_change_by',
		// 'first_executor',
		'executor'=>array(
            'name'=>'executor',
            'filter'=>User::allNames(),
            'value'=>function($data){
                    if (!is_numeric($model->executor)) {
                        return $data->Executor->realname ." ". $data->Executor->surname;
                    } else {
                    return $data->executor;}
            }, 
        ),
		// 'executor_change_time',
		// 'executor_change_by',
		// 'executor_comment',
		// 'executor_comment_change_time',
		// 'executor_comment_change_by',
		'status'=>array(
			'name'=>'status',
			'filter'=>SeoAuditDone::all(),
			'value'=>'$data->StatusOfStatus->result',
		),
		// 'status_change_time',
		// 'status_change_by',
		// 'task_file',
		// 'executor_file',
		'priority',
		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
		),
	),
)); ?>
