<h1>Расписание по контактам</h1>
<table class="my_table">
	<?php
	
foreach($timeTable as $worker){
	echo '<tr>';
	echo '<td>'.CHtml::link("Полная информация о контакте № ".$worker['id'], array('view', 'id'=>$worker['id'])).'</td><td>'.$worker['next_call'].'</td>';
	echo '</tr>';
}

	?>
</table>