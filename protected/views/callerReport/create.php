<?php
/* @var $this CallerReportController */
/* @var $model CallerReport */


/*  $this->menu=array(
	array('label'=>'Список отчетов диспетчеров', 'url'=>array('index')),
	array('label'=>'Управление отчетами диспетчеров', 'url'=>array('admin')),
);  */
?>

<h1>Создать отчет диспетчера. Этап №2</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>