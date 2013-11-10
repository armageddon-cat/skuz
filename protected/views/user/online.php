<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */
?>
<h1>Юзеры онлайн</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'htmlOptions'=>array('style'=>'width: 900px'),
	'dataProvider'=>$dataProvider,
	/*'filter'=>$model,*/
	'columns'=>array(
		'id'=>array(
			'name'=>'id',
			'headerHtmlOptions'=>array('width'=>30)
		),
		'login',
		'realname',
		'surname',
		'role'=>array(
			'name'=>'role',
			'value'=>'$data->rolename->role_name',
			'filter'=>array(1=>'Диспетчер', 2=>'Менеджер', 3=>'Seo-менеджер', 4=>'Босс', 5=>'Администратор' , 6=>'Топ-Диспетчер' ),
	
		),
		'last_move',
	),
)); ?>
