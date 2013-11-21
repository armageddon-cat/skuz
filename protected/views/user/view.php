<?php
/* @var $this UserController */
/* @var $model User */
/*
$this->menu=array(
	array('label'=>'Журнал пользователей', 'url'=>array('index')),
	
	array('label'=>'Изменение пользователя', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удаление пользователя', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены?')),

);*/
?>

<h1>Просмотр пользователя #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'login',
		'realname',
		'surname',
		'role'=>array(
			'name'=>'role',
			'value'=>CHtml::encode($model->rolename->role_name),
			),
		'email',
		'company'=>array(
			'name'=>'company',
			'value'=>CHtml::encode($model->companyName->company_name),
			),
	),
)); ?>