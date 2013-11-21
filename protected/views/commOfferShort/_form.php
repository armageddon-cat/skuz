<?php
/* @var $this CommOfferShortController */
/* @var $model CommOfferShort */
/* @var $form CActiveForm */
?>
  
<div id="wrapper_online" class="form">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comm-offer-short-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<?php /*	<p class="note">Поля отмеченные <span class="required">*</span> обязательны для заполнения.</p> */?>

	<?php echo $form->errorSummary($model); ?>
	<div id="first">
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?><br>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'placeholder'=>'Как к Вам обращаться?')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?><br>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>255,'placeholder'=>'Например: 925-888-88-88')); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?><br>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255,'placeholder'=>'mail@example.com')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<b><?php echo $form->labelEx($model,'site_url'); ?></b><br>
		<?php echo $form->textField($model,'site_url',array('size'=>25,'maxlength'=>255,'placeholder'=>'example.com')); ?>
		<?php echo $form->error($model,'site_url'); ?>
	</div>
        </div>
        <div id="second">
	<div class="row">
		<?php echo $form->labelEx($model,'product_type'); ?><br>
		<?php echo $form->checkBoxList($model,'product_type',array('Продвижение сайта'=>'Продвижение сайта',
		'Создание сайта'=>'Создание сайта','Техническая поддержка'=>'Техническая поддержка','Создание фирменного стиля'=>'Создание фирменного стиля')); ?>
		<?php echo $form->error($model,'product_type'); ?>
	</div>

	<div class="row"  style="margin-top:15px">
		<b><?php echo $form->labelEx($model,'comment'); ?></b><br>
		<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>45,'placeholder'=>'Напишите нам!')); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>
<p class="note" style="margin-top:-20px; color:#1e8bd6;">Поля отмеченные <span class="required">*</span> обязательны для заполнения.</p>
	   

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить изменения'); ?>
	</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->