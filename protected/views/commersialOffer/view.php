<?php
/* @var $this CommersialOfferController */
/* @var $model CommersialOffer */
/*
$this->breadcrumbs=array(
	'Commersial Offers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CommersialOffer', 'url'=>array('index')),
	array('label'=>'Create CommersialOffer', 'url'=>array('create')),
	array('label'=>'Update CommersialOffer', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CommersialOffer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CommersialOffer', 'url'=>array('admin')),
);*/
?>

	<div class="row buttons">
		<a href="http://dr-intellectus.com/"><p>Главная</p></a>
		<p class="required">   //   Просмотр заявки</p>
	</div>

<h1>Все прошло успешно. Спасибо. </h1>
<h4>Просмотр заявки</h4>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fill_date',
		'project_name',
		'contact_person',
		'phone_number',
		'email',
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
	),
)); ?>
<div class="row buttons back-to-site">
		<a href="http://dr-intellectus.com/"><p>Вернутся на Сайт</p></a>
</div>