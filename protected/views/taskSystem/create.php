<?php
/* @var $this TaskSystemController */
/* @var $model TaskSystem */

/*
$this->menu=array(
	array('label'=>'List TaskSystem', 'url'=>array('index')),
	array('label'=>'Manage TaskSystem', 'url'=>array('admin')),
);*/
?>

<h1>Создать новое задание</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>