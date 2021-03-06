<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
$this->pageTitle=Yii::app()->name . ' - Регистрация';
?>
<?php if(Yii::app()->user->hasFlash('registration')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>

<?php else: ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Поля помеченные <span class="required">*</span> обязательны.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'login'); ?>
        <?php echo $form->textField($model,'login',array('size'=>20,'maxlength'=>20)); ?>
        <?php echo $form->error($model,'login'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>
	
	<div class="row">
        <?php echo $form->labelEx($model,'realname'); ?>
        <?php echo $form->textField($model,'realname',array('size'=>20,'maxlength'=>20)); ?>
        <?php echo $form->error($model,'realname'); ?>
    </div>
	
	<div class="row">
        <?php echo $form->labelEx($model,'surname'); ?>
        <?php echo $form->textField($model,'surname',array('size'=>20,'maxlength'=>20)); ?>
        <?php echo $form->error($model,'surname'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>40)); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'role'); ?>
		<?php echo $form->dropDownList($model, 'role', Roles::all(), array('empty'=>'')); ?>
		<?php echo $form->error($model,'role'); ?>
	</div>
	
    <div class="row buttons">
        <?php echo CHtml::submitButton('Регистрация'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php endif; ?>