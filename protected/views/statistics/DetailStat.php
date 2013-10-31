<h1>Диспетчера: подробно</h1>
<table>
	<?php
	 echo "<pre>";
	 print_r($model);
	echo "</pre>";
foreach($model as $worker){
	echo '<tr>';
		echo '<td>Имя</td>';
		echo '<td>'.$worker['caller_id'].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td>Фамилия</td>';
		echo '<td>'.$worker['caller_id'].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td>Cтатус</td>';
		echo '<td>'.$worker['call_status'].'</td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td>Количество</td>';
		echo '<td>'.$worker['count(call_status)'].'</td>';
	echo '</tr>';
}
	?>
</table>