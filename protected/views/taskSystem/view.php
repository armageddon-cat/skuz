<?php
/* @var $this TaskSystemController */
/* @var $model TaskSystem */


$this->menu=array(
	array('label'=>'Все задания', 'url'=>array('index')),
    array('label'=>'Список заданий', 'url'=>array('admin')),
	/*array('label'=>'Create TaskSystem', 'url'=>array('create')),*/
	array('label'=>'Изменить', 'url'=>array('update', 'id'=>$model->id)),
	/*array('label'=>'Delete TaskSystem', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	*/
);
?>

<h1>Просмотр задания № <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'created_by'=>array(
			'name'=>'created_by',
			'value'=>$model->Creator->realname ." ". $model->Creator->surname,
		),
		'modified_by'=>array(
			'name'=>'modified_by',
			'value'=>$model->Modifier->realname ." ". $model->Modifier->surname,
		),
		'create_time' => array(
            'name' => 'create_time',
            'value' => function($data){
                    if ($data->create_time==0) {
                        return $data->create_time;
                    } else {
                    return Yii::app()->dateFormatter->format("dd-MM-yyyy, HH:mm:ss", $data->create_time);}
            },     
        ),
		'modify_time' => array(
            'name' => 'modify_time',
            'value' => function($data){
                    if ($data->modify_time==0) {
                        return $data->modify_time;
                    } else {
                    return Yii::app()->dateFormatter->format("dd-MM-yyyy, HH:mm:ss", $data->modify_time);}
            },     
        ),
		'first_deadline' => array(
            'name' => 'first_deadline',
            'value' => function($data){
                    if ($data->first_deadline==0) {
                        return $data->first_deadline;
                    } else {
                    return Yii::app()->dateFormatter->format("dd-MM-yyyy, HH:mm:ss", $data->first_deadline);}
            },     
        ),
		'deadline' => array(
            'name' => 'deadline',
            'value' => function($data){
                    if ($data->deadline==0) {
                        return $data->deadline;
                    } else {
                    return Yii::app()->dateFormatter->format("dd-MM-yyyy, HH:mm:ss", $data->deadline);}
            },     
        ),
		'deadline_change_time' => array(
            'name' => 'deadline_change_time',
            'value' => function($data){
                    if ($data->deadline_change_time==0) {
                        return $data->deadline_change_time;
                    } else {
                    return Yii::app()->dateFormatter->format("dd-MM-yyyy, HH:mm:ss", $data->deadline_change_time);}
            },     
        ),
		'deadline_change_by'=>array(
			'name'=>'deadline_change_by',
			'value'=>$model->DeadlineModifier->realname ." ". $model->DeadlineModifier->surname,
		),
        'topic',	
		'task',
		'task_change_time' => array(
            'name' => 'task_change_time',
            'value' => function($data){
                    if ($data->task_change_time==0) {
                        return $data->task_change_time;
                    } else {
                    return Yii::app()->dateFormatter->format("dd-MM-yyyy, HH:mm:ss", $data->task_change_time);}
            },     
        ),
		'task_change_by'=>array(
			'name'=>'task_change_by',
			'value'=>$model->TaskModifier->realname ." ". $model->TaskModifier->surname,
		),
		'first_executor'=>array(
			'name'=>'first_executor',
			'value'=> function($data){
                    if (is_numeric($model->first_executor)) {
                        return $data->FirstExecutor->realname ." ". $data->FirstExecutor->surname;
                    } else {
                    return $data->first_executor;}
            }, 
		),
		'executor'=>array(
			'name'=>'executor',
			'value'=> function($data){
                    if (is_numeric($model->first_executor)) {
                        return $data->Executor->realname ." ". $data->Executor->surname;
                    } else {
                    return $data->first_executor;}
            }, 
        ),
		'executor_change_time' => array(
            'name' => 'executor_change_time',
            'value' => function($data){
                    if ($data->executor_change_time==0) {
                        return $data->executor_change_time;
                    } else {
                    return Yii::app()->dateFormatter->format("dd-MM-yyyy, HH:mm:ss", $data->executor_change_time);}
            },     
        ),
		'executor_change_by'=>array(
			'name'=>'executor_change_by',
			'value'=>$model->ExecutorModifier->realname ." ". $model->ExecutorModifier->surname,
		),
		'executor_comment',
		'executor_comment_change_time' => array(
            'name' => 'executor_comment_change_time',
            'value' => function($data){
                    if ($data->executor_comment_change_time==0) {
                        return $data->executor_comment_change_time;
                    } else {
                    return Yii::app()->dateFormatter->format("dd-MM-yyyy, HH:mm:ss", $data->executor_comment_change_time);}
            },     
        ),
		'executor_comment_change_by'=>array(
			'name'=>'executor_comment_change_by',
			'value'=>$model->ExCommentModifier->realname ." ". $model->ExCommentModifier->surname,
		),
		'status'=>array(
			'name'=>'status',
			'value'=>$model->StatusOfStatus->result,
		),
		'status_change_time' => array(
            'name' => 'status_change_time',
            'value' => function($data){
                    if ($data->status_change_time==0) {
                        return $data->status_change_time;
                    } else {
                    return Yii::app()->dateFormatter->format("dd-MM-yyyy, HH:mm:ss", $data->status_change_time);}
            },     
        ),
		'status_change_by'=>array(
			'name'=>'status_change_by',
			'value'=>$model->StatusModifier->realname ." ". $model->StatusModifier->surname,
		),
        'task_file'=>array(
            'name'=>'task_file',
            'type' => 'raw',
            'value'=>function($data){
                $TaskFilename = TaskSystem::TaskFileExists($data->id);
                if ($TaskFilename!=NULL) {
                    return CHtml::link("Скачать ".$TaskFilename, array('download', 'id'=>$data->id, 'filetype'=>1));
                } else { 
                    return $data->task_file; }
            }, 
        ),
        'executor_file'=>array(
            'name'=>'executor_file',
            'type' => 'raw',
            'value'=>function($data){
                $ExecutorFilename = TaskSystem::ExecutorFileExists($data->id);
                if ($ExecutorFilename!=NULL) {
                    return CHtml::link("Скачать ".$ExecutorFilename, array('download', 'id'=>$data->id, 'filetype'=>2));
                } else { 
                    return $data->executor_file; }
            }, 
        ),
		'priority',
	),
)); ?>
