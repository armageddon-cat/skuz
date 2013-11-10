<?php
/* @var $this CommersialOfferController */
/* @var $model CommersialOffer */

$this->breadcrumbs=array(
	'Commersial Offers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CommersialOffer', 'url'=>array('index')),
	array('label'=>'Create CommersialOffer', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#commersial-offer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Commersial Offers</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'commersial-offer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'fill_date',
		'project_name',
		'contact_person',
		'phone_number',
		'email',
		/*
		'site_url',
		'company_name',
		'company_products',
		'fillial_web',
		'sales_form',
		'market_position',
		'marketing_strategy',
		'brand_name',
		'brand_advantages',
		'price_level',
		'site_tasks_adv',
		'site_tasks_mark',
		'site_tasks_info',
		'site_type',
		'functional_modules',
		'additional_languages',
		'site_stilistics',
		'firm_style_attributes',
		'slogan',
		'see_plus',
		'see_minus',
		'sites_you_like',
		'site_colors',
		'site_brightness',
		'composition',
		'design_type',
		'components_basic',
		'components_web_form',
		'components_interactive',
		'components_corporative',
		'components_people',
		'components_online_consult',
		'components_publication',
		'cms_type',
		'modules_type',
		'menu_structure',
		'mainpage_elements',
		'site_done_before',
		'site_url_before',
		'tasks_completness_before',
		'seo_before',
		'advertisement_before',
		'new_product_reason',
		'additional_info',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
