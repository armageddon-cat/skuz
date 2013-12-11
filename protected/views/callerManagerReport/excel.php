<table border="1">
	<tr>
		<th>Номер заказа</th>
		<th>Дата получения</th>
		<th>Компания</th>
		<th>Вид бизнеса</th>
		<th>Дата первой встречи</th>
		<th>Вид услуги</th>
		<th>Дата следующей встречи</th>
		<th>Комментарий</th>
		<th>Комментарий менеджера</th>
	</tr>
	<?php foreach ($model as $user) {?>
		<tr>
			<td><? echo $user->id; ?></td>
			<td><? echo $user->time; ?></td>
			<td><? echo $user->company; ?></td>
			<td><? echo $user->business_type; ?></td>
			<td><? echo $user->next_call; ?></td>
			<td><? echo $user->product->product; ?></td>
			<td><? echo $user->next_meeting_date; ?></td>
			<td><? echo $user->comment; ?></td>
			<td><? echo $user->manager_comment; ?></td>
		</tr>
	<?} ?>
</table>
