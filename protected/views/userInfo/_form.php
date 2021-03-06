<?php
/* @var $this UserInfoController */
/* @var $model UserInfo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-info-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'photo'); ?>
	</div>

	 <div class="row buttons">
        <?php echo CHtml::hiddenField('uploaded', '', array('id'=>'uploaded')); ?>
		<?php 
if($model->photo){
echo CHtml::image("/files/".$model->id."/".$model->photo, "", array("width"=>200)); 
}
		 ?>
    </div>
	
	<?$this->widget('ext.EFineUploader.EFineUploader',
 array(
       'id'=>'FineUploader',
       'config'=>array(
                       'autoUpload'=>true,
                       'request'=>array(
						   'endpoint'=>$this->createUrl('upload'),
                          'params'=>array('YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken),
                                       ),
                       'retry'=>array('enableAuto'=>true,'preventRetryResponseProperty'=>true),
                       'chunking'=>array('enable'=>true,'partSize'=>100),//bytes
                       'callbacks'=>array(
						      'onComplete'=>"js:function(id, name, response){ document.getElementById('uploaded').value=name; }",
                                        'onError'=>"js:function(id, name, errorReason){ }",
                                         ),
                       'validation'=>array(
                                 'allowedExtensions'=>array('jpg','jpeg', 'png', 'gif'),
						     'sizeLimit'=>2 * 1024 * 1024,//maximum file size in bytes
						   //     'minSizeLimit'=>2*1024*1024,// minimum file size in bytes
                                          ),
                      )
      ));
 
?>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'birthday'); ?>
		<?php echo $form->textField($model,'birthday',array('size'=>11,'maxlength'=>11, 'placeholder'=>'01.01.1970')); ?>
		<?php echo $form->error($model,'birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'about_myself'); ?>
		<?php echo $form->textArea($model,'about_myself',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'about_myself'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->