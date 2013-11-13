<?php
/* @var $this CommOfferContextController */
/* @var $model CommOfferContext */
/* @var $form CActiveForm */
?>

<div id="wrapper_online" class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comm-offer-context-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

		<div class="row buttons">
		<a href="http://dr-intellectus.com/"><p>Главная</p></a>
		<p class="required">   //   Заполнение коммерческого предложения</p>
	</div>

	<p class="note">Поля отмеченные <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>
<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>
*/ ?>
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?><br>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?><br>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?><br>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bussiness_theme'); ?><br>
		<?php echo $form->textArea($model,'bussiness_theme',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'bussiness_theme'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?><br>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adv_budget'); ?><br>
		<?php echo $form->textField($model,'adv_budget',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'adv_budget'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seo_systems'); ?><br>
		<?php echo $form->textArea($model,'seo_systems',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'seo_systems'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'geo_time_targeting'); ?><br>
		<?php echo $form->textArea($model,'geo_time_targeting',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'geo_time_targeting'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'theme_priority'); ?><br>
		<?php echo $form->textArea($model,'theme_priority',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'theme_priority'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price_wanted'); ?><br>
		<?php echo $form->textArea($model,'price_wanted',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'price_wanted'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?><br>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->