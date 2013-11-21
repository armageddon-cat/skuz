<?php
/* @var $this KeywordController */
/* @var $model Keyword */
/* @var $form CActiveForm */
?>
<?php
Yii::app()->clientScript->registerScriptFile('/js/datepicker.js');
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



	<?php echo $form->errorSummary($model); ?>
<?php if(Yii::app()->user->role==7) {} else { ?>
		<p class="note">Выбор компании.</p>
	<div class="row">
		<?php echo $form->labelEx($model,'company_id'); ?>
		<?php echo $form->dropDownList($model,'company_id', SeoCompanies::all()); ?>
		<?php echo $form->error($model,'company_id'); ?>
	</div>
<?php } ?>
	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date',array('size'=>60,'maxlength'=>60,'placeholder'=>'Введите дату в формате гггг-мм-дд. Например 2013-11-12')); ?>
		<?php /*
		$this->widget('application.extensions.timepicker.EJuiDateTimePicker',array(
		    'model'=>$model,
		    'attribute'=>$model->date->date,
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
		*/?>
		<?php echo $form->error($model,'date'); ?>
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