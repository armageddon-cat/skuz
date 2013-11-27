<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<?php if(Yii::app()->user->checkAccess('5')){
    echo "hello, I'm administrator";
}
 ?>
 <br>

<!--
<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php //echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php //echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>-->
<h4>Доступные действия:</h4>
<div><?php 

if(Yii::app()->user->isGuest) {
		echo CHtml::link('Логин', array('/site/login'));
		echo "<br>";
		//echo CHtml::link('Регистрация', array('/site/registration'));
		echo "<br>";
	} else if(Yii::app()->user->role==1) {
		echo CHtml::link('Отчет по звонку', array('/callerResult/create'));
		echo "<br>";
		echo CHtml::link('Заполнить отчет', array('/callerReport/create'));
	} else if(Yii::app()->user->role==2) {
		echo CHtml::link('Список отчетов', array('callerManagerReport/index'));
	} else if(Yii::app()->user->role==4) {
		echo CHtml::link('Список отчетов', array('/callerReport/index'));
	} else if(Yii::app()->user->role==6) {
		echo CHtml::link('Ежедневный отчет', array('/callerResult/my'));
		echo "<br>";
		echo CHtml::link('План по встречам', array('/callerReport/timeTable'));
		echo "<br>";
		echo CHtml::link('Вся статистика по заказам', array('/callerReport/index'));
	}

?>

</div>