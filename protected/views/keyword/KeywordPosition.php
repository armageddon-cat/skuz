<?php
//header('Content-type:text/html; charset=windows-1251');
//header('Content-type:text/html; charset=utf-8');
require_once 'simple_html_dom.php';

// установка URL и других необходимых параметров
$for_post = 'url=http%3A%2F%2Fabcweb.com.ua&xquery=%EF%F0%EE%E4%E2%E8%E6%E5%ED%E8%E5+%F1%E0%E9%F2%E0&ses=1&googleg=3&googleh=0&glsh=0&yar=0&yareg=';
$url = "http://xseo.in/pos";
$user_agent = "User-Agent: Mozilla/5.0 (Windows NT 6.2; WOW64; rv:24.0) Gecko/20100101 Firefox/24.0";
$referer = "http://xseo.in/pos";
$headers = array
(
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    'Accept-Language: ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3',
    'Accept-Encoding: deflate',
); 

$ch = curl_init($url);
# /forum/loginout.php HTTP/1.1

curl_setopt($ch, CURLOPT_POST, 1);
# POST /forum/..


curl_setopt ($ch, CURLOPT_USERAGENT, $user_agent); 
# User-Agent

curl_setopt($ch, CURLOPT_HTTPHEADER,$headers); 
# добавляем заголовков к нашему запросу. Чтоб смахивало на настоящих

curl_setopt($ch, CURLOPT_REFERER, $referer);
# Подделываем значение - откуда пришли данные.

curl_setopt($ch, CURLOPT_POSTFIELDS, $for_post);
# post данные.
# умная libcurl сама добавит заголовки
# Content-Type: application/x-www-form-urlencoded и Content-Length: 71

curl_setopt($ch, CURLOPT_COOKIEJAR, "my_cookies.txt");  
curl_setopt($ch, CURLOPT_COOKIEFILE, "my_cookies.txt");  
# Функции для обработки установливаемых форумом кук.
# подробнее рассмотрим далее.

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
# Убираем вывод данных в браузер. Пусть функция их возвращает а не выводит

$page = $page = curl_exec($ch); // выполняем запрос curl
curl_close($ch);

	
	$html= str_get_html($page); 
	$stack = $html->find('html body table tbody tr td table tbody tr td table tbody tr.cls8 td');
//print_r($html->find('html body table tbody tr td table tbody tr td table tbody tr.cls8 td'));

	// foreach($html->find('html body table tbody tr td table tbody tr td table tbody tr.cls8 td') as $element) {
	// 	echo $element;
 //    }

	$fruit = array_pop($stack);
	//$numbers = preg_replace( "/\<u\>\D\<\/u\>/", '' , $fruit );
	preg_match("/<u>\d*<\/u>/", $fruit, $matches);
	//echo $fruit;
	//echo $numbers;
	//print_r($matches);
	echo $matches[0];
	//echo $stack;
	//echo "adfasdf";
	//	print_r($fruit->find('font.cls10 font.cls100'));

?>