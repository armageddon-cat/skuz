<?php
/* @var $this PostController */
/* @var $model Post */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#post-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1> </h1>



<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'post-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id'=>array(
			'name'=>'id',
			'headerHtmlOptions'=>array('width'=>30)
			),
		'created',
		'message',
		'from_user'=>array(
			'name'=>'from_user',
			'value'=>'$data->from->login',
			'filter'=>User::all(),
			),
		'to_user'=>array(
			'name'=>'to_user',
			'value'=>'$data->to->login',
			'filter'=>User::all(),
			),
		array(
			'class'=>'CButtonColumn',
			'updateButtonOptions'=>array('style'=>'display:none')
		),
	),
)); ?>