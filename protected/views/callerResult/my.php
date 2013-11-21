<?php
Yii::app()->clientScript->registerScriptFile('/js/datepicker.js');
?>
<h1>Диспетчера за <?php 
	if (isset($_POST['CallerResult']['date'])) {
		echo $_POST['CallerResult']['date'];
	} else { ?>
сегодня
	<?php } ?>
</h1>
<p><b>Выбор даты</b></p>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'caller-result-form',
	'enableAjaxValidation'=>false,
	'method'=>'post',
)); ?>
		<?php 
$this->widget('application.extensions.timepicker.EJuiDateTimePicker',array(
    'model'=>$notmodel,
    'attribute'=>'date',
    'language' => 'ru',
    'options'=>array(
        'dateFormat' => 'yy-mm-dd',
        'changeMonth' => true,
        'changeYear' => true,
        'timeFormat' => '',
        ),
    ));  
?>

<div class="row buttons">
		<?php echo CHtml::submitButton('Поехали'); ?>
	</div>

<?php $this->endWidget(); ?>
<a href="/callerResult/my">Сброс</a>

<table border="1" class="my_table">
<tr><td><b>Имя/Тип</b></td><td><b>Количество</b></td></tr>
	<?php
/*  	 echo "<pre>";
	 print_r($model);
	echo "</pre>";  */
 	for($i=6;$i<10;$i++){
		switch ($i) {
			case 6:
				$k = 'Ольга Олизаренко';
				break;
			case 7:
				$k = 'Анастасия Терлик';
				break;
			case 8:
				$k = 'Валерия Шафранская';
				break;
			case 9:
				$k = 'Екатерина Макаренко';
				break;
		}
		if ($i%2) {
			$cl = "odd";
		} else { $cl = "even"; }
		$res = $model[$i][0]['count(`status_res_id`)'] + $model[$i][1]['count(`status_res_id`)'] + $model[$i][2]['count(`status_res_id`)'] + $model[$i][3]['count(`status_res_id`)'] + $model[$i][4]['count(`status_res_id`)'] + $model[$i][5]['count(`status_res_id`)'] + $model[$i][6]['count(`status_res_id`)'] + $model[$i][7]['count(`status_res_id`)'];
		echo "<tr class=".$cl."><td><b>Диспетчер $k</b></td><td><b>".$res."</b></td></tr>";
		echo "<tr class=".$cl."><td>0 - Недозвон</td><td>".$model[$i][0]['count(`status_res_id`)']."</td></tr>";
		echo "<tr class=".$cl."><td>1 - Отправлено коммер. предложение</td><td>".$model[$i][1]['count(`status_res_id`)']."</td></tr>";
		echo "<tr class=".$cl."><td>2 - Назначена встреча</td><td>".$model[$i][2]['count(`status_res_id`)']."</td></tr>";
		echo "<tr class=".$cl."><td>3 - Договоренность о пролонгации</td><td>".$model[$i][3]['count(`status_res_id`)']."</td></tr>";
		echo "<tr class=".$cl."><td>4 - Получена рекомендация</td><td>".$model[$i][4]['count(`status_res_id`)']."</td></tr>";
		echo "<tr class=".$cl."><td>5 - Отказ от услуг</td><td>".$model[$i][5]['count(`status_res_id`)']."</td></tr>";
		echo "<tr class=".$cl."><td>6 - Думает созвонится позже</td><td>".$model[$i][6]['count(`status_res_id`)']."</td></tr>";
		echo "<tr class=".$cl."><td>Ошибочный номер</td><td>".$model[$i][7]['count(`status_res_id`)']."</td></tr>";
	} 
	/* echo $model[6][0]['count(`status_res_id`)']; */
	?>
</table>
<p><a href="/CallerResult/YesterdayFull">Вчера</a></p>
<p><a href="/CallerResult/WeekFull">Неделя</a></p>
<p><a href="/CallerResult/MonthFull">Месяц</a></p>
<p><a href="/CallerResult/QuarterFull">Квартал</a></p>