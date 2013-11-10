<?php
/* @var $this CallerReportController */
/* @var $model CallerReport */


/*  $this->menu=array(
	array('label'=>'Список отчетов диспетчеров', 'url'=>array('index')),
	array('label'=>'Управление отчетами диспетчеров', 'url'=>array('admin')),
);  */
?>

<h1>Создать отчет диспетчера. Этап №2</h1>
<p>Ищите Ваш отчет в меню "<b>Все мои отчеты</b>".<br>
	Если вы назначили <b>Дату следующего контакта</b>, то отчет попадает еще и в меню "<b>Мое расписание</b>"</p>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>