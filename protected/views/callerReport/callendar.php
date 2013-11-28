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
//$days_of_week=$days_of_week_ru[$days_of_week_en];
?>
<h4>Календарь на <?php echo $date; ?></h4>
<table  class="callendar" border="1">
<?php 	$day = 1;
		for ($i=1; $i <= 5; $i++) { ?>
		<tr>
			<?for ($j=1; $j <= 7; $j++) { ?>
			<td ><?php
				echo "<span class=\"black\">".$day."</span> ";
				$day_of_week_en = date("l", mktime(0, 0, 0, $month, $day, $year));
				$day_of_week=$days_of_week_ru[$day_of_week_en];
				echo "<span class=\"yellow\">".$day_of_week."</span><br>";
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
			?></td>
			<?}?>
		</tr>
	<?} ?>

</table>
