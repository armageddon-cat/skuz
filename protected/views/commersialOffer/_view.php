<?php
/* @var $this CommersialOfferController */
/* @var $data CommersialOffer */
?>

<div class="view">
<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
*/?>
<?php echo CHtml::link('Полная информация о заявке №'.CHtml::encode($data->id), array('viewSkyz', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fill_date')); ?>:</b>
	<?php echo CHtml::encode($data->fill_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_name')); ?>:</b>
	<?php echo CHtml::encode($data->project_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_person')); ?>:</b>
	<?php echo CHtml::encode($data->contact_person); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_number')); ?>:</b>
	<?php echo CHtml::encode($data->phone_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_url')); ?>:</b>
	<?php echo CHtml::encode($data->site_url); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('company_name')); ?>:</b>
	<?php echo CHtml::encode($data->company_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_products')); ?>:</b>
	<?php echo CHtml::encode($data->company_products); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fillial_web')); ?>:</b>
	<?php echo CHtml::encode($data->fillial_web); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sales_form')); ?>:</b>
	<?php echo CHtml::encode($data->sales_form); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('market_position')); ?>:</b>
	<?php echo CHtml::encode($data->market_position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marketing_strategy')); ?>:</b>
	<?php echo CHtml::encode($data->marketing_strategy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_name')); ?>:</b>
	<?php echo CHtml::encode($data->brand_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_advantages')); ?>:</b>
	<?php echo CHtml::encode($data->brand_advantages); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price_level')); ?>:</b>
	<?php echo CHtml::encode($data->price_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_tasks_adv')); ?>:</b>
	<?php echo CHtml::encode($data->site_tasks_adv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_tasks_mark')); ?>:</b>
	<?php echo CHtml::encode($data->site_tasks_mark); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_tasks_info')); ?>:</b>
	<?php echo CHtml::encode($data->site_tasks_info); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_type')); ?>:</b>
	<?php echo CHtml::encode($data->site_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('functional_modules')); ?>:</b>
	<?php echo CHtml::encode($data->functional_modules); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('additional_languages')); ?>:</b>
	<?php echo CHtml::encode($data->additional_languages); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_stilistics')); ?>:</b>
	<?php echo CHtml::encode($data->site_stilistics); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firm_style_attributes')); ?>:</b>
	<?php echo CHtml::encode($data->firm_style_attributes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('slogan')); ?>:</b>
	<?php echo CHtml::encode($data->slogan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('see_plus')); ?>:</b>
	<?php echo CHtml::encode($data->see_plus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('see_minus')); ?>:</b>
	<?php echo CHtml::encode($data->see_minus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sites_you_like')); ?>:</b>
	<?php echo CHtml::encode($data->sites_you_like); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_colors')); ?>:</b>
	<?php echo CHtml::encode($data->site_colors); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_brightness')); ?>:</b>
	<?php echo CHtml::encode($data->site_brightness); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('composition')); ?>:</b>
	<?php echo CHtml::encode($data->composition); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('design_type')); ?>:</b>
	<?php echo CHtml::encode($data->design_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('components_basic')); ?>:</b>
	<?php echo CHtml::encode($data->components_basic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('components_web_form')); ?>:</b>
	<?php echo CHtml::encode($data->components_web_form); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('components_interactive')); ?>:</b>
	<?php echo CHtml::encode($data->components_interactive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('components_corporative')); ?>:</b>
	<?php echo CHtml::encode($data->components_corporative); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('components_people')); ?>:</b>
	<?php echo CHtml::encode($data->components_people); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('components_online_consult')); ?>:</b>
	<?php echo CHtml::encode($data->components_online_consult); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('components_publication')); ?>:</b>
	<?php echo CHtml::encode($data->components_publication); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cms_type')); ?>:</b>
	<?php echo CHtml::encode($data->cms_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modules_type')); ?>:</b>
	<?php echo CHtml::encode($data->modules_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_structure')); ?>:</b>
	<?php echo CHtml::encode($data->menu_structure); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mainpage_elements')); ?>:</b>
	<?php echo CHtml::encode($data->mainpage_elements); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_done_before')); ?>:</b>
	<?php echo CHtml::encode($data->site_done_before); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_url_before')); ?>:</b>
	<?php echo CHtml::encode($data->site_url_before); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tasks_completness_before')); ?>:</b>
	<?php echo CHtml::encode($data->tasks_completness_before); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seo_before')); ?>:</b>
	<?php echo CHtml::encode($data->seo_before); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('advertisement_before')); ?>:</b>
	<?php echo CHtml::encode($data->advertisement_before); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('new_product_reason')); ?>:</b>
	<?php echo CHtml::encode($data->new_product_reason); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('additional_info')); ?>:</b>
	<?php echo CHtml::encode($data->additional_info); ?>
	<br />

	*/ ?>

</div>