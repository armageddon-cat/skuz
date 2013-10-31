<?php
$this->menu=array(
	array('label'=>'List SalesReport', 'url'=>array('index')),
	array('label'=>'Manage SalesReport', 'url'=>array('admin')),
);
?>

<h1>Создать отчет менеджера</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>