<h1>Просмотр информации о пользователе #<?php echo $model->id; ?></h1>

<?php $this->menu=array(
	array('label'=>'Личная информация пользователей', 'url'=>array('index')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'login'=>array(
			'name'=>'login',
			'value'=>CHtml::encode($model->login->login),
			),
		'realname'=>array(
			'name'=>'realname',
			'value'=>CHtml::encode($model->realname->realname),
			),
		'surname'=>array(
			'name'=>'surname',
			'value'=>CHtml::encode($model->surname->surname),
			),
		'photo'=>array(
			'name'=>'photo',
			'type'=>'html',
			'value'=> CHtml::image("/files/".$model->id."/".$model->photo, "", array("width"=>100)),
			),
		'birthday',
		'about_myself',
	),
)); ?>