<?php
/* @var $this CommOfferShortController */
/* @var $model CommOfferShort */

?>
<p><b>Выбор даты</b></p>
<?php echo CHtml::form(); ?>
<?php echo CHtml::dropDownList('month', 'selectedmonth', array(
	'empty'=>'',
'01'=>'январь/1',
'02'=>'февраль/2',
'03'=>'март/3',
'04'=>'апрель/4',
'05'=>'май/5',
'06'=>'июнь/6',
'07'=>'июль/7',
'08'=>'август/8',
'09'=>'сентябрь/9',
'10'=>'октябрь/10',
'11'=>'ноябрь/11',
'12'=>'декабрь/12'
)); ?>
<?php echo CHtml::textField('year','',array('placeholder'=>'Год. Например: 2013')); ?>
<div class="row buttons">
	<?php echo CHtml::submitButton('Поехали'); ?>
</div>
<?php echo CHtml::endForm(); ?>

<?php 
	if(isset($_POST['month'])) {
		$month = $_POST['month'];
		$month = trim($month);
		$year = $_POST['year'];
		$year = trim($year);
		$date = $year."-".$month;
	} else {
		$month = date('m');
		$year = '2013';
		$date = $year."-".$month;
	}
?>
<?php if (Yii::app()->user->role==1) {
	$address = 'CallerReport/';
} else {
	$address = 'CallerManagerReport/';
}
?>
<?php 
$days_of_week_en=date("l");
$days_of_week_ru=array(
  'Monday'=>'Понедельник',
  'Tuesday'=>'Вторник',
  'Wednesday'=>'Среда',
  'Thursday'=>'Четверг',
  'Friday'=>'Пятница',
  'Saturday'=>'Суббота',
  'Sunday'=>'Воскресенье',
);
?>
<h4><b>Календарь на <?php echo $date; ?></b></h4>
<table  class="callendar" border="1">
<?php 	$day = 1;
		for ($i=1; $i <= 6; $i++) { ?>
		<?php if ($day > date('t', mktime(0, 0, 0, $month, $day, $year))) {
			break;
		} ?>
		<tr>
			<?for ($j=1; $j <= 7; $j++) { ?>
			<td ><?php
				$number_of_day_week = date('N', mktime(0, 0, 0, $month, $day, $year));
				$number_of_days_month = date('t', mktime(0, 0, 0, $month, $day, $year));
				if ($j==$number_of_day_week && $day <= $number_of_days_month) {
					echo "<span class=\"black\">".$day."</span> ";
					$day_of_week_en = date("l", mktime(0, 0, 0, $month, $day, $year));
					$day_of_week=$days_of_week_ru[$day_of_week_en];
					echo "<span class=\"black\">".$day_of_week."</span><br>";
					$result = Yii::app()->db->createCommand("SELECT id, next_call, next_meeting_date FROM `o_caller_report` WHERE date(`next_call`)=date('".$date."-".$day."') and call_status=2")->queryAll();
					foreach ($result as $res) {
						if ($res['next_meeting_date']==0) {
							$res['next_call']=substr($res['next_call'], 11, 5); 
							echo CHtml::link('Д'.$res['next_call'], array($address.'view', 'id'=>$res['id']))."<br>";
						} else {
							$res['next_meeting_date']=substr($res['next_meeting_date'], 11, 5); 
							echo CHtml::link('M'.$res['next_meeting_date'], array($address.'view', 'id'=>$res['id']))."<br>";
						}
					}
					$day++;
				} else {
					echo "&nbsp;";
				}
			?></td>
			<?}?>
		</tr>
	<?} ?>

</table>
