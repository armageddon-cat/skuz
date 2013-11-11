<?php
/* @var $this KeywordController */
/* @var $model Keyword */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'keyword-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Выбор компании.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'company_id'); ?>
		<?php echo $form->dropDownList($model,'company_id', SeoCompanies::all()); ?>
		<?php echo $form->error($model,'company_id'); ?>
	</div>
<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'keyword'); ?>
		<?php echo $form->textField($model,'keyword',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'keyword'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'search_engine'); ?>
		<?php echo $form->textField($model,'search_engine',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'search_engine'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
*/?>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Поехали'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->