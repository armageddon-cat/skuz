<?php
/* @var $this UserController */
/* @var $model User */




Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал пользователей</h1>


<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php echo CHtml::form();  ?>
<?php echo CHtml::submitButton('Открыть доступ', array('name'=>'noban')); 
echo CHtml::submitButton('Закрыть доступ', array('name'=>'ban'));
?>

<a href="/userInfo">Личная информация пользователей</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'htmlOptions'=>array('style'=>'width: 900px'),
	'selectableRows'=>2,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id'=>array(
			'name'=>'id',
			'headerHtmlOptions'=>array('width'=>30)
		),
		array('class'=>'CCheckBoxColumn',
			  'id'=>'user_id'
			 ),
		'login',
		'realname',
		'surname',
		'role'=>array(
			'name'=>'role',
			'value'=>'$data->rolename->role_name',
			'filter'=>array(1=>'Диспетчер', 2=>'Менеджер', 3=>'Seo-менеджер', 4=>'Босс', 5=>'Администратор' , 6=>'Топ-Диспетчер' ),
	
		),
		'email',
		array(
			'class'=>'CButtonColumn',
			'headerHtmlOptions'=>array('width'=>40),
		),
		'ban'=>array(
			'name'=>'ban',
			'value'=>'($data->ban==1)? "запрещен":""',
			'filter'=>array(0=>'разрешен', 1=>'запрещен'),
		),
	),
)); ?>


<?php echo CHtml::endForm();  ?>