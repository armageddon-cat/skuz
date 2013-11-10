<?php
/* @var $this CallLaterController */
/* @var $model CallLater */
/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#call-later-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");*/
?>

<h1>Список перезвонов</h1>
<p>Тут видно список Ваших <b>Недозвонов</b> и <b>Отказов от услуг</b>. Возможно когда-нибудь Вам стоит им перезвонить.</p>

<?php /*echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'model'=>$model,
)); 
</div>*/?><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'call-later-grid',
    /*'dataProvider'=>$model->search(),*/
	'dataProvider'=>$dataProvider,
    'filter'=>$model,
    'columns'=>array(
        /*'id',*/
        'time',
        'company',
        'site_address',
        'phone_number',
        /*'caller_id',*/
        'call_status'=>array(
            'name'=>'call_status',
            'value'=>'$data->StatusOfCall->status',
        ),
        array(
            'class'=>'CButtonColumn',
			'template'=>'{delete}',
        ),
    ),
)); ?>