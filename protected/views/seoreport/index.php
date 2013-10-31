<?php
/* @var $this SeoreportController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Seoreports',
);

$this->menu=array(
	array('label'=>'Create Seoreport', 'url'=>array('create')),
	array('label'=>'Manage Seoreport', 'url'=>array('admin')),
);
?>

<h1>Seoreports</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
