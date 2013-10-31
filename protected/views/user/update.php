<?php
/* @var $this UserController */
/* @var $model User */


$this->menu=array(
	array('label'=>'Журнал пользователей', 'url'=>array('index')),
	array('label'=>'Просмотр пользователя', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Изменение пароля', 'url'=>array('password', 'id'=>$model->id)),
);
?>

<h1>Изменение пользователя <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>