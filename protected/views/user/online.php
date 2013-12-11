<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */
// Сначала получаем данные о сервере
$dom = $_SERVER['HTTP_HOST'];
$ipus = getenv('REMOTE_ADDR');
// Если сервер - не localhost, то мы продолжим код
/*
Примечание: если хотите, можете эту проверку вырубить. Просто лично у меня она не прокатывала с денвера
*/
if ($dom != "localhost"){
// Формируем адрес подключения
//$fl = "http://ip-whois.net/ip_geo.php?ip=".$ipus;
//	$fl = "http://ip-whois.net/ip_geo.php?ip=".$ipus;
	$fl = "http://ipgeobase.ru:7020/geo/?ip=".$ipus;
	echo $fl;
// Получаем эти данные через file_get_contents()
/*
Примечание: при использовании fopen() - не прокатывало...
*/
$data = file_get_contents($fl);
//echo $data;
var_dump($data);

//$data=iconv("windows-1251", "utf-8", $data);
/*
Получив данные, мы получили ОГРОМНУЮ страницу. Следовательно, нам нужно её обрезать так, чтобы осталась только надпись города (Город: [полученный город]). Если вы откроете страницу http://ip-whois.net/ip_geo.php?ip=какой-нибудь_IP, то Вы увидите, что страница обработала данные и получила город. Вскрыв исходный код страницы, вы увидите, что там присутствует 2 надписи "Город: [город]": первая - в JS-скрипте, вторая - ниже. Для обрезания мы используем функцию strstr(), и, чтобы обрезать ПРАВИЛЬНО, сначала обрежем до места </IFRAME>, чтобы перейти ЗА надпись в JS-скрипте...
*/
//$data = strstr($data, "</IFRAME>");
//$data = strstr($data, "</city>");
//echo $data;
// А теперь непосредственно обрезаем от надписи "Город: "
//$data = strstr($data, "Город: ");
//echo "$data";
/*
Теперь посмотрите: третье обрезание присвоил другой переменной. Это нужно для того, чтобы после того, как обрезать второй раз, мы заменили ТАКУЮ ЖЕ оставшуюся часть в $data по образцу из $data2
*/
//$data2 = strstr($data, "<br>");
// Производим удаление, о котором я говорил выше
//$data3 = str_replace($data2, "", $data);
// Выводим полученный город на экран
//echo $data3;
 
//echo "string";
// А это про localhost, о котором говорилось выше
} else {
$data3 = "Неподходящий хост";
}
?>
<h1>Юзеры онлайн</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'htmlOptions'=>array('style'=>'width: 900px'),
	'dataProvider'=>$dataProvider,
	/*'filter'=>$model,*/
	'columns'=>array(
		'id'=>array(
			'name'=>'id',
			'headerHtmlOptions'=>array('width'=>30)
		),
		'login',
		'realname',
		'surname',
		'role'=>array(
			'name'=>'role',
			'value'=>'$data->rolename->role_name',
			'filter'=>array(1=>'Диспетчер', 2=>'Менеджер', 3=>'Seo-менеджер', 4=>'Босс', 5=>'Администратор' , 6=>'Топ-Диспетчер' ),
	
		),
		'last_move'=> array(
                    'name'=>'last_move',
                    'type' => 'raw',
					'value'=>function($data){
						$onetime = date("Y-m-d H");
						$onetimeM = date("i");


						$secondtime = substr($data->last_move, 0, 13);
						$secondtimeM = substr($data->last_move, 14, 2);

						$res = $onetimeM - $secondtimeM;

						if ($onetime==$secondtime && $res < 10) {
							return '<span class="green">Онлайн</span>';
						} else { return '<span class="red">Оффлайн</span>'; }
				 	 
				},

                 
        ),
	),
)); ?>
