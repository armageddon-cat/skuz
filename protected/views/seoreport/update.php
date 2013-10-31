<?php
/* @var $this SeoreportController */
/* @var $model Seoreport */

$this->breadcrumbs=array(
	'Seoreports'=>array('index'),
	$model->keyword_id=>array('view','id'=>$model->keyword_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Seoreport', 'url'=>array('index')),
	array('label'=>'Create Seoreport', 'url'=>array('create')),
	array('label'=>'View Seoreport', 'url'=>array('view', 'id'=>$model->keyword_id)),
	array('label'=>'Manage Seoreport', 'url'=>array('admin')),
);
?>

<h1>Update Seoreport <?php echo $model->keyword_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>