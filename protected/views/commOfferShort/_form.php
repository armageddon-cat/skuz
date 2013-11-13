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
		<div class="row buttons">
		<a href="http://dr-intellectus.com/"><p>Главная</p></a>
		<p class="required">   //   Заполнение коммерческого предложения</p>
	</div>


	<p class="note">Поля отмеченные <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>
<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?><br>
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
		<?php echo $form->labelEx($model,'product_type'); ?><br>
		<?php echo $form->textField($model,'product_type',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'product_type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить изменения'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<hr>
<div class="full-form-links">
	<p>Если Вы хотите, Вы можете заполнить полную форму заявки. Но она содержит около <b>20 пунктов</b>. <br>
		Выбирайте этот вариант только если уверенны.
	</p>
<p><a href="http://test.dr-intellectus.ru/commersialOffer/create">Заполнение <b>полной</b> заявки на <b>создание</b> сайта</a></p>
<p><a href="http://test.dr-intellectus.ru/commOfferContext/create">Заполнение <b>полной</b> заявки на <b>продвижение/раскрутку</b> сайта</a></p>
</div>