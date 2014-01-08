<?php $i=1; ?>
<table border="1">
	<tr>
		<th>№</th>
		<th>Номер заявки</th>
		<th>Компания</th>
		<th>Адрес сайта</th>
	</tr>
	<?php foreach ($model as $user) {?>
		<tr>
			<td><? echo $i;$i++; ?></td>
			<td><? echo $user->id; ?></td>
			<td><? echo $user->company; ?></td>
			<td><? echo $user->site_address; ?></td>
		</tr>
	<?php } ?>
</table>
