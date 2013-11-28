<?php
/* @var $this CommOfferShortController */
/* @var $model CommOfferShort */

?>
<h1>Календарь</h1>
<p><b>Выбор дат1ы</b></p>
<?php echo CHtml::form(); ?>
<?php echo CHtml::dropDownList('month', 'selectedmonth', array('empty'=>''),array(
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
<?php echo CHtml::textField('year') ?>
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
	}
?>
<h4>Календарь на <?php echo $date; ?></h4>
<table  class="callendar" border="1">
<?php 	$day = 1;
		for ($i=1; $i <= 5; $i++) { ?>
		<tr>
			<?for ($j=1; $j <= 7; $j++) { ?>
			<td ><?php
				echo "<span class=\"red\">".$day."</span><br>";
				$result = Yii::app()->db->createCommand("SELECT id FROM `o_caller_report` WHERE date(`next_call`)=date('".$date."-".$day."')")->queryAll();
				foreach ($result as $res) {
					echo CHtml::link($res['id'], array('view', 'id'=>$res['id']))." ";
				}
				$day++;
			?></td>
			<?}?>
		</tr>
	<?} ?>

</table>
