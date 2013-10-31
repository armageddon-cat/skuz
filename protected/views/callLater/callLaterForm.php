<?php
/* @var $this CallLaterController */
/* @var $model CallLater */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'call-later-callLaterForm-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля отмеченные <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>
<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
		<?php echo $form->error($model,'time'); ?>
	</div>
*/?>
	<div class="row">
		<?php echo $form->labelEx($model,'company'); ?>
		<?php echo $form->textField($model,'company'); ?>
		<?php echo $form->error($model,'company'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_address'); ?>
		<?php echo $form->textField($model,'site_address'); ?>
		<?php echo $form->error($model,'site_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number'); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>
	<?php/*
<div class="row">
		<?php echo $form->labelEx($model,'call_status'); ?>
		<?php echo $form->dropDownList($model,'call_status',
			array(0=>'0 - Недозвон',
			5=>'5 - Отказ от услуг')); ?>
		<?php echo $form->error($model,'call_status'); ?>
	</div>
*/?>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Подтвердить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->