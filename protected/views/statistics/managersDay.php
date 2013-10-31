<h1>Менеджеры: количество встреч за текущий день</h1>
<table>
	<tr>
		<th>Имя</th>
		<th>Фамилия</th>
		<th>Количество встреч</th>
		
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