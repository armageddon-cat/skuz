<?php
/* @var $this SeoreportController */
/* @var $model Seoreport */

$this->breadcrumbs=array(
	'Seoreports'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Seoreport', 'url'=>array('index')),
	array('label'=>'Manage Seoreport', 'url'=>array('admin')),
);
?>

<h1>Create Seoreport</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>