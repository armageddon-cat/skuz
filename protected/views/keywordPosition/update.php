<?php
/* @var $this KeywordPositionController */
/* @var $model KeywordPosition */

$this->breadcrumbs=array(
	'Keyword Positions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KeywordPosition', 'url'=>array('index')),
	array('label'=>'Create KeywordPosition', 'url'=>array('create')),
	array('label'=>'View KeywordPosition', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KeywordPosition', 'url'=>array('admin')),
);
?>

<h1>Update KeywordPosition <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>