<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Вход';
/* $this->breadcrumbs=array(
	'Login',
); */
?>
<? $userag = $_SERVER['HTTP_USER_AGENT'];
if (!(strpos($userag, 'Android') || strpos($userag, 'iPhone') || strpos($userag, 'iPad'))) {?>
<h1>Вход</h1>

<p>Введите Ваши данные:</p>
<?}else{?>
<div class="header-container logo">
			<div class="wrap">
				<header class="wrapper clearfix">
					<a class="logo" href="#">
						<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png" />
					</a>
				</header>
			</div>
		</div>

		<div class="main-container login">
			<div class="wrap">
				<div class="main wrapper clearfix"> <?}?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="row item">
		<?php if (!(strpos($userag, 'Android') || strpos($userag, 'iPhone') || strpos($userag, 'iPad'))) { echo $form->labelEx($model,'username');} ?>
		<?php echo $form->textField($model,'username', array('placeholder'=>'Login')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row item">
		<?php if (!(strpos($userag, 'Android') || strpos($userag, 'iPhone') || strpos($userag, 'iPad'))) {echo $form->labelEx($model,'password');} ?>
		<?php echo $form->passwordField($model,'password', array('placeholder'=>'Password')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row rememberMe item">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons item">
		<?php echo CHtml::submitButton('Войти', array('class'=>'sbm')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form --><?if (strpos($userag, 'Android') || strpos($userag, 'iPhone') || strpos($userag, 'iPad')) {?>
						</div>
				</div>
			</div>
		</div>

		<div class="loader">
			<div class="wrap">
				<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/img/ajax_loader.gif" />
			</div>
		</div><?}?>
