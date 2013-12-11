<?php
/* @var $this TaskSystemController */
/* @var $model TaskSystem */

/*
$this->menu=array(
	array('label'=>'List TaskSystem', 'url'=>array('index')),
	array('label'=>'Create TaskSystem', 'url'=>array('create')),
	array('label'=>'View TaskSystem', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TaskSystem', 'url'=>array('admin')),
);*/
?>

<h1>Изменение задания № <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>