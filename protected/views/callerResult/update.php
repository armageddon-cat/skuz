<?php
/* @var $this CallerResultController */
/* @var $model CallerResult */

$this->breadcrumbs=array(
	'Caller Results'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CallerResult', 'url'=>array('index')),
	array('label'=>'Create CallerResult', 'url'=>array('create')),
	array('label'=>'View CallerResult', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CallerResult', 'url'=>array('admin')),
);
?>

<h1>Update CallerResult <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>