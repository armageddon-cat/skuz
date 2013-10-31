<h1>Диспетчера: количество звонков за текущий месяц</h1>
<table>
	<tr>
		<th>Имя</th>
		<th>Фамилия</th>
		<th>Количество звонков</th>
		
	</tr>
	<?php
foreach($model as $worker){
	echo '<tr>';
	echo '<td>'.$worker['realname'].'</td>';
	echo '<td>'.$worker['surname'].'</td>';
	echo '<td>'.$worker['count(*)'].'</td>';
	echo '</tr>';
}
	?>
</table>