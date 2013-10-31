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
        /*'caller_id',
        'call_status',*/
        array(
            'class'=>'CButtonColumn',
			'template'=>'{delete}',
        ),
    ),
)); ?>