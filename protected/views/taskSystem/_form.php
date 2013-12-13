<?php
/* @var $this TaskSystemController */
/* @var $model TaskSystem */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'task-system-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    )
)); ?>

	<p class="note">Обязательные поля <span class="required">*</span></p>

	<?php echo $form->errorSummary($model); ?>

	<?php if(!$model->isNewRecord && $model->executor!=Yii::app()->user->id || $model->isNewRecord || $model->created_by==$model->executor) { ?>
	<div class="row">
		<?php echo $form->labelEx($model,'topic'); ?>
		<?php echo $form->textField($model,'topic'); ?>
		<?php echo $form->error($model,'topic'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'task'); ?>
		<?php echo $form->textArea($model,'task',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'task'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'deadline'); ?>
		<?php 
			$this->widget('application.extensions.timepicker.EJuiDateTimePicker',array(
			    'model'=>$model,
			    'attribute'=>'deadline',
			    'language' => 'ru',
			    'options'=>array(
			        'hourGrid' => 4,
			        'hourMin' => 0,
			        'hourMax' => 24,
			        'dateFormat' => 'yy-mm-dd',
			        'timeFormat' => 'hh:mm',
			        'changeMonth' => true,
			        'changeYear' => true,
			        ),
			    ));
		?>

	</div>
	<div class="row">
		<?php echo CHtml::Label('Задание без срока завершения:'); ?>
		<?php echo $form->checkBox($model,'neverStopTask'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'executor'); ?><br>
		<?php echo $form->dropDownList($model, 'executor', 
		array('empty'=>'Выберите человека или отдел', 
			User::allNames(),
			'seo'=>'SEO',
			'diz'=>'Дизайнеры',
			'html'=>'Верстка',
			'dev'=>'Разработчики',
		)); ?>
		<br>
		<?/*<div>Или отдел(не работает)</div>
		<?php echo $form->dropDownList($model, 'executor',
			array('empty'=>'', 
			0=>'SEO',
			1=>'Дизайнеры',
			2=>'Верстка',
			3=>'Разработчики',)); ?>*/?>
		<?php echo $form->error($model,'executor'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'priority'); ?>
		<?php echo $form->dropDownList($model, 'priority', Priority::all()); ?>
		<?php echo $form->error($model,'priority'); ?>
	</div>
	<div class="row">
		<?php echo CHtml::activeFileField($model, 'task_file'); ?>
	</div>
	<?php } ?>
	<?php if(!$model->isNewRecord && $model->executor==Yii::app()->user->id || !$model->isNewRecord && $model->created_by==$model->executor) { ?>
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model, 'status', SeoAuditDone::all()); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'executor_comment'); ?>
		<?php echo $form->textArea($model,'executor_comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'executor_comment'); ?>
	</div>
	<div class="row">
		<?php echo CHtml::activeFileField($model, 'executor_file'); ?>
	</div>
	<?php } ?>
<?/*
	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified_by'); ?>
		<?php echo $form->textField($model,'modified_by'); ?>
		<?php echo $form->error($model,'modified_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modify_time'); ?>
		<?php echo $form->textField($model,'modify_time'); ?>
		<?php echo $form->error($model,'modify_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_deadline'); ?>
		<?php echo $form->textField($model,'first_deadline'); ?>
		<?php echo $form->error($model,'first_deadline'); ?>
	</div>
*/?>

<?/*
	<div class="row">
		<?php echo $form->labelEx($model,'deadline_change_time'); ?>
		<?php echo $form->textField($model,'deadline_change_time'); ?>
		<?php echo $form->error($model,'deadline_change_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deadline_change_by'); ?>
		<?php echo $form->textField($model,'deadline_change_by'); ?>
		<?php echo $form->error($model,'deadline_change_by'); ?>
	</div>
*/?>

<?/*
	<div class="row">
		<?php echo $form->labelEx($model,'task_change_time'); ?>
		<?php echo $form->textField($model,'task_change_time'); ?>
		<?php echo $form->error($model,'task_change_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'task_change_by'); ?>
		<?php echo $form->textField($model,'task_change_by'); ?>
		<?php echo $form->error($model,'task_change_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_executor'); ?>
		<?php echo $form->textField($model,'first_executor'); ?>
		<?php echo $form->error($model,'first_executor'); ?>
	</div>
*/?>

<?/*
	<div class="row">
		<?php echo $form->labelEx($model,'executor_change_time'); ?>
		<?php echo $form->textField($model,'executor_change_time'); ?>
		<?php echo $form->error($model,'executor_change_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'executor_change_by'); ?>
		<?php echo $form->textField($model,'executor_change_by'); ?>
		<?php echo $form->error($model,'executor_change_by'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'executor_comment_change_time'); ?>
		<?php echo $form->textField($model,'executor_comment_change_time'); ?>
		<?php echo $form->error($model,'executor_comment_change_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'executor_comment_change_by'); ?>
		<?php echo $form->textField($model,'executor_comment_change_by'); ?>
		<?php echo $form->error($model,'executor_comment_change_by'); ?>
	</div>
*/?>

<?/*


	<div class="row">
		<?php echo $form->labelEx($model,'status_change_time'); ?>
		<?php echo $form->textField($model,'status_change_time'); ?>
		<?php echo $form->error($model,'status_change_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_change_by'); ?>
		<?php echo $form->textField($model,'status_change_by'); ?>
		<?php echo $form->error($model,'status_change_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'task_file'); ?>
		<?php echo $form->textField($model,'task_file',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'task_file'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'executor_file'); ?>
		<?php echo $form->textField($model,'executor_file',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'executor_file'); ?>
	</div>
*/?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->