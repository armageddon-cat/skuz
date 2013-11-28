<?php
/* @var $this CommOfferShortController */
/* @var $model CommOfferShort */
/*
$this->breadcrumbs=array(
	'Comm Offer Shorts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CommOfferShort', 'url'=>array('index')),
	array('label'=>'Create CommOfferShort', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#comm-offer-short-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");*/
?>
<?php
/*

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
*/
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'comm-offer-short-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id'=>array(
            'name'=>'id',
            'type' => 'raw',
            'value'=>function($data){
                    $DIR = YiiBase::getPathOfAlias('webroot').'/upload/onlinerequest/'; 
                    if(CommOfferShort::FileExists($data->id)==NULL) { 
                    	return CHtml::link('№ '.CHtml::encode($data->id), array('viewSkyz', 'id'=>$data->id));
                    } else {
                    	return CHtml::link('№ '.CHtml::encode($data->id), array('viewSkyz', 'id'=>$data->id))." ".CHtml::link("Скачать", array('download', 'id'=>$data->id));
                    }
            }, 
        ),
		'date',
		'name',
		'phone',
		'email',
		'product_type',
	),
)); ?>
