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
	<!--noindex-->
<?if (Yii::app()->user->role!=7) { if(!Yii::app()->user->isGuest) { ?>
	<div id="slideout-callendar">
		<p>Календарь</p>
		<div id="slideout_inner-callendar">
			<?php 
			Yii::import('application.controllers.CallerReportController');
			@$controller = new CallerReportController;

			$controller->actionCallendar();
			?>
		</div>
	</div>
<?}}?>
<?if (Yii::app()->user->role!=7) { if(!Yii::app()->user->isGuest) { ?>
<div id="slideout">
  <p>Рейтинг<br />диспетчеров</p>
  <div id="slideout_inner">
  	<table>
    <?php 		
 	for ($i=6; $i <= 9; $i++) { 
 		$result = Yii::app()->db->createCommand("SELECT COUNT(id) FROM `o_caller_report` WHERE caller_id = ".$i." and call_status=2 and `time` >= 20131101")->queryAll();
 		$name = Yii::app()->db->createCommand("SELECT realname, surname FROM `o_user` WHERE id = ".$i."")->queryAll();
 		$res1 = $result[0]['COUNT(id)'];
 		$res2 = $name[0]['realname']." ".$name[0]['surname'];
 		$callers[$res2] = $res1;
 		$urls[$res2] = $i;

 	}
 	arsort($callers);  
 	$i = 0;
 	?>
<?php foreach ($callers as $key => $value) { $i++;?>
 		<tr>
 			<td>
 				<?php 
 					foreach ($urls as $urlskey => $urlsvalue) {
 						if ($key==$urlskey) {
 							echo CHtml::link($key, array('callerReport/CallerMeetingsRating', 'id'=>$urlsvalue));
 						}
 					}
 				?></td>
 			<td><?php echo $value; ?></td>
 			<td><?php if ($i == 1) { ?>
 				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/green.jpg" alt="" />
 			<?php }elseif ($i == 2 || $i == 3) { ?>
 				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/yellow.jpg" alt="" />
 			<?php }elseif ($i == 4) { ?>
 				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/red.jpg" alt="" />
 			<?php } ?>
 			</td>
 		</tr>
<?php } ?>
 	</table>
  </div>
</div>
<?}}?>
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

		$this->widget('ext.cssmenu.CssMenu',array(
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
				array('label'=>'Этап 1', 'url'=>array('/callerResult/create'), 'visible'=>Yii::app()->user->role==1),
				array('label'=>'Ежедневный отчет', 'url'=>array('/callerResult/my'), 'visible'=>Yii::app()->user->role==6),
				array('label'=>'План по контактам', 'url'=>array('/callerReport/timeTable'), 'visible'=>Yii::app()->user->role==6),
				array('label'=>'Написать сообщение', 'url'=>array('/post/create'), 'visible'=>Yii::app()->user->role==5),
				array('label'=>'Этап 2', 'url'=>array('/callerReport/create'), 'visible'=>Yii::app()->user->role==1),
				array('label'=>'Все отчеты', 'url'=>array('/callerReport/myreport'), 'visible'=>Yii::app()->user->role==1),
				array('label'=>'Все отчеты', 'url'=>array('callerManagerReport/index'), 'visible'=>Yii::app()->user->role==2),

				array('label'=>'Создать отчет', 'url'=>array('/projectManagerReport/create'), 'visible'=>Yii::app()->user->role==4),
				array('label'=>'Список отчетов', 'url'=>array('/callerReport/index'), 'visible'=>Yii::app()->user->role==4, 'items'=>array(
					            array('label'=>'Задания', 'url'=>array('/TaskSystem/admin')),
					            array('label'=>'Все задания', 'url'=>array('/TaskSystem/viewAll')),
					            array('label'=>'Ежедневные отчеты', 'url'=>array('/everydayReport/admin')),
					       	)),
				array('label'=>'Отчеты по приоритетам', 'url'=>array('#'), 'visible'=>Yii::app()->user->role==4, 'items'=>array(
					            array('label'=>'Обычный приоритет', 'url'=>array('/callerManagerReport/LowImportancyRp')),
					            array('label'=>'Высокий приоритет', 'url'=>array('/callerManagerReport/MediumImportancyRp')),
					            array('label'=>'СверхВысокий приоритет', 'url'=>array('/callerManagerReport/HighImportancyRp')),
					       	)),

				array('label'=>'Встречи', 'url'=>array('#'), 'visible'=>Yii::app()->user->role==4, 'items'=>array(
		            array('label'=>'Назначенные встречи', 'url'=>array('/CallerManagerReport/RpMeetings')),
		            array('label'=>'Встречи в процессе', 'url'=>array('/CallerManagerReport/RpMeetingsProcessing')),
		            array('label'=>'Архив Встреч', 'url'=>array('/CallerManagerReport/RpMeetingsArchive')),
		       	)),

		       	array('label'=>'Все Ком.Пред.', 'url'=>array('/callerManagerReport/RpCommProposals'), 'visible'=>Yii::app()->user->role==4, 'items'=>array(
					            array('label'=>'Отправленные Ком.Пред.', 'url'=>array('/callerManagerReport/RpCommProposalsSent')),
					            array('label'=>'Не Отправленные Ком.Пред.', 'url'=>array('/callerManagerReport/RpCommProposalsNotSent')),
					       	)),

				array('label'=>'Онлайн заявки', 'url'=>array('/commOfferShort/index'), 'visible'=>Yii::app()->user->role==4),

				array('label'=>'Персонал', 'url'=>array('#'), 'visible'=>Yii::app()->user->role==4, 'items'=>array(
		            array('label'=>'Пользователи Онлайн', 'url'=>array('/user/online')),
		            array('label'=>'Эффективность диспетчеров', 'url'=>array('/callerResult/my')),
		            array('label'=>'Ежедневные отчеты', 'url'=>array('/everydayReport/admin')),
		       	)),
				array('label'=>'SEO', 'url'=>array('#'), 'visible'=>Yii::app()->user->role==4, 'items'=>array(
					array('label'=>'Аудиты', 'url'=>array('/callerManagerReport/HighImportancySeo')),
		            array('label'=>'Добавление компании', 'url'=>array('/seoCompanies/create')),
		            array('label'=>'Импорт ключевых слов', 'url'=>array('/keyword/keywordImport')),
		            array('label'=>'Просмотр ключевых слов', 'url'=>array('/keyword/ChooseCompany')),
		            array('label'=>'Просмотр компаний', 'url'=>array('/seoCompanies/admin')),
		       	)),


				array('label'=>'Всякое по сео', 'url'=>array('#'), 'visible'=>Yii::app()->user->role==3, 'items'=>array(
		            array('label'=>'Добавление компании', 'url'=>array('/seoCompanies/create')),
		            array('label'=>'Добавление клиента', 'url'=>array('/user/create')),
		            array('label'=>'Импорт ключевых слов', 'url'=>array('/keyword/keywordImport')),
		            array('label'=>'Просмотр ключевых слов', 'url'=>array('/keyword/ChooseCompany')),
		            array('label'=>'Просмотр компаний', 'url'=>array('/seoCompanies/admin')),

		       	)),
				array('label'=>'Аудиты', 'url'=>array('/callerManagerReport/HighImportancySeo'), 'visible'=>Yii::app()->user->role==3),

				array('label'=>'Просмотр ключевых слов', 'url'=>array('/keyword/ChooseCompany'), 'visible'=>Yii::app()->user->role==7),
				
				array('label'=>'<span class="'.$res.'">Расписание</span>', 'url'=>array('/callerReport/callerTimeTable'), 'visible'=>Yii::app()->user->role==1),
				array('label'=>'Встречи', 'url'=>array('/callerReport/callerMeetings'), 'visible'=>Yii::app()->user->role==1, 'items'=>array(
		            array('label'=>'Архив встреч', 'url'=>array('/callerReport/callerMeetingsArchive')),
		       	)),
				array('label'=>'Ком.Пред.', 'url'=>array('/callerReport/CallerCommProposals'), 'visible'=>Yii::app()->user->role==1),
								array('label'=>'Отчеты по приоритетам', 'url'=>array('#'), 'visible'=>Yii::app()->user->role==1, 'items'=>array(
					            array('label'=>'Обычный приоритет', 'url'=>array('/callerManagerReport/LowImportancyRp')),
					            array('label'=>'Высокий приоритет', 'url'=>array('/callerManagerReport/MediumImportancyRp')),
					            array('label'=>'СверхВысокий приоритет', 'url'=>array('/callerManagerReport/HighImportancyRp')),
					       	)),
				array('label'=>'Все Встречи', 'url'=>array('/callerReport/Meetings'), 'visible'=>Yii::app()->user->role==6),

				array('label'=>'Встречи', 'url'=>array('#'), 'visible'=>Yii::app()->user->role==2, 'items'=>array(
		            array('label'=>'Назначенные встречи', 'url'=>array('/callerManagerReport/ManagerMeetings')),
		            array('label'=>'Встречи в процессе', 'url'=>array('/callerManagerReport/ManagerMeetingsProcessing')),
		            array('label'=>'Архив Встреч', 'url'=>array('/callerManagerReport/ManagerMeetingsArchive')),
		       	)),

				array('label'=>'Отчеты по приоритетам', 'url'=>array('#'), 'visible'=>Yii::app()->user->role==2, 'items'=>array(
					            array('label'=>'Обычный приоритет', 'url'=>array('/callerManagerReport/LowImportancy')),
					            array('label'=>'Высокий приоритет', 'url'=>array('/callerManagerReport/MediumImportancy')),
					            array('label'=>'СверхВысокий приоритет', 'url'=>array('/callerManagerReport/HighImportancy')),
					       	)),


				array('label'=>'Все Ком.Пред.', 'url'=>array('/callerManagerReport/CommProposals'), 'visible'=>Yii::app()->user->role==2, 'items'=>array(
					            array('label'=>'Отправленные Ком.Пред.', 'url'=>array('/callerManagerReport/CommProposalsSent')),
					            array('label'=>'Не Отправленные Ком.Пред.', 'url'=>array('/callerManagerReport/CommProposalsNotSent')),
					       	)),
				array('label'=>'Онлайн заявки', 'url'=>array('/commOfferShort/index'), 'visible'=>Yii::app()->user->role==2),
				array('label'=>'Создать отчет', 'url'=>array('/projectManagerReport/create'), 'visible'=>Yii::app()->user->role==2),

				array('label'=>'Статистика', 'url'=>array('/callerResult/CallerTodayReport'), 'visible'=>Yii::app()->user->role==1),
				array('label'=>'Недозвоны', 'url'=>array('/callLater/admin'), 'visible'=>Yii::app()->user->role==1),

				array('label'=>'Отчеты диспетчеров', 'url'=>array('/callerReport/admin'), 'visible'=>Yii::app()->user->role==5),
				array('label'=>'Отчеты менеджеров', 'url'=>array('/salesReport/admin'), 'visible'=>Yii::app()->user->role==5),
				array('label'=>'Статистика', 'url'=>array('/statistics'), 'visible'=>Yii::app()->user->role==5),
				array('label'=>'Все отчеты', 'url'=>array('/callerReport/index'), 'visible'=>Yii::app()->user->role==6),
				array('label'=>'Отчеты по приоритетам', 'url'=>array('#'), 'visible'=>Yii::app()->user->role==6, 'items'=>array(
					            array('label'=>'Обычный приоритет', 'url'=>array('/callerManagerReport/LowImportancyRp')),
					            array('label'=>'Высокий приоритет', 'url'=>array('/callerManagerReport/MediumImportancyRp')),
					            array('label'=>'СверхВысокий приоритет', 'url'=>array('/callerManagerReport/HighImportancyRp')),
					       	)),
		       	array('label'=>'Все Ком.Пред.', 'url'=>array('/callerManagerReport/RpCommProposals'), 'visible'=>Yii::app()->user->role==6, 'items'=>array(
					            array('label'=>'Отправленные Ком.Пред.', 'url'=>array('/callerManagerReport/RpCommProposalsSent')),
					            array('label'=>'Не Отправленные Ком.Пред.', 'url'=>array('/callerManagerReport/RpCommProposalsNotSent')),
					       	)),
				array('label'=>'Скачать отчет', 'url'=>array('/callerReport/admin'), 'visible'=>Yii::app()->user->role==6),
				array('label'=>'Добавление проекта', 'url'=>array('/projects/create'), 'visible'=>Yii::app()->user->role==3),
				array('label'=>'Кликни сюда и Попади в свои Задания', 'url'=>array('/TaskSystem/admin'), 'visible'=>(Yii::app()->user->role==3 || Yii::app()->user->role==8 || Yii::app()->user->role==9 || Yii::app()->user->role==10)),
				array('label'=>'Ежедневные отчеты', 'url'=>array('/everydayReport/admin'), 'visible'=>(Yii::app()->user->role==3 || Yii::app()->user->role==8 || Yii::app()->user->role==9 || Yii::app()->user->role==10)),
				array('label'=>'Войти', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				/*array('label'=>'Регистрация', 'url'=>array('/site/registration'), 'visible'=>Yii::app()->user->isGuest),*/
				array('label'=>'Выйти ('.$user_name." ".$user_surname.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
		            array('label'=>'Задания', 'url'=>array('/TaskSystem/admin'), 'visible'=>(Yii::app()->user->role!=3 && Yii::app()->user->role!=4 && Yii::app()->user->role!=8 && Yii::app()->user->role!=9 && Yii::app()->user->role!=10)),
		       	)),

			),
			/*'encodeLabel'=>false,*/
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
		Copyright &copy; <?php echo date('Y'); ?><br/>
		Все права защищены.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->
<!--/noindex-->
</body>
</html>