<?php
/* @var $this ProjectManagerReportController */
/* @var $model ProjectManagerReport */

$this->breadcrumbs=array(
	'Project Manager Reports'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProjectManagerReport', 'url'=>array('index')),
	array('label'=>'Create ProjectManagerReport', 'url'=>array('create')),
	array('label'=>'View ProjectManagerReport', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProjectManagerReport', 'url'=>array('admin')),
);
?>

<h1>Update ProjectManagerReport <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>