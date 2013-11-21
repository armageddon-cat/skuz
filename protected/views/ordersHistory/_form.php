<?php
/* @var $this OrdersHistoryController */
/* @var $model OrdersHistory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'orders-history-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<p>Добавление нового комментария к данному заказу.</p>
	<?php echo $form->errorSummary($model); ?>
<? /*
	<div class="row">
		<?php echo $form->labelEx($model,'report_id'); ?>
		<?php echo $form->textField($model,'report_id'); ?>
		<?php echo $form->error($model,'report_id'); ?>
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
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified_by'); ?>
		<?php echo $form->textField($model,'modified_by'); ?>
		<?php echo $form->error($model,'modified_by'); ?>
	</div>
*/?>
	<div class="row">
		<?php //echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	
<? /**/?>	
	<div class="row">
		<?php echo $form->labelEx($model,'next_contact_date'); ?>
		<?php 
			$this->widget('application.extensions.timepicker.EJuiDateTimePicker',array(
			    'model'=>$model,
			    'attribute'=>'next_contact_date',
			    'language' => 'ru',
			    'options'=>array(
			        'hourGrid' => 4,
			        'hourMin' => 0,
			        'hourMax' => 24,
			        'dateFormat' => 'yy-mm-dd',
			        'timeFormat' => 'hh:mm',
			        'changeMonth' => true,
			        'changeYear' => false,
	        	),
	   		));  
		?>
		<?php echo $form->error($model,'next_contact_date'); ?>
	</div>
<? /**/?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->