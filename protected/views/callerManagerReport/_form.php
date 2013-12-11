<?php
/* @var $this CallerManagerReportController */
/* @var $model CallerManagerReport */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'caller-manager-report-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    )
)); ?>

<!--	<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>
<?/*
	<div class="row">
		<?php echo $form->labelEx($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
		<?php echo $form->error($model,'time'); ?>
	</div>
*/?>
	<div class="row">
		<?php echo $form->labelEx($model,'company'); ?>
		<?php echo $form->textField($model,'company',array('size'=>50,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'company'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>11,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_address'); ?>
		<?php echo $form->textField($model,'company_address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'company_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_person'); ?>
		<?php echo $form->textField($model,'contact_person',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contact_person'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'business_type'); ?>
		<?php echo $form->textField($model,'business_type',array('size'=>50,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'business_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_type'); ?>
		<?php echo $form->textField($model,'service_type',array('size'=>11,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'service_type'); ?>
	</div>
<? /*
	<div class="row">
		<?php echo $form->labelEx($model,'next_call'); ?>
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
	</div> */?>
	<div class="row">
		<?php echo $form->labelEx($model,'next_meeting_date'); ?>
		<?php 
$this->widget('application.extensions.timepicker.EJuiDateTimePicker',array(
    'model'=>$model,
    'attribute'=>'next_meeting_date',
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
		<?php echo $form->error($model,'next_meeting_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_type'); ?>
		<?php echo $form->textField($model,'contact_type',array('size'=>11,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contact_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>
<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'caller_id'); ?>
		<?php echo $form->textField($model,'caller_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'caller_id'); ?>
	</div>
*/?>
	<div class="row">
		<?php echo $form->labelEx($model,'call_status'); ?>
		<?php echo $form->textField($model,'call_status'); ?>
		<?php echo $form->error($model,'call_status'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'meeting_result'); ?>
		<?php echo $form->dropDownList($model, 'meeting_result', Meeting::all(), array('empty'=>'')); ?>
		<?php echo $form->error($model,'meeting_result'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'comm_proposal'); ?>
		<?php echo $form->dropDownList($model, 'comm_proposal', CommProposal::all(), array('empty'=>'')); ?>
		<?php echo $form->error($model,'comm_proposal'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'contract'); ?>
		<?php echo $form->dropDownList($model, 'contract', Contract::all(), array('empty'=>'')); ?>
		<?php echo $form->error($model,'contract'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'manager_comment'); ?>
		<?php echo $form->textArea($model, 'manager_comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'manager_comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'importancy'); ?>
		<?php echo $form->dropDownList($model, 'importancy', Importancy::all()); ?>
		<?php echo $form->error($model,'importancy'); ?>
	</div>

	<?php if (Yii::app()->user->role==3){ ?>
		<div class="row">
			<?php echo $form->labelEx($model,'seo_audit_done'); ?>
			<?php echo $form->dropDownList($model, 'seo_audit_done', SeoAuditDone::all()); ?>
			<?php echo $form->error($model,'seo_audit_done'); ?>
		</div>
		<?php echo CHtml::activeFileField($model, 'seo_file'); ?>
	<?php } ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->