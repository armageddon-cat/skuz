<?php
/* @var $this KeywordPositionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Keyword Positions',
);

$this->menu=array(
	array('label'=>'Create KeywordPosition', 'url'=>array('create')),
	array('label'=>'Manage KeywordPosition', 'url'=>array('admin')),
);
?>

<h1>Keyword Positions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
