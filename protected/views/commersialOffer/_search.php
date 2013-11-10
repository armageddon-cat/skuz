<?php
/* @var $this CommersialOfferController */
/* @var $model CommersialOffer */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fill_date'); ?>
		<?php echo $form->textField($model,'fill_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_name'); ?>
		<?php echo $form->textField($model,'project_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_person'); ?>
		<?php echo $form->textField($model,'contact_person',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site_url'); ?>
		<?php echo $form->textField($model,'site_url',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_name'); ?>
		<?php echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_products'); ?>
		<?php echo $form->textArea($model,'company_products',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fillial_web'); ?>
		<?php echo $form->textArea($model,'fillial_web',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sales_form'); ?>
		<?php echo $form->textField($model,'sales_form',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'market_position'); ?>
		<?php echo $form->textField($model,'market_position',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'marketing_strategy'); ?>
		<?php echo $form->textArea($model,'marketing_strategy',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'brand_name'); ?>
		<?php echo $form->textField($model,'brand_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'brand_advantages'); ?>
		<?php echo $form->textField($model,'brand_advantages',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'price_level'); ?>
		<?php echo $form->textField($model,'price_level',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site_tasks_adv'); ?>
		<?php echo $form->textArea($model,'site_tasks_adv',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site_tasks_mark'); ?>
		<?php echo $form->textArea($model,'site_tasks_mark',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site_tasks_info'); ?>
		<?php echo $form->textArea($model,'site_tasks_info',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site_type'); ?>
		<?php echo $form->textField($model,'site_type',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'functional_modules'); ?>
		<?php echo $form->textArea($model,'functional_modules',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'additional_languages'); ?>
		<?php echo $form->textField($model,'additional_languages',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site_stilistics'); ?>
		<?php echo $form->textField($model,'site_stilistics',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'firm_style_attributes'); ?>
		<?php echo $form->textField($model,'firm_style_attributes',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'slogan'); ?>
		<?php echo $form->textArea($model,'slogan',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'see_plus'); ?>
		<?php echo $form->textArea($model,'see_plus',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'see_minus'); ?>
		<?php echo $form->textArea($model,'see_minus',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sites_you_like'); ?>
		<?php echo $form->textArea($model,'sites_you_like',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site_colors'); ?>
		<?php echo $form->textArea($model,'site_colors',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site_brightness'); ?>
		<?php echo $form->textField($model,'site_brightness',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'composition'); ?>
		<?php echo $form->textField($model,'composition',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'design_type'); ?>
		<?php echo $form->textField($model,'design_type',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'components_basic'); ?>
		<?php echo $form->textField($model,'components_basic',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'components_web_form'); ?>
		<?php echo $form->textArea($model,'components_web_form',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'components_interactive'); ?>
		<?php echo $form->textArea($model,'components_interactive',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'components_corporative'); ?>
		<?php echo $form->textArea($model,'components_corporative',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'components_people'); ?>
		<?php echo $form->textArea($model,'components_people',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'components_online_consult'); ?>
		<?php echo $form->textArea($model,'components_online_consult',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'components_publication'); ?>
		<?php echo $form->textArea($model,'components_publication',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cms_type'); ?>
		<?php echo $form->textField($model,'cms_type',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modules_type'); ?>
		<?php echo $form->textArea($model,'modules_type',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'menu_structure'); ?>
		<?php echo $form->textArea($model,'menu_structure',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mainpage_elements'); ?>
		<?php echo $form->textArea($model,'mainpage_elements',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site_done_before'); ?>
		<?php echo $form->textField($model,'site_done_before',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site_url_before'); ?>
		<?php echo $form->textField($model,'site_url_before',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tasks_completness_before'); ?>
		<?php echo $form->textArea($model,'tasks_completness_before',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'seo_before'); ?>
		<?php echo $form->textArea($model,'seo_before',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'advertisement_before'); ?>
		<?php echo $form->textArea($model,'advertisement_before',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'new_product_reason'); ?>
		<?php echo $form->textArea($model,'new_product_reason',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'additional_info'); ?>
		<?php echo $form->textArea($model,'additional_info',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->