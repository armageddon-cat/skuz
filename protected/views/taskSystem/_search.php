<?php
/* @var $this TaskSystemController */
/* @var $model TaskSystem */
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
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified_by'); ?>
		<?php echo $form->textField($model,'modified_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modify_time'); ?>
		<?php echo $form->textField($model,'modify_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'first_deadline'); ?>
		<?php echo $form->textField($model,'first_deadline'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deadline'); ?>
		<?php echo $form->textField($model,'deadline'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deadline_change_time'); ?>
		<?php echo $form->textField($model,'deadline_change_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deadline_change_by'); ?>
		<?php echo $form->textField($model,'deadline_change_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'task'); ?>
		<?php echo $form->textArea($model,'task',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'task_change_time'); ?>
		<?php echo $form->textField($model,'task_change_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'task_change_by'); ?>
		<?php echo $form->textField($model,'task_change_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'first_executor'); ?>
		<?php echo $form->textField($model,'first_executor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'executor'); ?>
		<?php echo $form->textField($model,'executor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'executor_change_time'); ?>
		<?php echo $form->textField($model,'executor_change_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'executor_change_by'); ?>
		<?php echo $form->textField($model,'executor_change_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'executor_comment'); ?>
		<?php echo $form->textArea($model,'executor_comment',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'executor_comment_change_time'); ?>
		<?php echo $form->textField($model,'executor_comment_change_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'executor_comment_change_by'); ?>
		<?php echo $form->textField($model,'executor_comment_change_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_change_time'); ?>
		<?php echo $form->textField($model,'status_change_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_change_by'); ?>
		<?php echo $form->textField($model,'status_change_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'task_file'); ?>
		<?php echo $form->textField($model,'task_file',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'executor_file'); ?>
		<?php echo $form->textField($model,'executor_file',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'priority'); ?>
		<?php echo $form->textField($model,'priority'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->