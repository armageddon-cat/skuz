<?php
/* @var $this KeywordPositionController */
/* @var $model KeywordPosition */

$this->breadcrumbs=array(
	'Keyword Positions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KeywordPosition', 'url'=>array('index')),
	array('label'=>'Manage KeywordPosition', 'url'=>array('admin')),
);
?>

<h1>Create KeywordPosition</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>