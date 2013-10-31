<?php
/* @var $this CallerResultController */
/* @var $model CallerResult */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'caller-result-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>
<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'caller_res_id'); ?>
		<?php echo $form->textField($model,'caller_res_id'); ?>
		<?php echo $form->error($model,'caller_res_id'); ?>
	</div>

	<div class="row">
        <?php echo CHtml::hiddenField('text', 'caller_res_id', '6', array('view', 'id'=>$data->id)); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>
*/	?>
	<div class="row">
		<?php echo $form->labelEx($model,'status_res_id'); ?>
		<br>
		<?php /*echo $form->dropDownList($model,'status_res_id',
			array('empty'=>'', 
			1=>'1 - Отправлено коммер. предложение',
			2=>'2 - Назначена встреча',
			3=>'3 - Договоренность о пролонгации',
			4=>'4 - Получена рекомендация',
			6=>'6 - Думает созвонится позже')); */?>
			<?php echo $form->radioButtonList($model,'status_res_id',array(
			7=>'Ошибочный номер',
			0=>'0 - Недозвон',
			1=>'1 - Отправлено коммер. предложение',
			2=>'2 - Назначена встреча',
			3=>'3 - Договоренность о пролонгации',
			4=>'4 - Получена рекомендация',
			5=>'5 - Отказ от услуг',
			6=>'6 - Думает созвонится позже'));?>
		<?php echo $form->error($model,'status_res_id'); ?>
	</div>
<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>
*/	?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->