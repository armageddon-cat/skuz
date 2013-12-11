<?php
/* @var $this TaskSystemController */
/* @var $dataProvider CActiveDataProvider */

$this->menu=array(
	array('label'=>'Создание задания', 'url'=>array('create')),
);
?>

<h1>Задания</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
