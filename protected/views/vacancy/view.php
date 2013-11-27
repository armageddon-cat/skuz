<?php
/* @var $this VacancyController */
/* @var $model Vacancy */
?>

<h1>Просмотр информации которую Вы ввели:</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fio',
		'phone',
		'comment',
	),
)); ?>
