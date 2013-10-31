<h1>Диспетчера за неделю</h1>
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
		$res = $model[$i][0]['count(`status_res_id`)'] + $model[$i][1]['count(`status_res_id`)'] + $model[$i][2]['count(`status_res_id`)'] + $model[$i][3]['count(`status_res_id`)'] + $model[$i][4]['count(`status_res_id`)'] + $model[$i][5]['count(`status_res_id`)'] + $model[$i][6]['count(`status_res_id`)'] + $model[$i][7]['count(`status_res_id`)'];
		echo "<tr><td><b><h4>Диспетчер $k</h4></b></td><td><b>".$res."</b></td></tr>";
		echo "<tr><td>0 - Недозвон</td><td>".$model[$i][0]['count(`status_res_id`)']."</td></tr>";
		echo "<tr><td>1 - Отправлено коммер. предложение</td><td>".$model[$i][1]['count(`status_res_id`)']."</td></tr>";
		echo "<tr><td>2 - Назначена встреча</td><td>".$model[$i][2]['count(`status_res_id`)']."</td></tr>";
		echo "<tr><td>3 - Договоренность о пролонгации</td><td>".$model[$i][3]['count(`status_res_id`)']."</td></tr>";
		echo "<tr><td>4 - Получена рекомендация</td><td>".$model[$i][4]['count(`status_res_id`)']."</td></tr>";
		echo "<tr><td>5 - Отказ от услуг</td><td>".$model[$i][5]['count(`status_res_id`)']."</td></tr>";
		echo "<tr><td>6 - Думает созвонится позже</td><td>".$model[$i][6]['count(`status_res_id`)']."</td></tr>";
		echo "<tr><td>Ошибочный номер</td><td>".$model[$i][7]['count(`status_res_id`)']."</td></tr>";
	} 
	/* echo $model[6][0]['count(`status_res_id`)']; */
	?>
</table>
<p><a href="/CallerResult/my">Вернуться к сегодняшней статистике</a></p>
<p>Другие периоды</p>
<p><a href="/CallerResult/YesterdayFull">Вчера</a></p>
<p><a href="/CallerResult/MonthFull">Месяц</a></p>
<p><a href="/CallerResult/QuarterFull">Квартал</a></p>
