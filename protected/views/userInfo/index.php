<?php
/* @var $this UserInfoController */
/* @var $model UserInfo */
/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-info-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
*/
?>
<?php $this->menu=array(
	array('label'=>'Журнал пользователей', 'url'=>array('/admin/user/index')),
);
?>

<h1>Личная информация пользователей</h1>

<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-info-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'login'=>array(
			'name'=>'login',
			'value'=>'$data->login->login',
			),
		'realname'=>array(
			'name'=>'realname',
			'value'=>'$data->realname->realname',
			),
		'surname'=>array(
			'name'=>'surname',
			'value'=>'$data->surname->surname',
			),
		'photo'=>array(
			'name'=>'photo',
			'type'=>'html',
			'value'=> 'CHtml::image("/files/".$data->id."/".$data->photo, "", array("width"=>100))',
			'htmlOptions'=>array('style'=>'width: 100px;'),
			'filter'=>false,
			),
		'birthday'=>array(
			'name'=>'birthday',
			'headerHtmlOptions'=>array(
				'width'=>100,
				),
			),
		'about_myself'=>array(
			'name'=>'about_myself',
			'filter'=>false,
			),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{delete}'
		),
	),
)); ?>