<?php
/* @var $this EverydayReportController */
/* @var $model EverydayReport */

$this->breadcrumbs=array(
	'Everyday Reports'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EverydayReport', 'url'=>array('index')),
	array('label'=>'Create EverydayReport', 'url'=>array('create')),
	array('label'=>'View EverydayReport', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EverydayReport', 'url'=>array('admin')),
);
?>

<h1>Update EverydayReport <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>