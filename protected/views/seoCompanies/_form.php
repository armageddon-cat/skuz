<?php
/* @var $this SeoCompaniesController */
/* @var $model SeoCompanies */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'seo-companies-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>
<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>
*/?>
	<div class="row">
		<?php echo $form->labelEx($model,'company_name'); ?>
		<?php echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'company_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h1'); ?>
		<?php echo $form->textField($model,'h1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'h1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h2'); ?>
		<?php echo $form->textField($model,'h2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'h2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h3'); ?>
		<?php echo $form->textField($model,'h3',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'h3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h4'); ?>
		<?php echo $form->textField($model,'h4',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'h4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'density'); ?>
		<?php echo $form->textField($model,'density',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'density'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->