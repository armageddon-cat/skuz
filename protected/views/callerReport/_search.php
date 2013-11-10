<?php
/* @var $this CallerReportController */
/* @var $model CallerReport */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'next_call'); ?>
		<?php echo $form->textField($model,'next_call'); ?>
	</div>
<?php /*	
	<br>
	<div class="row">
		<?php echo $form->label($model,'caller_id'); ?>
		<?php echo $form->textField($model,'caller_id',array('size'=>30,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //$somedata = User::model()->find(realname); echo $somedata;?>
		<?php echo $form->label($model,'manager_id'); ?>
		<?php// echo $form->textField($model,'manager_id',array('size'=>30,'maxlength'=>255)); ?>
		<?php //echo $form->textField(User::model(),'realname',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->dropDownList(User::model(), 'realname', User::all()); ?>
	</div>

	*/?>

	<div class="row">
		<?php echo $form->label($model,'company'); ?>
		<?php echo $form->textField($model,'company',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_address'); ?>
		<?php echo $form->textField($model,'company_address',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_person'); ?>
		<?php echo $form->textField($model,'contact_person',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'business_type'); ?>
		<?php echo $form->textField($model,'business_type',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'service_type'); ?>
		<?php echo $form->textField($model,'service_type',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_type'); ?>
		<?php echo $form->textField($model,'contact_type',array('size'=>11,'maxlength'=>11)); ?>
	</div>
<?php /*
	<div class="row">
		<?php echo $form->label($model,'comment'); ?>
		<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
	</div>
*/?>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->