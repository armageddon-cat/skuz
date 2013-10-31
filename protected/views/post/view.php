<?php
/* @var $this PostController */
/* @var $model Post */

$this->menu=array(
	array('label'=>'Журнал сообщений', 'url'=>array('index')),
	array('label'=>'Удалить сообщение', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены?')),
);
?>

<h1>Просмотр сообщения #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'created',
		'message',
		'from_user'=>array(
		'name'=>'from_user',
			'value'=>CHtml::encode($model->from->login),
		),
		'to_user'=>array(
			'name'=>'to_user',
			'value'=>CHtml::encode($model->to->login),
			),
	),
)); ?>