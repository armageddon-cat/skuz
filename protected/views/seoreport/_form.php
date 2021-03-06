<?php
/* @var $this SeoreportController */
/* @var $model Seoreport */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'seoreport-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'keyword_id'); ?>
		<?php echo $form->textField($model,'keyword_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'keyword_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spent_seopult'); ?>
		<?php echo $form->textField($model,'spent_seopult'); ?>
		<?php echo $form->error($model,'spent_seopult'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spent_sape'); ?>
		<?php echo $form->textField($model,'spent_sape'); ?>
		<?php echo $form->error($model,'spent_sape'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spent_seopult_client'); ?>
		<?php echo $form->textField($model,'spent_seopult_client'); ?>
		<?php echo $form->error($model,'spent_seopult_client'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spent_sape_client'); ?>
		<?php echo $form->textField($model,'spent_sape_client'); ?>
		<?php echo $form->error($model,'spent_sape_client'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->