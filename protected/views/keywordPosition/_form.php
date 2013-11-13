<?php
/* @var $this KeywordPositionController */
/* @var $model KeywordPosition */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'keyword-position-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keyword_id'); ?>
		<?php echo $form->textField($model,'keyword_id'); ?>
		<?php echo $form->error($model,'keyword_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keyword_position'); ?>
		<?php echo $form->textField($model,'keyword_position',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'keyword_position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'engine'); ?>
		<?php echo $form->textField($model,'engine',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'engine'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->