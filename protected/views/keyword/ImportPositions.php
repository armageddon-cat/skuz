<?php
/* @var $this KeywordController */
/* @var $model Keyword */
?>

<h1>Импорт ключевых слов из файла CSV</h1>
<?php

$file=file_get_contents(Yii::getPathOfAlias('webroot').'/upload/temp/report.htm');
if (empty($file)) {
	echo "error";
	//die();
} else {echo "success";}

		require_once 'simple_html_dom.php';


		$html= str_get_html($file); 
		$stack = $html->find('table tr');

		$cur_date = $html->find('table tr th', 1)->plaintext;
	
		$date_needed = explode('.', $cur_date);

		$import_date = '20'.$date_needed[2].'-'.$date_needed[1].'-'.$date_needed[0];

		$table = $html->find('table', 0);
		$engine = $table->id;

		if ($engine=='engine_table_G') {
			$engine = 'google';
		} elseif($engine=='engine_table_Y') {
			$engine = 'yandex';
		} else { 
			$engine = 'error-engine';
		}

		foreach($stack as $element) {
			//$cur_keyword = $element->find('td', 0)->plaintext;
			$rr = Yii::app()->db->createCommand('select id from o_keyword where keyword = "'.$element->find('td', 0)->plaintext.'"')->queryAll();
			// echo $rr[0]['id'];
			// echo "<pre>";
			// print_r($rr);
			// echo "</pre>";
			//$cur_pos = $element->find('td', 1)->plaintext;

			if ($rr[0]['id']!=0) {
				Yii::app()->db->createCommand('INSERT INTO o_keyword_position(`date`, `keyword_id`, `keyword_position`, `engine`) VALUES ("'.$import_date.'", "'.$rr[0]['id'].'", "'.$element->find('td', 1)->plaintext.'", "'.$engine.'")')->execute();
			}

    	}
?>