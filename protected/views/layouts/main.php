<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	
	<link type="text/css" href="/scripts/jquery-ui/css/ui-lightness/
jquery-ui-1.10.3.custom.css" rel="stylesheet" />
	<script src="/scripts/jquery-ui/js/jquery-1.9.1.js"></script>
<script src="/scripts/jquery-ui/js/jquery-ui-1.10.3.
custom.js"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
					<?php
if(!Yii::app()->user->isGuest) {
		if (Yii::app()->user->role==1) {
		$callerTimeTable = Yii::app()->db->createCommand('SELECT COUNT(id) FROM `o_caller_report` WHERE SUBSTR(next_call, 1, 10)="'.date('Y-m-d').'"  and caller_id = "'.Yii::app()->user->id.'"')->queryAll();
			echo "<div class=\"calls\">";
		echo $callerTimeTable[0]['COUNT(id)'];

		echo "</div>";
}}
?>
<?php if(!Yii::app()->user->isGuest) 
Yii::app()->db->createCommand('UPDATE `o_user` SET last_move=now() WHERE id="'.Yii::app()->user->id.'"')->execute();

 ?>
	</div><!-- header -->
<?php
if(!Yii::app()->user->isGuest) {
		$callerTimeTable = Yii::app()->db->createCommand("SELECT id, next_call FROM `o_caller_report` WHERE next_call = CURDATE() and caller_id = ".Yii::app()->user->id." ORDER BY next_call ASC")->queryAll();
		
		if(empty($callerTimeTable)) {
			$res = 'emptyClass';
		} else {
			$res = 'fullClass';
		}
}
?>
	<div id="mainmenu">
		<?php

		$user_id = Yii::app()->user->id;
		$user_info = User::model()->findByAttributes(array('id' => $user_id ));
		$user_name = $user_info->realname;
		$user_surname = $user_info->surname;

		$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Главная', 'url'=>array('/site/index'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'О нас', 'url'=>array('/site/page', 'view'=>'about'), 'visible'=>Yii::app()->user->role==5),
				array('label'=>'Контакты', 'url'=>array('/site/contact'), 'visible'=>Yii::app()->user->role==5),
				//array('label'=>'Анкета', 'url'=>array('/userInfo/create'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Анкета', 'url'=>array('/userInfo/create'), 'visible'=>Yii::app()->user->role==5),
				array('label'=>'Пользователи', 'url'=>array('/user'), 'visible'=>Yii::app()->user->role==5),
				//array('label'=>'Мои сообщения', 'url'=>array('/post/my'), 'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'Написать сообщение', 'url'=>array('/post/create'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Мои сообщения', 'url'=>array('/post/my'), 'visible'=>Yii::app()->user->role==5),
				array('label'=>'Отчет по звонку', 'url'=>array('/callerResult/create'), 'visible'=>Yii::app()->user->role==5),
				array('label'=>'Отчет по звонку', 'url'=>array('/callerResult/create'), 'visible'=>Yii::app()->user->role==1),
				array('label'=>'Ежедневный отчет', 'url'=>array('/callerResult/my'), 'visible'=>Yii::app()->user->role==6),
				array('label'=>'План по контактам', 'url'=>array('/callerReport/timeTable'), 'visible'=>Yii::app()->user->role==6),
				array('label'=>'Написать сообщение', 'url'=>array('/post/create'), 'visible'=>Yii::app()->user->role==5),
				array('label'=>'Заполнить отчет', 'url'=>array('/callerReport/create'), 'visible'=>Yii::app()->user->role==1),
				array('label'=>'Все мои отчеты', 'url'=>array('/callerReport/myreport'), 'visible'=>Yii::app()->user->role==1),
				array('label'=>'Список отчетов', 'url'=>array('callerManagerReport/index'), 'visible'=>Yii::app()->user->role==2),
				array('label'=>'Список отчетов', 'url'=>array('/callerReport/index'), 'visible'=>Yii::app()->user->role==4),
				array('label'=>'Онлайн заявки', 'url'=>array('/commersialOffer/index'), 'visible'=>Yii::app()->user->role==4),

				array('label'=>'Пользователи Онлайн', 'url'=>array('/user/online'), 'visible'=>Yii::app()->user->role==4),
				
				array('label'=>'<span class="'.$res.'">Мое расписание</span>', 'url'=>array('/callerReport/callerTimeTable'), 'visible'=>Yii::app()->user->role==1),
				array('label'=>'Статистика за сегодня', 'url'=>array('/callerResult/CallerTodayReport'), 'visible'=>Yii::app()->user->role==1),
				array('label'=>'Перезвоны по недозвонам', 'url'=>array('/callLater/admin'), 'visible'=>Yii::app()->user->role==1),
				array('label'=>'Отчеты диспетчеров', 'url'=>array('/callerReport/admin'), 'visible'=>Yii::app()->user->role==5),
				array('label'=>'Отчеты менеджеров', 'url'=>array('/salesReport/admin'), 'visible'=>Yii::app()->user->role==5),
				array('label'=>'Статистика', 'url'=>array('/statistics'), 'visible'=>Yii::app()->user->role==5),
				array('label'=>'Вся статистика по заказам', 'url'=>array('/callerReport/index'), 'visible'=>Yii::app()->user->role==6),
				array('label'=>'Скачать отчет', 'url'=>array('/callerReport/admin'), 'visible'=>Yii::app()->user->role==6),
				array('label'=>'Войти', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				/*array('label'=>'Регистрация', 'url'=>array('/site/registration'), 'visible'=>Yii::app()->user->isGuest),*/
				array('label'=>'Выйти ('.$user_name." ".$user_surname.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				
			),
			'encodeLabel'=>false,
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Dr.Intellectus.<br/>
		Все права защищены.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>