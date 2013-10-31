<?php
/* @var $this UserInfoController */
/* @var $model UserInfo */


$this->menu=array(
	array('label'=>'Просмотр анкеты', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Редактировать информацию о себе</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>