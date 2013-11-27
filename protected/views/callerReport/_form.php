<?php
/* @var $this CallerReportController */
/* @var $model CallerReport */
/* @var $form CActiveForm */
?>
<?php
Yii::app()->clientScript->registerScriptFile('/js/datepicker.js');
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'caller-report-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля отмеченные <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>
<?php  /*
	<div class="row">
		<?php echo $form->labelEx($model,'time'); ?>
		<?php echo $form->textField($model,'time',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'time'); ?>
	</div>
	*/ ?>
	<div class="row">
		<?php echo $form->labelEx($model,'company'); ?>
		<?php echo $form->textField($model,'company',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'company'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'company_address'); ?>
		<?php echo $form->textField($model,'company_address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'company_address'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'site_address'); ?>
		<?php echo $form->textField($model,'site_address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'site_address'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'contact_person'); ?>
		<?php echo $form->textField($model,'contact_person',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'contact_person'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'contact_type'); ?>
		<?php echo $form->dropDownList($model, 'contact_type', ContactType::all(), array('empty'=>'')); ?>
		<?php echo $form->error($model,'contact_type'); ?>
	</div>
*/?>	
	<div class="row">
		<?php echo $form->labelEx($model,'service_type'); ?>
		<?php echo $form->dropDownList($model, 'service_type', Product::all(), array('empty'=>'')); ?>
		<?php echo $form->error($model,'service_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'additional_products'); ?><br>
		<?php echo $form->checkBoxList($model, 'additional_products', Product::all(), array('empty'=>'')); ?>
		<?php echo $form->error($model,'additional_products'); ?>
	</div>
	
	<div class="row">
		<?php  
			if ($_GET['st']==2) {
				echo $form->labelEx($model,'meeting_date'); 
			} else {
				echo $form->labelEx($model,'next_call'); 
			}
		?>
		<?php //echo $form->textField($model,'next_call', array('id'=>'next_call')); ?>
		<?php	/*$form->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'CallerReport[next_call]',
    'id' => 'next_call',
    'model' => $model,
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
    'language' => 'ru',
    )); */?>
	<?php 
$this->widget('application.extensions.timepicker.EJuiDateTimePicker',array(
    'model'=>$model,
    'attribute'=>'next_call',
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
		<?php echo $form->error($model,'next_call'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'business_type'); ?>
		<?php echo $form->textField($model,'business_type',array('size'=>50,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'business_type'); ?>
	</div>
<? /*
	<div class="row">
		<?php echo $form->labelEx($model,'call_status'); ?>
		<?php echo $form->dropDownList($model,'call_status',
			array('empty'=>'', 
			0=>'0 - Недозвон',
			1=>'1 - Отправлено коммер. предложение',
			2=>'2 - Назначена встреча',
			3=>'3 - Договоренность о пролонгации',
			4=>'4 - Получена рекомендация',
			5=>'5 - Отказ от услуг',
			6=>'6 - Думает созвонится позже')); ?>
		<?php echo $form->error($model,'call_status'); ?>
	</div>
	*/?>
	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'manager_id'); ?>
		<?php echo $form->dropDownList($model,'manager_id',
			array( 
			10=>'Ольга Рошмакова',
			11=>'Менеджер2',
			12=>'Менеджер3',
			13=>'Менеджер4',
			14=>'Менеджер5')); ?>
		<?php echo $form->error($model,'manager_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importancy'); ?>
		<?php echo $form->dropDownList($model, 'importancy', Importancy::all()); ?>
		<?php echo $form->error($model,'importancy'); ?>
	</div>
	
<?php 
/* if($model->isNewRecord){
	echo CHtml::label('Добавить в базу?');
echo CHtml::checkBox('to_database'); 
} */
	?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->