<?php
/* @var $this SeoreportController */
/* @var $model Seoreport */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'keyword_id'); ?>
		<?php echo $form->textField($model,'keyword_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spent_seopult'); ?>
		<?php echo $form->textField($model,'spent_seopult'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spent_sape'); ?>
		<?php echo $form->textField($model,'spent_sape'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spent_seopult_client'); ?>
		<?php echo $form->textField($model,'spent_seopult_client'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spent_sape_client'); ?>
		<?php echo $form->textField($model,'spent_sape_client'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->