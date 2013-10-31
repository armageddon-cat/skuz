<?php
/* @var $this CallerManagerReportController */
/* @var $model CallerManagerReport */

/* $this->breadcrumbs=array(
	'Caller Manager Reports'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CallerManagerReport', 'url'=>array('index')),
	array('label'=>'Create CallerManagerReport', 'url'=>array('create')),
	array('label'=>'View CallerManagerReport', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CallerManagerReport', 'url'=>array('admin')),
); */
echo "
<div style=\"float:right;\">
<h2>Легенда:</h2>
<h4>Статус звонка:<h4>
0 - Недозвон<br>
1 - Отправление комм. предложения<br>
2 - Назначена встреча<br>
3 - Договоренность о пролонгации<br>
4 - Получена рекомендация<br>
5 - Отказ от услуг<br>
6 - Думает созвонится позже<br>
<h4>Вид продукта:<h4>
1 - Создание сайта<br>
2 - Продвижение сайта<br>
3 - Контекстная реклама<br>
4 - Тех. поддержка сайта<br>
5 - Создание фирменного стиля<br>
6 - Создание лого<br>
6 - Думает созвонится позже<br>
<h4>Тип контакта:<h4>
1 - Первая встреча<br>
2 - Определение интересов<br>
3 - Продажа<br>
4 - Рекомендация<br>
5 - Сопровождение<br>
6 - Пролонгация<br>
7 - Согласование условий договора<br>
</div>";

?>

<h1>Внесение изменений в отчет № <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>